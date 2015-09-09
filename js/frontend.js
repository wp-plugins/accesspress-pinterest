jQuery(document).ready(function($) {
	$(window).load(function(){	
		var $container = $('.apsp-caption-disabled,.apsp-caption-enabled');
		$container.isotope({
		  itemSelector: '.apsp-pinterest-latest-pin',
		});
	});
});