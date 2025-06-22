/*
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
*/
    // Disable Right Click
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    alert('Right-click is disabled on this page.');
});

// Disable Key Shortcuts
document.addEventListener('keydown', function(e) {
    // F12 key
    if (e.key === 123) {
        alert('Developer tools are disabled on this site.');
        e.preventDefault();
    }
    // Ctrl+Shift+I or Cmd+Option+I
    if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.keyCode === 73) {
        alert('Developer tools are disabled on this site.');
        e.preventDefault();
    }
    // Ctrl+Shift+J or Cmd+Option+J
    if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.keyCode === 74) {
        alert('Developer tools are disabled on this site.');
        e.preventDefault();
    }
    // Ctrl+U or Cmd+U
    if ((e.ctrlKey || e.metaKey) && e.keyCode === 85) {
        alert('Viewing page source is disabled.');
        e.preventDefault();
    }
});