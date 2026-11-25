<?php
/**
 * Theme Jaycee – các chức năng chính.
 * Mỗi phần nằm trong 1 file riêng ở thư mục inc/ để dễ tìm:
 *   setup.php      – font, CSS/JS, menu, kiểu khối (block styles)
 *   icons.php      – bộ icon dùng cho khối "Icon (Jaycee)"
 *   blocks.php     – các khối riêng: Icon, Chữ song ngữ, Logo, Menu, Chuyển ngôn ngữ
 *   animation.php  – hiệu ứng xuất hiện cho MỌI khối (bảng "✨ Hiệu ứng" bên phải)
 *   seo.php        – thẻ mô tả Google / Facebook / Zalo (tự tắt khi cài Yoast/Rank Math)
 *   noi-dung.php   – chữ gốc của trang chủ (vi/en) – dùng cho mẫu khối & lần dựng đầu
 *   sections.php   – các phần của trang chủ dạng khối (Hero, Về mình, Triết lý...)
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

foreach ( array( 'setup', 'icons', 'blocks', 'animation', 'seo', 'noi-dung', 'sections' ) as $jaycee_file ) {
	require_once get_template_directory() . '/inc/' . $jaycee_file . '.php';
}
