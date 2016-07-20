$(document).ready(function(){
	var submenu1 = $('.submenu1'),
        submenu2 = $('.submenu2');
    $( "li.open-submenu1" ).click(function( event ){
        event.preventDefault();
        if (submenu1.is( ":visible" )){
            submenu1.slideUp( 200 );
        } else {
            submenu1.slideDown( 200 );
        }
    });
    $( "li.open-submenu2" ).click(function( event ){
        event.preventDefault();
        if (submenu2.is( ":visible" )){
            submenu2.slideUp( 200 );
        } else {
            submenu2.slideDown( 200 );
        }
    });

    $('.product-full').isotope({
        itemSelector: '.item',
        masonry: {}
    });

    $('.product-lates').isotope({
        itemSelector: '.item2',
        masonry: {}
    });

   $('ul#category > li').click(function(){
      $(this).closest('li').find('#submenu-left').slideToggle(200);
      $('.clicker').toggleClass('active');
      e.stopPropagation();
   });

    $("ul#category > li > a").click(function () {
        $(this).find("[class^='vnavright']").toggleClass('fa-caret-down fa-caret-right');
    });

    $('.btn-hamburger').click(function(){
      $(this).toggleClass('open');
    });

    $('#hamburger-icon').click(function(){
      $("ul#menus-top-section").slideToggle(300);
    });

    new WOW().init();

    $("#imgZoom").elevateZoom({
        gallery:'product_detail', 
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750,
        galleryActiveClass: 'active', 
        imageCrossfade: true, 
        loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
    });
    $("#imgZoom").bind("click", function(e) { 
        var ez =  $('#imgZoom').data('elevateZoom'); 
                  $.fancybox(ez.getGalleryList()); 
                  return false; 
    });

    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });

    $('.sidey .sidenav').navgoco();

	/*--- bxslider ---*/
	/*----------------*/
	$('.bxslider').bxSlider({
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>',
        pager:false,
        auto:true,
        pause: 5000
    });

    /*---thumbnail---*/
    $('.thumbnail').bxSlider({
      pagerCustom: '#bx-pager',
      controls:false,
    });

  /*---widget social media---*/
  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.3";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

});
