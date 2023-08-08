jQuery(document).ready(function( $ ) {
    // var prev = 0;
    // var $window = $(window);
    // var nav = $('#top-nav');
    
    // $window.on('scroll', function(){
    //   var scrollTop = $window.scrollTop();
    //   nav.toggleClass('hidden', scrollTop > prev);
    //   prev = scrollTop;
    // });


    // Sidebar Menu CSS
    setTimeout(function (){
        jQuery('.cbp-spmenu-vertical .nav-item').wrapAll('<div class="main-div"></div>');
    }, 1000);
});