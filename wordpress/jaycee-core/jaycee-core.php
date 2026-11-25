<?php
/**
 * Plugin Name: Jaycee Core
 * Description: Loại nội dung "Dự án" (portfolio) cho nguyentuankhai.net. Giữ ở plugin để đổi theme sau này vẫn không mất dự án.
 * Version: 1.0.0
 * Author: Nguyễn Tuấn Khải (Jaycee)
 * Requires at least: 6.6
 * Requires PHP: 7.4
 * License: GPL-2.0-or-later
 * Text Domain: jaycee-core
 */

defined( 'ABSPATH' ) || exit;

/**
 * Loại nội dung Dự án: /du-an/ (danh sách) và /du-an/ten-du-an/ (chi tiết).
 */
function jaycee_core_register() {
	register_post_type(
		'du-an',
		array(
			'labels'        => array(
				'name'               => 'Dự án',
				'singular_name'      => 'Dự án',
				'menu_name'          => 'Dự án',
				'add_new'            => 'Thêm dự án',
				'add_new_item'       => 'Thêm dự án mới',
				'edit_item'          => 'Sửa dự án',
				'new_item'           => 'Dự án mới',
				'view_item'          => 'Xem dự án',
				'view_items'         => 'Xem các dự án',
				'search_items'       => 'Tìm dự án',
				'not_found'          => 'Chưa có dự án nào',
				'all_items'          => 'Tất cả dự án',
				'archives'           => 'Danh sách dự án',
				'featured_image'     => 'Ảnh đại diện dự án',
				'set_featured_image' => 'Chọn ảnh đại diện',
			),
			'public'        => true,
			'show_in_rest'  => true,
			'has_archive'   => 'du-an',
			'rewrite'       => array( 'slug' => 'du-an', 'with_front' => false ),
			'menu_icon'     => 'dashicons-portfolio',
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'revisions' ),
		)
	);

	// Nhãn nhỏ hiện trên thẻ dự án (vd "LUẬT VIỆT Á"). Để trống = không hiện.
	register_post_meta(
		'du-an',
		'jc_nhan',
		array(
			'type'              => 'string',
			'single'            => true,
			'default'           => '',
			'show_in_rest'      => true,
			'label'             => 'Nhãn nhỏ',
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => static function () {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'jaycee_core_register' );

// Cho Polylang biết "Dự án" cần dịch (có bản VI và EN).
add_filter(
	'pll_get_post_types',
	static function ( $types, $is_settings ) {
		$types['du-an'] = 'du-an';
		return $types;
	},
	10,
	2
);

// Ô nhập "Nhãn nhỏ" trong thanh bên phải khi sửa dự án.
add_action(
	'enqueue_block_editor_assets',
	static function () {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
		if ( ! $screen || 'du-an' !== $screen->post_type ) {
			return;
		}
		$file = plugin_dir_path( __FILE__ ) . 'editor.js';
		wp_enqueue_script(
			'jaycee-core-editor',
			plugins_url( 'editor.js', __FILE__ ),
			array( 'wp-plugins', 'wp-editor', 'wp-element', 'wp-components', 'wp-data', 'wp-core-data' ),
			(string) filemtime( $file ),
			true
		);
	}
);

register_activation_hook(
	__FILE__,
	static function () {
		jaycee_core_register();
		flush_rewrite_rules();
	}
);
