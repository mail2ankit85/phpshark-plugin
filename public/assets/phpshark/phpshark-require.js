require.config({
baseUrl: gbl_phpshark,
	paths: {
		  'selectize': 'assets/vendor/tablr/js/vendors/selectize.min',
			'jquery': 'assets/vendor/jquery-3.2.1.min',
			'bootstrap': 'assets/vendor/bootstrap.bundle.min',
			'phpshark-grid': 'assets/vendor/columnstojs',
			'datatables.net': 'assets/vendor/datatables/datatables.min',
			'tables-custom': 'assets/components/table.widget/js/jquery-customize',
			'editor': 'assets/vendor/ckeditor/ckeditor',
			'phpshark-app': 'assets/js/app.min'
	},
	shim: {
		'bootstrap': ['jquery'],
		'phpshark-grid': ['jquery'],
		'datatables.net': ['jquery'],
		'datatables.net-bs4': ['jquery','bootstrap','datatables.net'],
		'tables-custom': ['jquery','datatables.net'],
		'phpshark-app': ['editor','jquery','phpshark-grid', 'datatables.net', 'selectize']
	}
});

require([
		'phpshark-grid',
		'datatables.net',
		'tables-custom',
		'editor',
		'phpshark-app'
]);
