define(['isotope','bxslider'], function(Isotope, bxSlider)
{
	return new function(){
		var self = this;
		self.run = function(){
			var iso1 = new Isotope('.product-full', {
                itemSelector: '.item1',
                masonry: {}
            });

            var iso2 = new Isotope('.product-lates', {
                itemSelector: '.item2',
                masonry: {}
            });

            $('.bxslider').bxSlider({
                nextSelector: '#slider-next',
                prevSelector: '#slider-prev',
                nextText: '<i class="fa fa-angle-right"></i>',
                prevText: '<i class="fa fa-angle-left"></i>',
                pager:false,
                auto:true,
                pause: 5000
            });
            $('.thumbnail').bxSlider({
              pagerCustom: '#bx-pager',
              controls:false,
            });
		};
	}
});