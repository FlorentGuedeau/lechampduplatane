jQuery(document).ready(function(){
    $ = jQuery;

    // sticky sidebar
    init_sticky_bar();

    var the_timer;
    $(window).on('resize', function(){
        init_sticky_bar();

        clearTimeout(the_timer);
        the_timer = setTimeout(function(){
            //console.log('resized');
        }, 75);
    });


    // Bouton ">" du menu
    $('ul[role="menubar"] > li > ul').each(function() {
        $(this).hide()
    });
    $('ul[role="menubar"]').find('span[role="button"]').on('click', function(e){
        var pressed = $(this).attr("aria-pressed") == "true";
        //change la valeur de aria-pressed quand le bouton est basculé :
        $(this).attr("aria-pressed", pressed ? "false" : "true");

        $(this).toggleClass('active');
        $(this).parent().find('ul').slideToggle();

        e.preventDefault();
    });
    $('ul[role="menubar"]').find('span[role="button"]').on('keypress', function(e){
        if(e.which === 13 || e.which === 32) { // 13 = touche enter, 32 = espace
            var pressed = $(this).attr("aria-pressed") == "true";
            //change la valeur de aria-pressed quand le bouton est basculé :
            $(this).attr("aria-pressed", pressed ? "false" : "true");

            $(this).toggleClass('active');
            $(this).parent().find('ul').slideToggle();
        }

        e.preventDefault();
    });


    // Bouton menu pour la version mobile
    $('#menu-button').on('click', function(e){
        var pressed = $(this).attr("aria-pressed") == "true";
        //change la valeur de aria-pressed quand le bouton est basculé :
        $(this).attr("aria-pressed", pressed ? "false" : "true");

        $(this).toggleClass('active');
        $('aside').toggleClass('active');

        e.preventDefault();
    });
});

function init_sticky_bar() {
    if($(window).width() > 995) {
        // Sticky sidebar : http://leafo.net/sticky-kit/
        try {
            $("#sticky-sidebar").stick_in_parent();
        } catch(e) {}
    } else {
        try {
            $("#sticky-sidebar").trigger("sticky_kit:detach");
        } catch(e) {}
    }
}