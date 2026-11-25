/* Ô "Nhãn nhỏ" cho Dự án – hiện ở thanh bên phải trình soạn thảo. */
( function ( wp ) {
	const el = wp.element.createElement;
	const { registerPlugin } = wp.plugins;
	const { PluginDocumentSettingPanel } = wp.editor;
	const { TextControl } = wp.components;
	const { useSelect } = wp.data;
	const { useEntityProp } = wp.coreData;

	function NhanPanel() {
		const postType = useSelect( ( s ) => s( 'core/editor' ).getCurrentPostType(), [] );
		const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );
		if ( postType !== 'du-an' ) {
			return null;
		}
		return el(
			PluginDocumentSettingPanel,
			{ name: 'jc-nhan', title: 'Nhãn nhỏ trên thẻ dự án' },
			el( TextControl, {
				label: 'Nhãn (vd: LUẬT VIỆT Á) – để trống thì không hiện',
				value: ( meta && meta.jc_nhan ) || '',
				onChange: ( v ) => setMeta( { ...meta, jc_nhan: v } ),
				__nextHasNoMarginBottom: true,
			} )
		);
	}

	registerPlugin( 'jaycee-nhan', { render: NhanPanel } );
} )( window.wp );
