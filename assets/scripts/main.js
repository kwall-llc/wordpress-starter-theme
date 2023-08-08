jQuery(document).ready(function ($) {
    //$('#wprmenu_bar').off('click');
  
    var logo_html = $("<div />").append($("#wprmenu_bar .menu_title").clone()).html();
    $('#wprmenu_bar').prepend(logo_html);
  
    var back_button = "<div class='back-button-wrapper'><div class='back-button-container'><button class='back-button'>Back</button><div class='close-button-wrapper'></div></div>";
    //var close_button = "<div class='close-button-wrapper'><button class='close-button'>close</button></div>";
    // $('#wprmenu_bar').after(back_button);
  
    setTimeout(function (){
      $('.cbp-spmenu > ul > li.menu-item-has-children > .sub-menu').before(back_button);
    }, 500);
    //$('#mg-wprm-wrap').prepend(close_button);
  
    var search_button = "<button class='search-button'></button>";
    $('#wprmenu_bar .hamburger').before(search_button);
  
    $('#wprmenu_bar .search-button').click(function () {
      $('.wpr-search-form input').focus();
    });
  
    $("#wprmenu_menu_ul li.menu-item-has-children:not('.quicklinks_menu') .wprmenu_icon").click(function () {
      $(this).parent().addClass("current-item-active").children("ul.sub-menu").show();
      $('body').addClass('active-back-button');
    });

      /** Back Button **/
  $(".cbp-spmenu").on('click', '.back-button-wrapper .back-button', function (e) {
    e.preventDefault();
    var menuList = $("#wprmenu_menu_ul li.menu-item-has-children");
    menuList.removeClass("current-item-active");
    $('body').removeClass("active-back-button");
    menuList.children("ul.sub-menu").hide();
    menuList.children(".wprmenu_icon").removeClass("wprmenu_par_opened");
  });


  $("#wprmenu_menu_ul li").each(function (index) {
    if ($(this).hasClass('current-item-active')) {
        $(this).children('.sub-menu').css('display', 'none');
        $(this).removeClass('current-item-active');
        $(this).children('.wprmenu_icon').removeClass('wprmenu_par_opened');
    }
});
});