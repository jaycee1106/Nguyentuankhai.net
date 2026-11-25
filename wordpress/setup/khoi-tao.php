<?php
/**
 * Dựng nội dung ban đầu cho site WordPress local (chạy 1 lần bằng WP-CLI):
 *   wp eval-file khoi-tao.php
 * - Bật theme Jaycee + plugin Jaycee Core
 * - Polylang: tiếng Việt (mặc định, không có /vi/) + tiếng Anh (/en/)
 * - Trang chủ VI/EN, trang Blog VI/EN, 4 dự án VI/EN, 1 bài viết mẫu VI/EN, menu VI/EN
 */

if ( ! defined( 'WP_CLI' ) ) {
	exit;
}
if ( get_option( 'jaycee_setup_done' ) ) {
	WP_CLI::error( 'Đã dựng rồi (option jaycee_setup_done). Xóa option này nếu muốn chạy lại.' );
}

switch_theme( 'jaycee' );
activate_plugin( 'jaycee-core/jaycee-core.php' );
require_once get_theme_file_path( 'functions.php' );
if ( ! post_type_exists( 'du-an' ) ) {
	require_once WP_PLUGIN_DIR . '/jaycee-core/jaycee-core.php';
	jaycee_core_register();
}

/* ---------- 1. Polylang ---------- */
$pll = PLL();
if ( ! $pll->model->get_languages_list() ) {
	$r = $pll->model->languages->add( array( 'locale' => 'vi', 'name' => 'Tiếng Việt', 'slug' => 'vi', 'flag' => 'vn', 'term_group' => 0 ) );
	if ( is_wp_error( $r ) ) {
		WP_CLI::error( $r->get_error_message() );
	}
	$r = $pll->model->languages->add( array( 'locale' => 'en_US', 'name' => 'English', 'slug' => 'en', 'flag' => 'us', 'term_group' => 1 ) );
	if ( is_wp_error( $r ) ) {
		WP_CLI::error( $r->get_error_message() );
	}
}
$opts = $pll->options;
$opts->set( 'default_lang', 'vi' );
$opts->set( 'hide_default', true );   // Tiếng Việt không có /vi/ trên đường dẫn
$opts->set( 'force_lang', 1 );        // Ngôn ngữ theo thư mục: /en/
$opts->set( 'rewrite', true );        // Bỏ chữ /language/
$opts->set( 'redirect_lang', true );  // Trang chủ tiếng Anh là /en/ (không phải /en/home/)
$opts->set( 'browser', false );       // Không tự chuyển theo ngôn ngữ trình duyệt
$opts->set( 'media_support', false );
$opts->set( 'post_types', array( 'du-an' ) );
$opts->save();
if ( method_exists( $pll->model, 'clean_languages_cache' ) ) {
	$pll->model->clean_languages_cache();
}
WP_CLI::log( 'Polylang: VI (mặc định) + EN' );

/* ---------- 2. Xóa nội dung mẫu của WordPress ---------- */
foreach ( array( 'hello-world', 'sample-page', 'privacy-policy' ) as $slug ) {
	$p = get_page_by_path( $slug, OBJECT, array( 'post', 'page' ) );
	if ( $p ) {
		wp_delete_post( $p->ID, true );
	}
}
// Gán tiếng Việt cho chuyên mục mặc định
$cat = (int) get_option( 'default_category' );
if ( $cat && ! pll_get_term_language( $cat ) ) {
	pll_set_term_language( $cat, 'vi' );
}

/* ---------- 3. Ảnh ---------- */
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
$def = jaycee_default_images();
$img = array();
foreach ( array( 'hero', 'learn', 'build', 'inspire', 'share' ) as $k ) {
	$src = get_theme_file_path( 'assets/images/' . $k . '.jpg' );
	$tmp = wp_tempnam( $k . '.jpg' );
	copy( $src, $tmp );
	$id = media_handle_sideload( array( 'name' => 'jaycee-' . $k . '.jpg', 'tmp_name' => $tmp ), 0 );
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id->get_error_message() );
	}
	$alt = isset( $def[ $k ] ) ? $def[ $k ]['alt'] : 'Jaycee – Nguyễn Tuấn Khải';
	update_post_meta( $id, '_wp_attachment_image_alt', $alt );
	$large     = wp_get_attachment_image_src( $id, 'large' );
	$img[ $k ] = array( 'id' => $id, 'url' => $large ? $large[0] : wp_get_attachment_url( $id ), 'alt' => $alt );
}
WP_CLI::log( 'Đã nhập 5 ảnh vào Thư viện' );

/* ---------- 4. Trang Blog + Dự án ---------- */
function jc_new( $args, $lang ) {
	$id = wp_insert_post( $args + array( 'post_status' => 'publish', 'post_author' => 1 ), true );
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id->get_error_message() );
	}
	pll_set_post_language( $id, $lang );
	return $id;
}

$blog_vi = jc_new( array( 'post_type' => 'page', 'post_title' => 'Blog', 'post_name' => 'blog' ), 'vi' );
$blog_en = jc_new( array( 'post_type' => 'page', 'post_title' => 'Blog', 'post_name' => 'journal' ), 'en' );
pll_save_post_translations( array( 'vi' => $blog_vi, 'en' => $blog_en ) );

$projects = array(
	1 => array( 'Marketing', 'Marketing', 'marketing' ),
	2 => array( 'Business', 'Business', 'business' ),
	3 => array( 'Digital', 'Digital', 'digital' ),
	4 => array( 'Dự án cá nhân', 'Personal projects', 'du-an-ca-nhan' ),
);
$tvi = jaycee_dict( 'vi' );
$ten = jaycee_dict( 'en' );
foreach ( $projects as $i => $p ) {
	$date = gmdate( 'Y-m-d H:i:s', strtotime( '2026-11-20 09:00:00' ) - $i * DAY_IN_SECONDS ); // dự án 1 mới nhất → hiện đầu tiên
	$ids  = array();
	foreach ( array( 'vi' => $tvi, 'en' => $ten ) as $lang => $t ) {
		$desc        = $t[ "duAn.$i.noiDung" ];
		$ids[ $lang ] = jc_new(
			array(
				'post_type'    => 'du-an',
				'post_title'   => 'vi' === $lang ? $p[0] : $p[1],
				'post_name'    => 'vi' === $lang ? $p[2] : $p[2] . '-en',
				'post_excerpt' => $desc,
				'post_content' => "<!-- wp:paragraph -->\n<p>" . $desc . "</p>\n<!-- /wp:paragraph -->",
				'post_date'    => $date,
				'menu_order'   => $i,
			),
			$lang
		);
		update_post_meta( $ids[ $lang ], 'jc_nhan', $t[ "duAn.$i.nhan" ] );
	}
	pll_save_post_translations( $ids );
}
WP_CLI::log( 'Đã tạo 4 dự án (VI + EN)' );

/* ---------- 5. Trang chủ ---------- */
$urls_vi = array( 'projects' => home_url( '/du-an/' ), 'blog' => get_permalink( $blog_vi ) );
$urls_en = array( 'projects' => home_url( '/en/du-an/' ), 'blog' => get_permalink( $blog_en ) );
$home_vi = jc_new(
	array(
		'post_type'     => 'page',
		'post_title'    => 'Trang chủ',
		'post_name'     => 'trang-chu',
		'post_excerpt'  => $tvi['seo.moTa'],
		'post_content'  => jaycee_home_markup( 'vi', $img, $urls_vi ),
	),
	'vi'
);
$home_en = jc_new(
	array(
		'post_type'     => 'page',
		'post_title'    => 'Home',
		'post_name'     => 'home',
		'post_excerpt'  => $ten['seo.moTa'],
		'post_content'  => jaycee_home_markup( 'en', $img, $urls_en ),
	),
	'en'
);
pll_save_post_translations( array( 'vi' => $home_vi, 'en' => $home_en ) );
foreach ( array( $home_vi, $home_en ) as $h ) {
	set_post_thumbnail( $h, $img['share']['id'] );
}
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home_vi );
update_option( 'page_for_posts', $blog_vi );
WP_CLI::log( 'Đã tạo trang chủ VI/EN' );

/* ---------- 6. Bài viết mẫu ---------- */
$cat_en = pll_get_term( $cat, 'en' );
$post_vi = jc_new(
	array(
		'post_type'     => 'post',
		'post_title'    => 'Bài viết mẫu: Bắt đầu ghi lại hành trình',
		'post_name'     => 'bat-dau-ghi-lai-hanh-trinh',
		'post_excerpt'  => 'Đây là bài viết mẫu để xem giao diện Blog. Anh sửa hoặc xóa bài này và viết bài đầu tiên của mình.',
		'post_content'  => "<!-- wp:paragraph -->\n<p>Đây là <strong>bài viết mẫu</strong> để xem giao diện Blog trông thế nào. Vào <em>Bài viết → Tất cả bài viết</em> để sửa hoặc xóa bài này.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Một tiêu đề phụ</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Viết bài bằng các khối: đoạn văn, tiêu đề, ảnh, video YouTube, trích dẫn… Ảnh đại diện (bên phải) sẽ hiện ở thẻ bài viết và khi chia sẻ lên Facebook/Zalo.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><!-- wp:paragraph -->\n<p>Still learning. Still building. Still becoming.</p>\n<!-- /wp:paragraph --></blockquote>\n<!-- /wp:quote -->",
		'post_category' => array( $cat ),
	),
	'vi'
);
$post_en = jc_new(
	array(
		'post_type'     => 'post',
		'post_title'    => 'Sample post: Starting to document the journey',
		'post_name'     => 'starting-to-document-the-journey',
		'post_excerpt'  => 'This is a sample post to preview the blog layout. Edit or delete it and write your first post.',
		'post_content'  => "<!-- wp:paragraph -->\n<p>This is a <strong>sample post</strong> to preview the blog layout. Edit or delete it under <em>Posts → All Posts</em>.</p>\n<!-- /wp:paragraph -->",
		'post_category' => $cat_en ? array( $cat_en ) : array(),
	),
	'en'
);
pll_save_post_translations( array( 'vi' => $post_vi, 'en' => $post_en ) );
set_post_thumbnail( $post_vi, $img['build']['id'] );
set_post_thumbnail( $post_en, $img['build']['id'] );
WP_CLI::log( 'Đã tạo bài viết mẫu' );

/* ---------- 7. Menu VI / EN ---------- */
function jc_menu( $name, $items ) {
	$existing = wp_get_nav_menu_object( $name );
	if ( $existing ) {
		wp_delete_nav_menu( $existing->term_id );
	}
	$menu_id = wp_create_nav_menu( $name );
	foreach ( $items as $pos => $it ) {
		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'    => $it[0],
				'menu-item-url'      => $it[1],
				'menu-item-type'     => 'custom',
				'menu-item-status'   => 'publish',
				'menu-item-position' => $pos + 1,
			)
		);
	}
	return $menu_id;
}
$hv = home_url( '/' );
$he = home_url( '/en/' );
$menu_vi = jc_menu(
	'Menu chính (Tiếng Việt)',
	array(
		array( $tvi['menu.gioiThieu'], $hv . '#about' ),
		array( $tvi['menu.trietLy'], $hv . '#philosophy' ),
		array( $tvi['menu.hanhTrinh'], $hv . '#journey' ),
		array( $tvi['menu.bieuTuong'], $hv . '#code' ),
		array( $tvi['menu.duAn'], $urls_vi['projects'] ),
		array( $tvi['menu.blog'], $urls_vi['blog'] ),
		array( $tvi['menu.lienHe'], $hv . '#contact' ),
	)
);
$menu_en = jc_menu(
	'Main menu (English)',
	array(
		array( $ten['menu.gioiThieu'], $he . '#about' ),
		array( $ten['menu.trietLy'], $he . '#philosophy' ),
		array( $ten['menu.hanhTrinh'], $he . '#journey' ),
		array( $ten['menu.bieuTuong'], $he . '#code' ),
		array( $ten['menu.duAn'], $urls_en['projects'] ),
		array( $ten['menu.blog'], $urls_en['blog'] ),
		array( $ten['menu.lienHe'], $he . '#contact' ),
	)
);
set_theme_mod( 'nav_menu_locations', array( 'primary' => $menu_vi ) );
$opts->set( 'nav_menus', array( 'jaycee' => array( 'primary' => array( 'vi' => $menu_vi, 'en' => $menu_en ) ) ) );
$opts->save();
WP_CLI::log( 'Đã tạo menu VI/EN' );

/* ---------- 8. Hoàn tất ---------- */
update_option( 'jaycee_setup_done', time() );
flush_rewrite_rules( false );
WP_CLI::success( 'Xong! Mở ' . home_url( '/' ) );
