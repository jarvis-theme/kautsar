var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=004",
	waitSeconds: 60,
	shim: {
		'cart' : {
			deps : ['jquery','noty']
		},
		'jq_ui' : {
			deps : ['jquery']
		},
		"noty" : {
			deps : ['jquery']
		},
		"bxslider" : {
			deps : ['jquery']
		},
		"elevatezoom" : {
			deps : ['jquery']
		},
		"navgoco" : {
			deps : ['jquery']
		},
		"wow" : {
			exports : 'WOW'
		},
	},

	paths: {
		// LIBRARY
		jquery 			: '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min',
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		isotope			: dirTema+'/assets/js/lib/isotope.pkgd.min',
		bxslider		: dirTema+'/assets/js/lib/jquery.bxslider.min',
		elevatezoom		: dirTema+'/assets/js/lib/jquery.elevatezoom',
		navgoco			: dirTema+'/assets/js/lib/jquery.navgoco.min',
		wow				: dirTema+'/assets/js/lib/wow.min',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		home            : dirTema+'/assets/js/pages/home',
		produk          : dirTema+'/assets/js/pages/produk',
		main	        : dirTema+'/assets/js/pages/default',
	}
});
require([
	'jquery',
	'router',
	'cart',
	'main'
], function($,router,cart,main)
{
	router.define('/', 'home@run');
	router.define('home', 'home@run');
	router.define('produk/*', 'produk@run');
	router.run();
	cart.run();
	main.run();
});