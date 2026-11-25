<?php
/**
 * Làm mới bộ nhớ đệm ngôn ngữ của Polylang (chạy: wp eval-file lam-moi-cache.php).
 * Dùng khi đổi trang chủ / trang Blog mà bản tiếng Anh không nhận.
 */
if ( ! defined( 'WP_CLI' ) ) {
	exit;
}
$model = PLL()->model;
if ( isset( $model->languages ) && method_exists( $model->languages, 'clean_cache' ) ) {
	$model->languages->clean_cache();
} elseif ( method_exists( $model, 'clean_languages_cache' ) ) {
	$model->clean_languages_cache();
}
delete_transient( 'pll_languages_list' );
foreach ( $model->get_languages_list() as $l ) {
	WP_CLI::log( $l->slug . ': page_on_front=' . (int) $l->page_on_front . ' page_for_posts=' . (int) $l->page_for_posts );
}
flush_rewrite_rules( false );
WP_CLI::success( 'Đã làm mới.' );
