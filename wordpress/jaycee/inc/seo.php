<?php
/**
 * Thẻ mô tả cho Google / Facebook / Zalo.
 * - Mô tả lấy từ ô "Tóm tắt" (Excerpt) của trang/bài; trang chủ lấy tóm tắt của trang "Trang chủ".
 * - Ảnh chia sẻ lấy từ "Ảnh đại diện"; không có thì dùng assets/images/share.jpg (1200x630).
 * Nếu sau này cài plugin SEO (Yoast, Rank Math, SEOPress) thì phần này tự tắt để không bị trùng.
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'wp_head',
	static function () {
		if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'SEOPRESS_VERSION' ) ) {
			return;
		}

		$desc  = get_bloginfo( 'description' );
		$image = get_theme_file_uri( 'assets/images/share.jpg' );
		$w     = 1200;
		$h     = 630;
		$type  = 'website';

		$obj = is_front_page() ? get_post( (int) get_option( 'page_on_front' ) ) : ( is_singular() ? get_queried_object() : null );
		if ( is_front_page() && function_exists( 'pll_get_post' ) && $obj ) {
			$tr  = pll_get_post( $obj->ID );
			$obj = $tr ? get_post( $tr ) : $obj;
		}
		if ( $obj instanceof WP_Post ) {
			if ( has_excerpt( $obj ) ) {
				$desc = get_the_excerpt( $obj );
			}
			if ( has_post_thumbnail( $obj ) ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id( $obj ), 'large' );
				if ( $src ) {
					list( $image, $w, $h ) = $src;
				}
			}
			if ( is_singular( 'post' ) ) {
				$type = 'article';
			}
		}

		global $wp;
		$url = home_url( add_query_arg( array(), $wp->request ? trailingslashit( $wp->request ) : '' ) );

		$tags = array(
			'description'    => wp_strip_all_tags( $desc ),
			'og:title'       => wp_get_document_title(),
			'og:description' => wp_strip_all_tags( $desc ),
			'og:url'         => $url,
			'og:type'        => $type,
			'og:site_name'   => get_bloginfo( 'name' ),
			'og:locale'      => str_replace( '-', '_', get_bloginfo( 'language' ) ),
			'og:image'       => $image,
			'og:image:width' => $w,
			'og:image:height' => $h,
			'twitter:card'   => 'summary_large_image',
		);
		foreach ( $tags as $k => $v ) {
			$attr = ( 0 === strpos( $k, 'og:' ) ) ? 'property' : 'name';
			printf( '<meta %s="%s" content="%s">' . "\n", $attr, esc_attr( $k ), esc_attr( $v ) );
		}
	},
	2
);
