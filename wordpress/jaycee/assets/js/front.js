/* Jaycee – hiệu ứng ngoài trang web: menu, hiệu ứng xuất hiện, dải chữ chạy. */
( function () {
	window.jcReady = true;
	var root = document.documentElement;
	root.classList.add( 'jc-js' );

	// Menu dính: đổi nền khi cuộn
	var nav = document.querySelector( '.jc-nav' );
	if ( nav ) {
		var onScroll = function () {
			nav.classList.toggle( 'is-scrolled', window.scrollY > 20 );
		};
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
	}

	// Nút menu trên điện thoại
	document.querySelectorAll( '.jc-menu' ).forEach( function ( menu ) {
		var btn = menu.querySelector( '.jc-burger' );
		if ( ! btn ) {
			return;
		}
		btn.addEventListener( 'click', function () {
			var open = menu.classList.toggle( 'is-open' );
			btn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		} );
		menu.querySelectorAll( 'a' ).forEach( function ( a ) {
			a.addEventListener( 'click', function () {
				menu.classList.remove( 'is-open' );
				btn.setAttribute( 'aria-expanded', 'false' );
			} );
		} );
	} );

	// Dải chữ chạy: nhân đôi nội dung để chạy liền mạch
	document.querySelectorAll( '.jc-marquee .jc-marquee-text' ).forEach( function ( p ) {
		if ( p.querySelector( '.jc-marquee-track' ) ) {
			return;
		}
		var html = p.innerHTML;
		p.innerHTML = '<span class="jc-marquee-track"><span>' + html + '</span><span aria-hidden="true">' + html + '</span></span>';
	} );

	// Đánh số thứ tự cho khối con "xuất hiện lần lượt"
	document.querySelectorAll( '.jc-stagger' ).forEach( function ( g ) {
		Array.prototype.forEach.call( g.children, function ( c, i ) {
			c.style.setProperty( '--jc-i', i );
		} );
	} );

	// Hiệu ứng xuất hiện khi cuộn tới
	var targets = document.querySelectorAll( '.jc-anim, .jc-stagger' );
	var done = function ( el ) {
		el.classList.add( 'is-in' );
		var delay = parseInt( getComputedStyle( el ).getPropertyValue( '--jc-delay' ), 10 ) || 0;
		var extra = el.classList.contains( 'jc-stagger' ) ? el.children.length * 120 : 0;
		setTimeout( function () {
			el.classList.add( 'is-done' );
		}, 1000 + delay + extra );
	};
	if ( ! ( 'IntersectionObserver' in window ) || window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		targets.forEach( done );
		return;
	}
	var io = new IntersectionObserver(
		function ( entries ) {
			entries.forEach( function ( e ) {
				if ( e.isIntersecting ) {
					done( e.target );
					io.unobserve( e.target );
				}
			} );
		},
		{ threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
	);
	targets.forEach( function ( el ) {
		io.observe( el );
	} );
} )();
