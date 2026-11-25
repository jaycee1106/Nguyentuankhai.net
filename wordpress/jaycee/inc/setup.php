<?php
/**
 * Cài đặt chung: font, CSS/JS, menu, kiểu khối.
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

/** Link Google Fonts (Montserrat cho tiêu đề, Be Vietnam Pro cho chữ thường). */
function jaycee_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,500&display=swap';
}

/** Phiên bản file theo thời gian sửa → trình duyệt luôn tải bản mới. */
function jaycee_asset_ver( $rel ) {
	$path = get_theme_file_path( $rel );
	return file_exists( $path ) ? (string) filemtime( $path ) : '1';
}

/** Ngôn ngữ hiện tại (vi/en). Không có Polylang → vi. */
function jaycee_lang() {
	if ( function_exists( 'pll_current_language' ) ) {
		$l = pll_current_language( 'slug' );
		if ( $l ) {
			return $l;
		}
	}
	return 'vi';
}

/** Link trang chủ theo ngôn ngữ hiện tại. */
function jaycee_home_url() {
	return function_exists( 'pll_home_url' ) ? pll_home_url() : home_url( '/' );
}

add_action(
	'after_setup_theme',
	static function () {
		add_theme_support( 'editor-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_editor_style( array( 'assets/css/jaycee.css', jaycee_fonts_url() ) );
		register_nav_menus( array( 'primary' => 'Menu chính (đầu trang)' ) );
		add_post_type_support( 'page', 'excerpt' );
	}
);

add_action(
	'wp_enqueue_scripts',
	static function () {
		wp_enqueue_style( 'jaycee-fonts', jaycee_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'jaycee', get_theme_file_uri( 'assets/css/jaycee.css' ), array( 'jaycee-fonts' ), jaycee_asset_ver( 'assets/css/jaycee.css' ) );
		wp_enqueue_script(
			'jaycee-front',
			get_theme_file_uri( 'assets/js/front.js' ),
			array(),
			jaycee_asset_ver( 'assets/js/front.js' ),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
);

// Kết nối sớm tới Google Fonts + bật chế độ hiệu ứng (có dự phòng nếu JS lỗi).
add_action(
	'wp_head',
	static function () {
		echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
		echo "<script>document.documentElement.classList.add('jc-js');setTimeout(function(){if(!window.jcReady){document.documentElement.classList.remove('jc-js');}},2500);</script>\n";
	},
	1
);

/**
 * Kiểu khối (block styles): chọn trong thanh bên phải → mục "Kiểu".
 */
add_action(
	'init',
	static function () {
		$styles = array(
			'core/group'     => array(
				'jc-dark'       => 'Phần nền tối',
				'jc-light'      => 'Phần nền sáng',
				'jc-card'       => 'Thẻ tối',
				'jc-card-light' => 'Thẻ trắng',
			),
			'core/paragraph' => array(
				'jc-eyebrow' => 'Nhãn nhỏ có gạch',
				'jc-lead'    => 'Đoạn mô tả lớn',
				'jc-accent'  => 'Câu nghiêng nhấn',
				'jc-chip'    => 'Nhãn bo tròn',
				'jc-kicker'  => 'Nhãn có chấm sáng',
			),
			'core/button'    => array(
				'jc-chat'  => 'Gradient + icon chat',
				'jc-ghost' => 'Trong suốt + mũi tên',
				'jc-zalo'  => 'Xanh Zalo',
				'jc-white' => 'Nền trắng + Messenger',
			),
			'core/heading'   => array(
				'jc-gradient' => 'Chữ gradient',
				'jc-huge'     => 'Siêu to, in hoa',
			),
			'core/image'     => array(
				'jc-rounded' => 'Bo góc + bóng',
			),
		);
		foreach ( $styles as $block => $list ) {
			foreach ( $list as $name => $label ) {
				register_block_style(
					$block,
					array(
						'name'  => $name,
						'label' => $label,
					)
				);
			}
		}

		register_block_pattern_category( 'jaycee', array( 'label' => 'Jaycee – Các phần trang chủ' ) );
	}
);

// Tiêu đề tab trang chủ: chỉ "Jaycee – Nguyễn Tuấn Khải" (bỏ khẩu hiệu phía sau).
add_filter(
	'document_title_parts',
	static function ( $parts ) {
		if ( is_front_page() ) {
			unset( $parts['tagline'] );
		}
		return $parts;
	}
);

// Bài viết ngắn gọn trong thẻ: 28 chữ.
add_filter(
	'excerpt_length',
	static function () {
		return 28;
	}
);
