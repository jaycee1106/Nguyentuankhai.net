<?php
/**
 * Hiệu ứng xuất hiện cho mọi khối.
 * Trong trình soạn thảo: chọn khối → thanh bên phải → "✨ Hiệu ứng xuất hiện".
 * Thêm hiệu ứng mới: thêm tên vào jaycee_anim_types() + CSS trong assets/css/jaycee.css (mục HIỆU ỨNG)
 * + 1 dòng trong assets/js/editor.js (danh sách ANIMS).
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

/** Hiệu ứng chạy 1 lần khi cuộn tới. */
function jaycee_anim_types() {
	return array( 'fade-up', 'fade', 'zoom', 'slide-left', 'slide-right', 'blur' );
}

/** Hiệu ứng lặp liên tục. */
function jaycee_loop_types() {
	return array( 'float', 'pulse' );
}

// Khai báo thuộc tính hiệu ứng cho mọi loại khối.
add_filter(
	'register_block_type_args',
	static function ( $args ) {
		if ( ! isset( $args['attributes'] ) || ! is_array( $args['attributes'] ) ) {
			$args['attributes'] = array();
		}
		$args['attributes']['jcAnim']    = array( 'type' => 'string', 'default' => '' );
		$args['attributes']['jcDelay']   = array( 'type' => 'number', 'default' => 0 );
		$args['attributes']['jcStagger'] = array( 'type' => 'boolean', 'default' => false );
		return $args;
	}
);

// Gắn class hiệu ứng vào HTML khi hiển thị ngoài web.
add_filter(
	'render_block',
	static function ( $html, $block ) {
		$a       = isset( $block['attrs'] ) ? $block['attrs'] : array();
		$anim    = isset( $a['jcAnim'] ) ? sanitize_key( $a['jcAnim'] ) : '';
		$stagger = ! empty( $a['jcStagger'] );
		if ( ( '' === $anim && ! $stagger ) || '' === trim( (string) $html ) ) {
			return $html;
		}
		$once = jaycee_anim_types();
		$loop = jaycee_loop_types();
		if ( '' !== $anim && ! in_array( $anim, array_merge( $once, $loop ), true ) ) {
			return $html;
		}

		$p = new WP_HTML_Tag_Processor( $html );
		if ( ! $p->next_tag() ) {
			return $html;
		}
		if ( $stagger ) {
			// Các khối con xuất hiện lần lượt.
			$p->add_class( 'jc-stagger' );
			$p->add_class( 'jc-anim--' . ( in_array( $anim, $once, true ) ? $anim : 'fade-up' ) );
		} elseif ( in_array( $anim, $loop, true ) ) {
			$p->add_class( 'jc-loop' );
			$p->add_class( 'jc-anim--' . $anim );
		} else {
			$p->add_class( 'jc-anim' );
			$p->add_class( 'jc-anim--' . $anim );
		}
		$delay = isset( $a['jcDelay'] ) ? (int) $a['jcDelay'] : 0;
		if ( $delay > 0 ) {
			$style = trim( (string) $p->get_attribute( 'style' ) );
			$style = ( '' !== $style ? rtrim( $style, ';' ) . ';' : '' ) . '--jc-delay:' . $delay . 'ms';
			$p->set_attribute( 'style', $style );
		}
		return $p->get_updated_html();
	},
	10,
	2
);
