define(['jquery','bxslider','navgoco','wow'], function($, bxSlider, navgoco, WOW)
{
    return new function(){
        var self = this;
        self.run = function(){
            $('.btn-hamburger').click(function(){
              $(this).toggleClass('open');
            });

            $('#hamburger-icon').click(function(){
              $("ul#menus-top-section").slideToggle(300);
            });

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

            $('.sidey .sidenav').navgoco();
            
            new WOW().init();
        };
    }
});