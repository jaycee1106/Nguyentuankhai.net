<?php
/**
 * Các khối riêng của theme (hiện trong trình chèn khối, nhóm "Jaycee").
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'block_categories_all',
	static function ( $cats ) {
		array_unshift(
			$cats,
			array(
				'slug'  => 'jaycee',
				'title' => 'Jaycee',
			)
		);
		return $cats;
	}
);

add_action( 'init', 'jaycee_register_blocks' );
function jaycee_register_blocks() {
	$common = array(
		'api_version' => 3,
		'category'    => 'jaycee',
	);

	// Icon có thể gắn link (dùng cho nút chat nổi, mạng xã hội, trang trí...).
	register_block_type(
		'jaycee/icon',
		$common + array(
			'title'           => 'Icon (Jaycee)',
			'description'     => 'Icon SVG đổi màu được, có thể gắn link.',
			'icon'            => 'star-filled',
			'attributes'      => array(
				'icon'   => array( 'type' => 'string', 'default' => 'star' ),
				'size'   => array( 'type' => 'number', 'default' => 24 ),
				'url'    => array( 'type' => 'string', 'default' => '' ),
				'label'  => array( 'type' => 'string', 'default' => '' ),
				'newTab' => array( 'type' => 'boolean', 'default' => true ),
			),
			'supports'        => array(
				'className' => true,
				'color'     => array( 'text' => true, 'background' => true ),
				'spacing'   => array( 'margin' => true, 'padding' => true ),
			),
			'render_callback' => 'jaycee_render_icon',
		)
	);

	// Chữ song ngữ: 1 khối chứa cả bản Việt và bản Anh (dùng trong mẫu trang Blog, Dự án...).
	register_block_type(
		'jaycee/text',
		$common + array(
			'title'           => 'Chữ song ngữ (VI/EN)',
			'description'     => 'Hiện chữ tiếng Việt hoặc tiếng Anh tùy ngôn ngữ người xem đang chọn.',
			'icon'            => 'translation',
			'attributes'      => array(
				'vi'      => array( 'type' => 'string', 'default' => '' ),
				'en'      => array( 'type' => 'string', 'default' => '' ),
				'tagName' => array( 'type' => 'string', 'default' => 'p' ),
			),
			'supports'        => array(
				'className'  => true,
				'color'      => array( 'text' => true ),
				'typography' => array( 'fontSize' => true, 'textAlign' => true ),
				'spacing'    => array( 'margin' => true ),
			),
			'render_callback' => 'jaycee_render_text',
		)
	);

	register_block_type(
		'jaycee/logo',
		$common + array(
			'title'           => 'Logo Jaycee',
			'icon'            => 'admin-home',
			'attributes'      => array(
				'mark' => array( 'type' => 'string', 'default' => 'JC' ),
				'name' => array( 'type' => 'string', 'default' => 'Jaycee' ),
			),
			'supports'        => array( 'className' => true ),
			'render_callback' => 'jaycee_render_logo',
		)
	);

	register_block_type(
		'jaycee/menu',
		$common + array(
			'title'           => 'Menu chính (Jaycee)',
			'description'     => 'Menu theo ngôn ngữ. Sửa mục menu ở Giao diện → Menu.',
			'icon'            => 'menu',
			'attributes'      => array(),
			'supports'        => array( 'className' => true ),
			'render_callback' => 'jaycee_render_menu',
		)
	);

	register_block_type(
		'jaycee/lang-switch',
		$common + array(
			'title'           => 'Chuyển ngôn ngữ VI/EN',
			'icon'            => 'translation',
			'attributes'      => array(),
			'supports'        => array( 'className' => true ),
			'render_callback' => 'jaycee_render_lang_switch',
		)
	);
}

function jaycee_render_icon( $a ) {
	$name = isset( $a['icon'] ) ? $a['icon'] : 'star';
	$svg  = jaycee_icon_svg( $name );
	if ( ! $svg ) {
		return '';
	}
	$size  = max( 8, min( 256, (int) ( $a['size'] ?? 24 ) ) );
	$label = trim( (string) ( $a['label'] ?? '' ) );
	$url   = trim( (string) ( $a['url'] ?? '' ) );

	if ( $url ) {
		$inner = sprintf(
			'<a href="%1$s"%2$s%3$s>%4$s</a>',
			esc_url( $url ),
			$label ? ' aria-label="' . esc_attr( $label ) . '"' : '',
			! empty( $a['newTab'] ) ? ' target="_blank" rel="noopener"' : '',
			$svg
		);
	} else {
		$inner = $label ? '<span role="img" aria-label="' . esc_attr( $label ) . '">' . $svg . '</span>' : $svg;
	}

	$wrapper = get_block_wrapper_attributes( array( 'style' => '--jc-icon-size:' . $size . 'px' ) );
	return '<span ' . $wrapper . '>' . $inner . '</span>';
}

function jaycee_render_text( $a ) {
	$lang = jaycee_lang();
	$text = ( 'en' === $lang && '' !== trim( (string) ( $a['en'] ?? '' ) ) ) ? $a['en'] : ( $a['vi'] ?? '' );
	$tag  = in_array( $a['tagName'] ?? 'p', array( 'p', 'span', 'div', 'h1', 'h2', 'h3', 'h4' ), true ) ? $a['tagName'] : 'p';
	$text = jaycee_replace_tokens( wp_kses_post( $text ) );
	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $tag, get_block_wrapper_attributes(), $text );
}

/**
 * Mã thay thế dùng được trong khối "Chữ song ngữ":
 * {home} = link trang chủ, {blog} = link trang Blog, {projects} = link trang Dự án, {year} = năm hiện tại.
 * (link tự đổi theo ngôn ngữ đang xem)
 */
function jaycee_replace_tokens( $html ) {
	if ( false === strpos( $html, '{' ) ) {
		return $html;
	}
	$blog_id = (int) get_option( 'page_for_posts' );
	if ( $blog_id && function_exists( 'pll_get_post' ) ) {
		$tr      = pll_get_post( $blog_id );
		$blog_id = $tr ? $tr : $blog_id;
	}
	$projects = get_post_type_archive_link( 'du-an' );
	return strtr(
		$html,
		array(
			'{home}'     => esc_url( jaycee_home_url() ),
			'{blog}'     => esc_url( $blog_id ? get_permalink( $blog_id ) : home_url( '/' ) ),
			'{projects}' => esc_url( $projects ? $projects : home_url( '/' ) ),
			'{year}'     => esc_html( wp_date( 'Y' ) ),
		)
	);
}

function jaycee_render_logo( $a ) {
	return sprintf(
		'<a %1$s href="%2$s"><span class="jc-logo-mark">%3$s</span><span class="jc-logo-name">%4$s</span></a>',
		get_block_wrapper_attributes( array( 'class' => 'jc-logo' ) ),
		esc_url( jaycee_home_url() ),
		esc_html( $a['mark'] ?? 'JC' ),
		esc_html( $a['name'] ?? 'Jaycee' )
	);
}

function jaycee_render_menu() {
	$menu = wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'jc-menu-list',
			'fallback_cb'    => '__return_empty_string',
			'depth'          => 1,
			'echo'           => false,
		)
	);
	if ( ! $menu && defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		$menu = '<em style="opacity:.6">Chưa có menu – vào Giao diện → Menu để tạo.</em>';
	}
	$burger = '<button type="button" class="jc-burger" aria-expanded="false" aria-label="Menu"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>';
	return '<nav ' . get_block_wrapper_attributes( array( 'class' => 'jc-menu', 'aria-label' => 'Menu' ) ) . '>' . $menu . $burger . '</nav>';
}

function jaycee_render_lang_switch() {
	if ( ! function_exists( 'pll_the_languages' ) ) {
		return '';
	}
	$langs = pll_the_languages(
		array(
			'raw'                    => 1,
			'hide_if_empty'          => 0,
			'hide_if_no_translation' => 0,
		)
	);
	if ( empty( $langs ) || ! is_array( $langs ) ) {
		return '';
	}
	$links = array();
	foreach ( $langs as $l ) {
		$links[] = sprintf(
			'<a href="%1$s" hreflang="%2$s" lang="%2$s"%3$s>%4$s</a>',
			esc_url( $l['url'] ),
			esc_attr( $l['locale'] ?? $l['slug'] ),
			! empty( $l['current_lang'] ) ? ' class="is-active" aria-current="true"' : '',
			esc_html( strtoupper( $l['slug'] ) )
		);
	}
	return '<div ' . get_block_wrapper_attributes( array( 'class' => 'jc-lang', 'role' => 'group', 'aria-label' => 'Ngôn ngữ / Language' ) ) . '>' . implode( '<i>/</i>', $links ) . '</div>';
}

/**
 * Script cho trình soạn thảo: các khối riêng + bảng "✨ Hiệu ứng".
 */
add_action(
	'enqueue_block_editor_assets',
	static function () {
		wp_enqueue_script(
			'jaycee-editor',
			get_theme_file_uri( 'assets/js/editor.js' ),
			array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-hooks', 'wp-compose', 'wp-server-side-render', 'wp-data' ),
			jaycee_asset_ver( 'assets/js/editor.js' ),
			true
		);
		$icons = array();
		foreach ( jaycee_icons() as $k => $v ) {
			$icons[ $k ] = array(
				'label' => $v[0],
				'svg'   => jaycee_icon_svg( $k ),
			);
		}
		wp_localize_script( 'jaycee-editor', 'jayceeEditor', array( 'icons' => $icons ) );
	}
);
