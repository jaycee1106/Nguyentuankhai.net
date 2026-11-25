<?php
/**
 * Bộ icon cho khối "Icon (Jaycee)".
 * Muốn thêm icon: thêm 1 dòng 'ten-icon' => array( 'Tên hiển thị', 'fill' hoặc 'stroke', '<path .../>' ).
 * Lấy icon miễn phí ở https://lucide.dev (chọn icon → Copy SVG → dán phần bên trong thẻ <svg>).
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

function jaycee_icons() {
	return array(
		'zalo'           => array( 'Zalo', 'fill', '<text x="12" y="15.6" text-anchor="middle" font-family="Montserrat,Arial,sans-serif" font-weight="800" font-size="8.6">Zalo</text>' ),
		'messenger'      => array( 'Messenger', 'fill', '<path d="M12 2C6.4 2 2 6.1 2 11.6c0 2.9 1.2 5.4 3.1 7.1V22l2.9-1.6c1.2.3 2.5.5 4 .5 5.6 0 10-4.1 10-9.6S17.6 2 12 2zm1 12.9l-2.5-2.7-5 2.7 5.5-5.8 2.6 2.7 4.9-2.7-5.5 5.8z"/>' ),
		'facebook'       => array( 'Facebook', 'fill', '<path d="M14 8V6c0-.9.6-1 1-1h3V1h-4c-3.3 0-4 2.4-4 4v3H7v4h3v11h4V12h3.5l.5-4z"/>' ),
		'instagram'      => array( 'Instagram', 'stroke', '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".8" fill="currentColor"/>' ),
		'tiktok'         => array( 'TikTok', 'fill', '<path d="M16.6 2h-3.4v13.4a2.9 2.9 0 1 1-2.1-2.8V9.1a6.3 6.3 0 1 0 5.5 6.3V8.6a8 8 0 0 0 4.7 1.5V6.7a4.7 4.7 0 0 1-4.7-4.7z"/>' ),
		'youtube'        => array( 'YouTube', 'fill', '<path d="M23 7.2a3 3 0 0 0-2.1-2.1C19 4.6 12 4.6 12 4.6s-7 0-8.9.5A3 3 0 0 0 1 7.2 31 31 0 0 0 .5 12a31 31 0 0 0 .5 4.8 3 3 0 0 0 2.1 2.1c1.9.5 8.9.5 8.9.5s7 0 8.9-.5a3 3 0 0 0 2.1-2.1 31 31 0 0 0 .5-4.8 31 31 0 0 0-.5-4.8zM9.8 15.1V8.9l5.4 3.1-5.4 3.1z"/>' ),
		'linkedin'       => array( 'LinkedIn', 'fill', '<path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9.5h4V21H3zM9.5 9.5h3.8v1.6h.1c.5-1 1.8-2 3.8-2 4 0 4.8 2.6 4.8 6V21h-4v-5.2c0-1.2 0-2.8-1.7-2.8s-2 1.3-2 2.7V21h-4z"/>' ),
		'chat'           => array( 'Bong bóng chat', 'stroke', '<path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z"/>' ),
		'mail'           => array( 'Email', 'stroke', '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>' ),
		'phone'          => array( 'Điện thoại', 'stroke', '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/>' ),
		'arrow-right'    => array( 'Mũi tên phải', 'stroke', '<path d="M5 12h14M13 6l6 6-6 6"/>' ),
		'arrow-up-right' => array( 'Mũi tên chéo', 'stroke', '<path d="M7 17 17 7M8 7h9v9"/>' ),
		'spade'          => array( 'Bích ♠', 'fill', '<path d="M12 2C9 6 3 9 3 13.5 3 16 5 18 7.5 18c1.4 0 2.6-.6 3.4-1.5L10 22h4l-.9-5.5c.8.9 2 1.5 3.4 1.5 2.5 0 4.5-2 4.5-4.5C21 9 15 6 12 2z"/>' ),
		'crown'          => array( 'Vương miện', 'stroke', '<path d="m2 7 5 5 5-8 5 8 5-5-2 12H4z"/>' ),
		'star'           => array( 'Ngôi sao', 'fill', '<path d="m12 2 3.1 6.3 6.9 1-5 4.9 1.2 6.8L12 17.8 5.8 21l1.2-6.8-5-4.9 6.9-1z"/>' ),
		'sparkle'        => array( 'Lấp lánh', 'fill', '<path d="M12 2c.6 4.6 2.4 6.4 7 7-4.6.6-6.4 2.4-7 7-.6-4.6-2.4-6.4-7-7 4.6-.6 6.4-2.4 7-7zM19 15c.3 2 1 2.7 3 3-2 .3-2.7 1-3 3-.3-2-1-2.7-3-3 2-.3 2.7-1 3-3z"/>' ),
		'check'          => array( 'Dấu tích', 'stroke', '<path d="M20 6 9 17l-5-5"/>' ),
		'play'           => array( 'Phát video', 'fill', '<path d="M7 4v16l13-8z"/>' ),
		'video'          => array( 'Máy quay', 'stroke', '<path d="m23 7-7 5 7 5z"/><rect x="1" y="5" width="15" height="14" rx="2"/>' ),
		'camera'         => array( 'Máy ảnh', 'stroke', '<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/>' ),
		'book'           => array( 'Sách', 'stroke', '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5z"/><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5"/>' ),
		'briefcase'      => array( 'Cặp công việc', 'stroke', '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2M2 13h20"/>' ),
		'globe'          => array( 'Quả địa cầu', 'stroke', '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"/>' ),
		'map-pin'        => array( 'Ghim bản đồ', 'stroke', '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>' ),
		'heart'          => array( 'Trái tim', 'stroke', '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21l7.8-7.5 1-1.1a5.5 5.5 0 0 0 0-7.8z"/>' ),
		'lightbulb'      => array( 'Bóng đèn ý tưởng', 'stroke', '<path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.3 1 2.1V17h6v-.2c0-.8.4-1.6 1-2.1A7 7 0 0 0 12 2z"/>' ),
		'target'         => array( 'Mục tiêu', 'stroke', '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>' ),
		'trending-up'    => array( 'Tăng trưởng', 'stroke', '<path d="m22 7-8.5 8.5-5-5L2 17"/><path d="M16 7h6v6"/>' ),
		'rocket'         => array( 'Tên lửa', 'stroke', '<path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.8.7-2.1-.1-2.9a2.2 2.2 0 0 0-2.9-.1z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.9A12.9 12.9 0 0 1 22 2c0 2.7-.8 7.5-6 11a22.4 22.4 0 0 1-4 2z"/><path d="M9 12H4s.6-3 2-4c1.6-1.1 5 0 5 0M12 15v5s3-.6 4-2c1.1-1.6 0-5 0-5"/>' ),
		'code'           => array( 'Code', 'stroke', '<path d="m16 18 6-6-6-6M8 6l-6 6 6 6"/>' ),
		'pen'            => array( 'Bút viết', 'stroke', '<path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/>' ),
		'users'          => array( 'Mọi người', 'stroke', '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>' ),
		'calendar'       => array( 'Lịch', 'stroke', '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>' ),
	);
}

/** Trả về mã SVG của 1 icon. */
function jaycee_icon_svg( $name ) {
	$icons = jaycee_icons();
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	list( , $mode, $inner ) = $icons[ $name ];
	$paint = 'fill' === $mode
		? 'fill="currentColor"'
		: 'fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"';
	return '<svg viewBox="0 0 24 24" width="24" height="24" ' . $paint . ' aria-hidden="true" focusable="false">' . $inner . '</svg>';
}
