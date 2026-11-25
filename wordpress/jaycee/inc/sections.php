<?php
/**
 * Các phần của trang chủ, viết bằng khối Gutenberg chuẩn.
 * Dùng cho: (1) mẫu khối trong trình chèn "Mẫu → Jaycee", (2) lần dựng trang chủ đầu tiên.
 * Sau khi trang đã dựng, mọi chỉnh sửa làm thẳng trong WordPress – không cần sửa file này.
 *
 * @package Jaycee
 */

defined( 'ABSPATH' ) || exit;

/* ---------- Hàm nhỏ tạo khối ---------- */

function jc_attrs( $a ) {
	return $a ? ' ' . serialize_block_attributes( $a ) : '';
}

function jc_p( $html, $class = '', $extra = array() ) {
	$a = $extra;
	if ( $class ) {
		$a['className'] = $class;
	}
	return '<!-- wp:paragraph' . jc_attrs( $a ) . " -->\n<p" . ( $class ? ' class="' . esc_attr( $class ) . '"' : '' ) . '>' . $html . "</p>\n<!-- /wp:paragraph -->\n";
}

function jc_h( $html, $level = 2, $class = '', $extra = array() ) {
	$a = $extra;
	if ( 2 !== $level ) {
		$a['level'] = $level;
	}
	if ( $class ) {
		$a['className'] = $class;
	}
	return '<!-- wp:heading' . jc_attrs( $a ) . " -->\n<h{$level} class=\"wp-block-heading" . ( $class ? ' ' . esc_attr( $class ) : '' ) . "\">{$html}</h{$level}>\n<!-- /wp:heading -->\n";
}

function jc_g( $inner, $class = '', $extra = array(), $tag = 'div' ) {
	$a = array();
	if ( 'div' !== $tag ) {
		$a['tagName'] = $tag;
	}
	$a += $extra;
	if ( $class ) {
		$a['className'] = $class;
	}
	$classes = array( 'wp-block-group' );
	if ( ! empty( $a['align'] ) ) {
		$classes[] = 'align' . $a['align'];
	}
	if ( $class ) {
		$classes[] = $class;
	}
	$id = ! empty( $a['anchor'] ) ? ' id="' . esc_attr( $a['anchor'] ) . '"' : '';
	return '<!-- wp:group' . jc_attrs( $a ) . " -->\n<{$tag}{$id} class=\"" . esc_attr( implode( ' ', $classes ) ) . "\">\n{$inner}</{$tag}>\n<!-- /wp:group -->\n";
}

/** Phần lớn của trang (nền tối / sáng), canh giữa nội dung 1200px. */
function jc_section( $inner, $style, $anchor = '', $extra_class = '' ) {
	$extra = array(
		'align'  => 'full',
		'layout' => array( 'type' => 'constrained' ),
	);
	if ( $anchor ) {
		$extra['anchor'] = $anchor;
	}
	return jc_g( $inner, trim( 'is-style-' . $style . ' ' . $extra_class ), $extra, 'section' );
}

function jc_img( $img, $class = '', $caption = '', $extra = array() ) {
	$a = $extra;
	$id = (int) ( $img['id'] ?? 0 );
	if ( $id ) {
		$a['id']       = $id;
		$a['sizeSlug'] = 'large';
	}
	$a['linkDestination'] = 'none';
	if ( $class ) {
		$a['className'] = $class;
	}
	$fig_class = 'wp-block-image' . ( $id ? ' size-large' : '' ) . ( $class ? ' ' . $class : '' );
	$out       = '<!-- wp:image' . jc_attrs( $a ) . " -->\n<figure class=\"" . esc_attr( $fig_class ) . '"><img src="' . esc_url( $img['url'] ) . '" alt="' . esc_attr( $img['alt'] ?? '' ) . '"' . ( $id ? ' class="wp-image-' . $id . '"' : '' ) . '/>';
	if ( '' !== $caption ) {
		$out .= '<figcaption class="wp-element-caption">' . $caption . '</figcaption>';
	}
	return $out . "</figure>\n<!-- /wp:image -->\n";
}

function jc_btn( $text, $url, $style = '', $new_tab = false ) {
	$a = array();
	if ( $style ) {
		$a['className'] = 'is-style-' . $style;
	}
	if ( $new_tab ) {
		$a['linkTarget'] = '_blank';
		$a['rel']        = 'noreferrer noopener';
	}
	return '<!-- wp:button' . jc_attrs( $a ) . " -->\n<div class=\"wp-block-button" . ( $style ? ' is-style-' . $style : '' ) . '"><a class="wp-block-button__link wp-element-button" href="' . esc_url( $url ) . '"' . ( $new_tab ? ' target="_blank" rel="noreferrer noopener"' : '' ) . '>' . $text . "</a></div>\n<!-- /wp:button -->\n";
}

function jc_btns( $inner, $class = '', $extra = array() ) {
	$a = $extra;
	if ( $class ) {
		$a['className'] = $class;
	}
	return '<!-- wp:buttons' . jc_attrs( $a ) . " -->\n<div class=\"wp-block-buttons" . ( $class ? ' ' . esc_attr( $class ) : '' ) . "\">\n{$inner}</div>\n<!-- /wp:buttons -->\n";
}

function jc_html( $html ) {
	return "<!-- wp:html -->\n{$html}\n<!-- /wp:html -->\n";
}

function jc_icon( $icon, $extra = array() ) {
	return '<!-- wp:jaycee/icon' . jc_attrs( array( 'icon' => $icon ) + $extra ) . " /-->\n";
}

/* ---------- Ảnh & link mặc định (ảnh nằm trong theme) ---------- */

function jaycee_default_images() {
	$alt = array(
		'hero'    => 'Nguyễn Tuấn Khải (Jaycee) trong ngày lễ tốt nghiệp',
		'learn'   => 'Jaycee trong ngày lễ tốt nghiệp cùng bạn bè',
		'build'   => 'Jaycee trên đường phố trong một chuyến đi',
		'inspire' => 'Jaycee bên cung đường đèo',
	);
	$out = array();
	foreach ( $alt as $k => $a ) {
		$out[ $k ] = array(
			'id'  => 0,
			'url' => get_theme_file_uri( 'assets/images/' . $k . '.jpg' ),
			'alt' => $a,
		);
	}
	return $out;
}

function jaycee_default_urls() {
	return array(
		'projects' => home_url( '/du-an/' ),
		'blog'     => home_url( '/blog/' ),
	);
}

/* ---------- Các phần trang chủ ---------- */

/**
 * @param string $part  hero|marquee|about|philosophy|journey|building|symbols|world|blog|manifesto|contact
 * @param array  $t     chữ (jaycee_dict)
 * @param array  $img   ảnh
 * @param array  $urls  link trang Dự án / Blog
 */
function jaycee_section( $part, $t, $img = null, $urls = null ) {
	$img  = $img ? $img : jaycee_default_images();
	$urls = $urls ? $urls : jaycee_default_urls();
	$L    = jaycee_links();

	switch ( $part ) {
		case 'hero':
			$text = jc_p( $t['hero.nhanTen'], 'is-style-jc-kicker' )
				. jc_h( $t['hero.tieuDe'], 1, 'jc-hero-title' )
				. jc_p( $t['hero.moTa'], 'jc-hero-sub' )
				. jc_btns(
					jc_btn( $t['nut.zalo'], $L['zalo'], 'jc-chat', true )
					. jc_btn( $t['hero.nutPhu'], '#about', 'jc-ghost' ),
					'jc-hero-cta'
				)
				. jc_g( jc_p( $t['hero.nhan1'], 'is-style-jc-chip' ) . jc_p( $t['hero.nhan2'], 'is-style-jc-chip' ), 'jc-chips' );
			$card = jc_g( jc_g( jc_img( $img['hero'], 'jc-card-photo' ), 'jc-card-in' ), 'jc-card', array( 'jcAnim' => 'zoom', 'jcDelay' => 150 ) );
			return jc_g(
				jc_g( jc_g( $text, 'jc-hero-text', array( 'jcAnim' => 'fade-up' ) ) . $card, 'jc-hero-grid' ),
				'jc-hero',
				array(
					'align'  => 'full',
					'anchor' => 'top',
					'layout' => array( 'type' => 'constrained' ),
				),
				'section'
			);

		case 'marquee':
			return jc_g( jc_p( $t['dai.chu'], 'jc-marquee-text' ), 'jc-marquee', array( 'align' => 'full' ) );

		case 'about':
			$facts = '';
			for ( $i = 1; $i <= 4; $i++ ) {
				$facts .= jc_g(
					jc_p( $t[ "thongTin.$i.nhan" ], 'jc-fact-k' )
					. jc_g( jc_p( $t[ "thongTin.$i.noiDung" ], 'jc-fact-v' ) . jc_p( $t[ "thongTin.$i.phu" ], 'jc-fact-sub' ) ),
					'jc-fact'
				);
			}
			$text = jc_h( $t['gioiThieu.tieuDe'] )
				. jc_p( $t['gioiThieu.doan1'] ) . jc_p( $t['gioiThieu.doan2'] ) . jc_p( $t['gioiThieu.doan3'] ) . jc_p( $t['gioiThieu.doan4'] )
				. jc_p( $t['gioiThieu.chuKy'], 'is-style-jc-accent jc-sign' );
			return jc_section(
				jc_p( $t['gioiThieu.nhan'], 'is-style-jc-eyebrow' )
				. jc_g(
					jc_g( $text, 'jc-about-text', array( 'jcAnim' => 'fade-up' ) )
					. jc_g( $facts, 'jc-facts', array( 'jcStagger' => true, 'jcAnim' => 'slide-right' ) ),
					'jc-about-grid'
				),
				'jc-light',
				'about'
			);

		case 'philosophy':
			$cards = '';
			foreach ( array( 1 => 'learn', 2 => 'build', 3 => 'inspire' ) as $i => $k ) {
				$cards .= jc_g(
					jc_img( $img[ $k ], 'jc-pillar-img', $t[ "trietLy.$i.anhChu" ] )
					. jc_p( '0' . $i, 'jc-no' )
					. jc_h( $t[ "trietLy.$i.ten" ], 3, 'jc-pillar-title' )
					. jc_p( $t[ "trietLy.$i.cau" ], 'is-style-jc-accent' )
					. jc_p( $t[ "trietLy.$i.noiDung" ] ),
					'is-style-jc-card jc-hover-grad jc-pillar'
				);
			}
			return jc_section(
				jc_p( $t['trietLy.nhan'], 'is-style-jc-eyebrow' )
				. jc_h( $t['trietLy.tieuDe'], 2, '', array( 'jcAnim' => 'fade-up' ) )
				. jc_p( $t['trietLy.moTa'], 'is-style-jc-lead', array( 'jcAnim' => 'fade-up' ) )
				. jc_g( $cards, 'jc-grid-3', array( 'jcStagger' => true ) ),
				'jc-dark',
				'philosophy'
			);

		case 'journey':
			$rows = '';
			for ( $i = 1; $i <= 5; $i++ ) {
				$rows .= jc_g(
					jc_p( $t[ "hanhTrinh.$i.nhan" ], 'jc-chapter-lbl' )
					. jc_h( $t[ "hanhTrinh.$i.ten" ], 3, 'jc-chapter-title' )
					. jc_p( $t[ "hanhTrinh.$i.noiDung" ] ),
					'jc-chapter',
					array( 'jcAnim' => 'fade-up' )
				);
			}
			return jc_section(
				jc_p( $t['hanhTrinh.nhan'], 'is-style-jc-eyebrow' )
				. jc_h( $t['hanhTrinh.tieuDe'], 2, '', array( 'jcAnim' => 'fade-up' ) )
				. jc_g( $rows, 'jc-chapters' )
				. jc_p( $t['hanhTrinh.ketThuc'], 'is-style-jc-accent jc-still', array( 'jcAnim' => 'fade-up' ) ),
				'jc-light',
				'journey'
			);

		case 'building':
			$query = '<!-- wp:query {"queryId":21,"query":{"perPage":4,"pages":0,"offset":0,"postType":"du-an","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"jc-builds"} -->
<div class="wp-block-query jc-builds">
<!-- wp:post-template {"className":"jc-grid-2","jcStagger":true} -->
' . jaycee_project_card() . '<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
';
			return jc_section(
				jc_p( $t['duAn.nhan'], 'is-style-jc-eyebrow' )
				. jc_h( $t['duAn.tieuDe'], 2, '', array( 'jcAnim' => 'fade-up' ) )
				. jc_p( $t['duAn.moTa'], 'is-style-jc-lead', array( 'jcAnim' => 'fade-up' ) )
				. $query
				. jc_btns( jc_btn( $t['duAn.nut'], $urls['projects'], 'jc-ghost' ), 'jc-more' ),
				'jc-dark',
				'building'
			);

		case 'symbols':
			$spade  = jaycee_icon_svg( 'spade' );
			$glyphs = array(
				1 => '<div class="jc-glyph"><span class="jc-glyph-num">1</span><span class="jc-glyph-king" role="img" aria-label="Quân Vua cờ vua">♚</span></div>',
				2 => '<div class="jc-glyph"><span class="jc-glyph-num">13</span><span class="jc-mini-card" role="img" aria-label="K bích"><b>K</b>' . $spade . '</span></div>',
				3 => '<div class="jc-glyph"><span class="jc-reels" role="img" aria-label="777 jackpot"><span>7</span><span>7</span><span>7</span></span></div>',
			);
			$cards  = '';
			foreach ( $glyphs as $i => $g ) {
				$cards .= jc_g(
					jc_html( $g )
					. jc_h( $t[ "bieuTuong.$i.ten" ], 4, 'jc-sym-title' )
					. jc_p( $t[ "bieuTuong.$i.noiDung" ] )
					. jc_p( $t[ "bieuTuong.$i.cau" ], 'is-style-jc-accent' ),
					'is-style-jc-card-light jc-sym'
				);
			}
			return jc_section(
				jc_p( $t['bieuTuong.nhan'], 'is-style-jc-eyebrow' )
				. jc_h( '<em>1</em> → <em>13</em> → <em>777</em>', 2, 'jc-code-title', array( 'jcAnim' => 'zoom' ) )
				. jc_p( $t['bieuTuong.moTa'], 'is-style-jc-lead', array( 'jcAnim' => 'fade-up' ) )
				. jc_g( $cards, 'jc-grid-3', array( 'jcStagger' => true ) ),
				'jc-light',
				'code',
				'jc-center'
			);

		case 'world':
			$nets  = array(
				'instagram' => 'Instagram',
				'tiktok'    => 'TikTok',
				'facebook'  => 'Facebook',
			);
			$cards = '';
			foreach ( $nets as $k => $label ) {
				$cards .= jc_g(
					jc_g( jc_p( $label ) . jc_icon( $k ), 'jc-net' )
					. jc_h( '<a href="' . esc_url( $L[ $k ] ) . '" target="_blank" rel="noreferrer noopener">' . $t[ "kenh.$k.ten" ] . '</a>', 3 )
					. jc_p( $t[ "kenh.$k.moTa" ] )
					. jc_p( $t['kenh.nut'], 'jc-go' ),
					'is-style-jc-card jc-hover-grad jc-channel'
				);
			}
			$topics = '';
			foreach ( $t['chuDe'] as $i => $c ) {
				$topics .= jc_p( '<strong>' . sprintf( '%02d', $i + 1 ) . '</strong>' . $c, 'jc-topic' );
			}
			return jc_section(
				jc_p( $t['kenh.nhan'], 'is-style-jc-eyebrow' )
				. jc_h( $t['kenh.tieuDe'], 2, '', array( 'jcAnim' => 'fade-up' ) )
				. jc_p( $t['kenh.moTa'], 'is-style-jc-lead', array( 'jcAnim' => 'fade-up' ) )
				. jc_g( $cards, 'jc-grid-3', array( 'jcStagger' => true ) )
				. jc_g( $topics, 'jc-topics', array( 'jcStagger' => true, 'jcAnim' => 'zoom' ) ),
				'jc-dark',
				'world'
			);

		case 'blog':
			$query = '<!-- wp:query {"queryId":31,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"jc-posts"} -->
<div class="wp-block-query jc-posts">
<!-- wp:post-template {"className":"jc-grid-3","jcStagger":true} -->
' . jaycee_post_card() . '<!-- /wp:post-template -->
<!-- wp:query-no-results -->
' . jc_p( $t['blog.trong'], 'jc-empty' ) . '<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
';
			return jc_section(
				jc_p( $t['blog.nhan'], 'is-style-jc-eyebrow' )
				. jc_h( $t['blog.tieuDe'], 2, '', array( 'jcAnim' => 'fade-up' ) )
				. jc_p( $t['blog.moTa'], 'is-style-jc-lead', array( 'jcAnim' => 'fade-up' ) )
				. $query
				. jc_btns( jc_btn( $t['blog.nut'], $urls['blog'], 'jc-ghost' ), 'jc-more' ),
				'jc-dark',
				'blog',
				'jc-alt'
			);

		case 'manifesto':
			return jc_section(
				jc_g(
					jc_p( $t['tuyenNgon.nhan'], 'is-style-jc-eyebrow' )
					. jc_p( $t['tuyenNgon.cau'], 'jc-manifesto-quote' )
					. jc_p( $t['tuyenNgon.dong'], 'jc-manifesto-lines' )
					. jc_g( jc_p( $t['tuyenNgon.ky1'] ) . jc_p( $t['tuyenNgon.ky2'] ) . jc_p( $t['tuyenNgon.ky3'] ), 'jc-sig' ),
					'',
					array( 'jcAnim' => 'fade-up' )
				),
				'jc-light',
				'',
				'jc-center jc-manifesto'
			);

		case 'contact':
			return jc_section(
				jc_g(
					jc_p( $t['lienHe.nhan'], 'is-style-jc-eyebrow' )
					. jc_h( $t['lienHe.tieuDe'] )
					. jc_p( $t['lienHe.moTa'], 'is-style-jc-lead' )
					. jc_btns(
						jc_btn( $t['nut.zalo'], $L['zalo'], 'jc-zalo', true )
						. jc_btn( $t['nut.messenger'], $L['messenger'], 'jc-white', true ),
						'jc-contact-cta'
					),
					'',
					array( 'jcAnim' => 'fade-up' )
				),
				'jc-dark',
				'contact',
				'jc-center jc-contact'
			);
	}
	return '';
}

/** Thẻ bài viết (dùng trong vòng lặp bài viết). */
function jaycee_post_card() {
	return jc_g(
		'<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10","className":"jc-post-thumb"} /-->
' . jc_g(
			'<!-- wp:post-date {"className":"jc-post-date"} /-->
<!-- wp:post-title {"level":3,"isLink":true,"className":"jc-post-title"} /-->
<!-- wp:post-excerpt {"moreText":"","className":"jc-post-excerpt"} /-->
',
			'jc-post-body'
		),
		'jc-post-card'
	);
}

/** Thẻ dự án (dùng ở trang chủ và trang Dự án). */
function jaycee_project_card( $with_image = false ) {
	return jc_g(
		( $with_image ? '<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"jc-build-thumb"} /-->
' : '' ) . '<!-- wp:post-title {"level":3,"isLink":true} /-->
<!-- wp:post-excerpt {"moreText":"","excerptLength":40} /-->
<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"jc_nhan"}}}},"className":"jc-tag"} -->
<p class="jc-tag"></p>
<!-- /wp:paragraph -->
',
		'is-style-jc-card jc-build'
	);
}

/** Thứ tự các phần trên trang chủ. */
function jaycee_home_parts() {
	return array( 'hero', 'marquee', 'about', 'philosophy', 'journey', 'building', 'symbols', 'world', 'manifesto', 'blog', 'contact' );
}

/** Toàn bộ trang chủ. */
function jaycee_home_markup( $lang = 'vi', $img = null, $urls = null ) {
	$t   = jaycee_dict( $lang );
	$out = '';
	foreach ( jaycee_home_parts() as $part ) {
		$out .= jaycee_section( $part, $t, $img, $urls );
	}
	return $out;
}

/**
 * Đăng ký mẫu khối (pattern) cho từng phần → chèn lại được bất cứ lúc nào:
 * trình soạn thảo → nút "+" → Mẫu → "Jaycee – Các phần trang chủ".
 */
add_action(
	'init',
	static function () {
		$names = array(
			'hero'       => 'Đầu trang (Hero + ảnh lá bài)',
			'marquee'    => 'Dải chữ chạy',
			'about'      => 'Về mình + thông tin nhanh',
			'philosophy' => 'Triết lý – 3 thẻ ảnh',
			'journey'    => 'Hành trình – 5 chương',
			'building'   => 'Dự án đang xây (tự lấy từ mục Dự án)',
			'symbols'    => 'Biểu tượng 1 → 13 → 777',
			'world'      => 'Mạng xã hội + chủ đề',
			'blog'       => 'Bài viết mới nhất (tự lấy từ Blog)',
			'manifesto'  => 'Manifesto',
			'contact'    => 'Liên hệ (Zalo, Messenger)',
		);
		$t = jaycee_dict( 'vi' );
		foreach ( $names as $part => $title ) {
			register_block_pattern(
				'jaycee/' . $part,
				array(
					'title'      => 'Jaycee – ' . $title,
					'categories' => array( 'jaycee' ),
					'content'    => jaycee_section( $part, $t ),
				)
			);
		}
		register_block_pattern(
			'jaycee/post-card',
			array(
				'title'      => 'Jaycee – Thẻ bài viết',
				'categories' => array( 'jaycee' ),
				'inserter'   => false,
				'content'    => jaycee_post_card(),
			)
		);
		register_block_pattern(
			'jaycee/project-card',
			array(
				'title'      => 'Jaycee – Thẻ dự án',
				'categories' => array( 'jaycee' ),
				'inserter'   => false,
				'content'    => jaycee_project_card(),
			)
		);
		register_block_pattern(
			'jaycee/trang-chu',
			array(
				'title'      => 'Jaycee – Trang chủ đầy đủ',
				'categories' => array( 'jaycee' ),
				'postTypes'  => array( 'page' ),
				'content'    => jaycee_home_markup( 'vi' ),
			)
		);
	},
	20
);
