/**
 * Jaycee – script cho trình soạn thảo (không cần build).
 * 1) Bảng "✨ Hiệu ứng xuất hiện" cho mọi khối.
 * 2) Các khối riêng: Icon, Chữ song ngữ, Logo, Menu, Chuyển ngôn ngữ.
 */
( function ( wp, data ) {
	const el = wp.element.createElement;
	const { Fragment } = wp.element;
	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { InspectorControls, RichText, useBlockProps } = wp.blockEditor;
	const { PanelBody, SelectControl, RangeControl, ToggleControl, TextControl, TextareaControl, Notice } = wp.components;
	const { registerBlockType } = wp.blocks;
	const ServerSideRender = wp.serverSideRender;

	/* ---------- 1. HIỆU ỨNG ---------- */
	const ANIMS = [
		{ value: '', label: 'Không có' },
		{ value: 'fade-up', label: 'Hiện dần + trượt lên' },
		{ value: 'fade', label: 'Hiện dần' },
		{ value: 'zoom', label: 'Phóng to nhẹ' },
		{ value: 'slide-left', label: 'Trượt vào từ trái' },
		{ value: 'slide-right', label: 'Trượt vào từ phải' },
		{ value: 'blur', label: 'Mờ → rõ' },
		{ value: 'float', label: '(Lặp) Bay lơ lửng' },
		{ value: 'pulse', label: '(Lặp) Nhịp đập' },
	];
	const SKIP = [ 'core/freeform', 'core/missing', 'core/template-part', 'core/pattern' ];

	addFilter( 'blocks.registerBlockType', 'jaycee/anim-attrs', function ( settings, name ) {
		if ( SKIP.indexOf( name ) !== -1 ) {
			return settings;
		}
		settings.attributes = Object.assign( {}, settings.attributes, {
			jcAnim: { type: 'string', default: '' },
			jcDelay: { type: 'number', default: 0 },
			jcStagger: { type: 'boolean', default: false },
		} );
		return settings;
	} );

	const withAnimPanel = createHigherOrderComponent( function ( BlockEdit ) {
		return function ( props ) {
			if ( SKIP.indexOf( props.name ) !== -1 || ! props.isSelected ) {
				return el( BlockEdit, props );
			}
			const a = props.attributes;
			const set = props.setAttributes;
			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: '✨ Hiệu ứng xuất hiện', initialOpen: !! ( a.jcAnim || a.jcStagger ) },
						el( SelectControl, {
							label: 'Kiểu hiệu ứng',
							value: a.jcAnim || '',
							options: ANIMS,
							onChange: ( v ) => set( { jcAnim: v } ),
							__nextHasNoMarginBottom: true,
						} ),
						el( RangeControl, {
							label: 'Chờ trước khi chạy (mili-giây)',
							value: a.jcDelay || 0,
							min: 0,
							max: 2000,
							step: 50,
							onChange: ( v ) => set( { jcDelay: v || 0 } ),
							__nextHasNoMarginBottom: true,
						} ),
						el( ToggleControl, {
							label: 'Các khối con xuất hiện lần lượt',
							help: 'Bật cho nhóm/lưới thẻ: từng thẻ hiện ra nối tiếp nhau.',
							checked: !! a.jcStagger,
							onChange: ( v ) => set( { jcStagger: v } ),
							__nextHasNoMarginBottom: true,
						} ),
						el( 'p', { style: { fontSize: '12px', opacity: 0.7, marginTop: '12px' } }, 'Hiệu ứng chỉ chạy ngoài trang web (bấm Xem trước để thử).' )
					)
				)
			);
		};
	}, 'withAnimPanel' );
	addFilter( 'editor.BlockEdit', 'jaycee/anim-panel', withAnimPanel );

	/* ---------- 2. KHỐI RIÊNG ---------- */
	const icons = ( data && data.icons ) || {};
	const iconOptions = Object.keys( icons ).map( ( k ) => ( { value: k, label: icons[ k ].label } ) );

	// Icon
	registerBlockType( 'jaycee/icon', {
		apiVersion: 3,
		edit: function ( props ) {
			const a = props.attributes;
			const set = props.setAttributes;
			const blockProps = useBlockProps( { style: { '--jc-icon-size': ( a.size || 24 ) + 'px' } } );
			const svg = icons[ a.icon ] ? icons[ a.icon ].svg : '';
			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: 'Icon' },
						el( SelectControl, { label: 'Chọn icon', value: a.icon, options: iconOptions, onChange: ( v ) => set( { icon: v } ), __nextHasNoMarginBottom: true } ),
						el( RangeControl, { label: 'Kích thước (px)', value: a.size, min: 12, max: 160, onChange: ( v ) => set( { size: v || 24 } ), __nextHasNoMarginBottom: true } ),
						el( TextControl, { label: 'Link khi bấm (để trống = không có link)', value: a.url, onChange: ( v ) => set( { url: v } ), __nextHasNoMarginBottom: true } ),
						el( TextControl, { label: 'Mô tả ngắn (cho người khiếm thị/Google)', value: a.label, onChange: ( v ) => set( { label: v } ), __nextHasNoMarginBottom: true } ),
						el( ToggleControl, { label: 'Mở link ở tab mới', checked: !! a.newTab, onChange: ( v ) => set( { newTab: v } ), __nextHasNoMarginBottom: true } )
					)
				),
				el( 'span', Object.assign( {}, blockProps, { dangerouslySetInnerHTML: { __html: a.url ? '<a>' + svg + '</a>' : svg } } ) )
			);
		},
		save: function () {
			return null;
		},
	} );

	// Chữ song ngữ
	registerBlockType( 'jaycee/text', {
		apiVersion: 3,
		edit: function ( props ) {
			const a = props.attributes;
			const set = props.setAttributes;
			const blockProps = useBlockProps();
			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: 'Chữ song ngữ' },
						el( Notice, { status: 'info', isDismissible: false }, 'Gõ tiếng Việt trực tiếp trên khối. Tiếng Anh gõ ở ô bên dưới. Dùng được {home}, {blog}, {projects}, {year}.' ),
						el( TextareaControl, { label: 'Bản tiếng Anh (EN)', value: a.en, onChange: ( v ) => set( { en: v } ), __nextHasNoMarginBottom: true } ),
						el( SelectControl, {
							label: 'Loại thẻ',
							value: a.tagName,
							options: [
								{ value: 'p', label: 'Đoạn văn (p)' },
								{ value: 'h1', label: 'Tiêu đề H1' },
								{ value: 'h2', label: 'Tiêu đề H2' },
								{ value: 'h3', label: 'Tiêu đề H3' },
								{ value: 'h4', label: 'Tiêu đề H4' },
								{ value: 'span', label: 'Chữ trong dòng (span)' },
							],
							onChange: ( v ) => set( { tagName: v } ),
							__nextHasNoMarginBottom: true,
						} )
					)
				),
				el( RichText, Object.assign( {}, blockProps, {
					tagName: a.tagName || 'p',
					value: a.vi,
					placeholder: 'Gõ chữ tiếng Việt…',
					onChange: ( v ) => set( { vi: v } ),
				} ) )
			);
		},
		save: function () {
			return null;
		},
	} );

	// Logo
	registerBlockType( 'jaycee/logo', {
		apiVersion: 3,
		edit: function ( props ) {
			const a = props.attributes;
			const set = props.setAttributes;
			const blockProps = useBlockProps( { className: 'jc-logo' } );
			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: 'Logo' },
						el( TextControl, { label: 'Chữ trong ô vuông', value: a.mark, onChange: ( v ) => set( { mark: v } ), __nextHasNoMarginBottom: true } ),
						el( TextControl, { label: 'Tên bên cạnh (để trống = ẩn)', value: a.name, onChange: ( v ) => set( { name: v } ), __nextHasNoMarginBottom: true } )
					)
				),
				el( 'span', blockProps, el( 'span', { className: 'jc-logo-mark' }, a.mark ), el( 'span', { className: 'jc-logo-name' }, a.name ) )
			);
		},
		save: function () {
			return null;
		},
	} );

	// Menu + Chuyển ngôn ngữ: xem trước từ máy chủ
	[ 'jaycee/menu', 'jaycee/lang-switch' ].forEach( function ( name ) {
		registerBlockType( name, {
			apiVersion: 3,
			edit: function () {
				const blockProps = useBlockProps();
				return el(
					'div',
					blockProps,
					el( ServerSideRender, { block: name } ),
					name === 'jaycee/menu' &&
						el(
							InspectorControls,
							null,
							el( PanelBody, { title: 'Menu' }, el( 'p', null, 'Sửa các mục menu tại: Bảng tin → Giao diện → Menu (mỗi ngôn ngữ một menu).' ) )
						)
				);
			},
			save: function () {
				return null;
			},
		} );
	} );
} )( window.wp, window.jayceeEditor );
