
    jQuery(document).ready(function($) {
            $('.dropdown-wrapper').on('click', function(e) {
                e.preventDefault();
                var $menu = $(this).find('.sub-menu').first();
                $menu.toggleClass('open');
                $menu.css('display', $menu.hasClass('open') ? 'block' : 'none');
            });
    
    $('.wpp-popup-content').each(function(){
        $(this).wrap('<div class="wpp-popup-wrapper"><div class="wpp-popup-inside">');
      });
    $('.wpp-popup-trigger').off().click(function(e){
        e.preventDefault();
        $('.wpp-popup-wrapper').addClass('popup-is-visible');
        $('body').addClass('wpp-noscroll');                
    });  
            
    $('.wpp-popup-close').click(function(e){
        e.preventDefault();
        $('.popup-is-visible').removeClass('popup-is-visible');
        $('body').removeClass('wpp-noscroll');       
    });
    });  