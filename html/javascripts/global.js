jQuery(document).ready(function(){
    $ = jQuery;

    // sticky sidebar
    init_sticky_bar();

    // ok
    be_responsive_fucking_table();

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
        var parent = $(this).parent('li');
        var btn = $(this).parent('li').find('span[role="button"]');
        var item = $(this).parent('li').find('> a').text();

        if( parent.hasClass('active') || parent.hasClass('current-menu-item') || parent.hasClass('current-menu-ancestor') ) {
            btn.addClass('active');
            btn.attr("aria-pressed", "true");
            btn.attr("title", "Cliquez ici pour fermer le sous-menu de " + item + "");
        } else {
            $(this).hide();
            btn.attr("title", "Cliquez ici pour ouvrir le sous-menu de " + item + "");
        }
    });

    //    if( $('ul[role="menubar"]').find('span[role="button"]').hasClass('active') ) {
    if( $('ul[role="menubar"] > li').hasClass('active') || $('ul[role="menubar"] > li').hasClass('current-menu-item') || $('ul[role="menubar"] > li').hasClass('current-menu-ancestor') ) {
        $(this).parent().find('ul').show();
    }

    $('ul[role="menubar"]').find('span[role="button"]').on('click', function(e){
        var pressed = $(this).attr("aria-pressed") == "true";
        //change la valeur de aria-pressed quand le bouton est basculé :
        $(this).attr("aria-pressed", pressed ? "false" : "true");

        $(this).stop( true, true ).toggleClass('active');
        $(this).blur(); // Supprime le focus
        $(this).parent().find('ul').stop( true, true ).slideToggle();

        var item = $(this).parent('li').find('> a').text();

        if( $(this).hasClass('active') ) {
            $(this).attr("title", "Cliquez ici pour fermer le sous-menu de " + item + "");
        } else {
            $(this).attr("title", "Cliquez ici pour ouvrir le sous-menu de " + item + "");
        }

        e.preventDefault();
    });
    $('ul[role="menubar"]').find('span[role="button"]').on('keypress', function(e){
        if(e.which === 13 || e.which === 32) { // 13 = touche enter, 32 = espace
            var pressed = $(this).attr("aria-pressed") == "true";
            //change la valeur de aria-pressed quand le bouton est basculé :
            $(this).attr("aria-pressed", pressed ? "false" : "true");

            $(this).stop( true, true ).toggleClass('active');
            $(this).parent().find('ul').stop( true, true ).slideToggle();

            var item = $(this).parent('li').find('> a').text();

            if( $(this).hasClass('active') ) {
                $(this).attr("title", "Cliquez ici pour fermer le sous-menu de " + item + "");
            } else {
                $(this).attr("title", "Cliquez ici pour ouvrir le sous-menu de " + item + "");
            }
        }

        //        e.preventDefault();
    });


    // Bouton menu pour la version mobile
    $('#menu-button').on('click', function(e){
        var pressed = $(this).attr("aria-pressed") == "true";
        //change la valeur de aria-pressed quand le bouton est basculé :
        $(this).attr("aria-pressed", pressed ? "false" : "true");
        //        $(this).blur(); // Supprime le focus => ne pas supprimer le focus car lors du clic au clavier on perd le focus
        $(this).stop( true, true ).toggleClass('active');
        $('#sidebar').stop( true, true ).toggleClass('active');

        e.preventDefault();
    });


    // spinner des boutons
    $('a[role="button"], .button').not('.not-loading').on('click', function() {
        $(this).addClass('is-loading');
    });


    // Bouton en voir plus dans Nos services
    $('section#service').find('.article').find('.visibility-toggle').fadeOut();
    $('section#service').find('.article').find('.button').on('click', function() {
        var $btn = $(this);
        $btn.parents('.content-article').find('.visibility-toggle').stop( true, true ).slideToggle('slow', function(){
            //            $btn.blur(); // Supprime le focus
            $btn.toggleClass('active');

            if( $btn.hasClass('active') ) {
                $btn.attr("title", "Cliquez ici pour en voir moins");
                $btn.html("En voir moins");
            } else {
                $btn.attr("title", "Cliquez ici pour en voir plus");
                $btn.html("En voir plus");
            }
        });
    });


    // FAQ Accueil
    $('.answer').hide();
    $('.question').on('click', function() {
        $(this).parent('.faq').find('.answer').stop( true, true ).slideToggle('slow', function(){
            $(this).parent('.faq').find('.question').toggleClass('active'); 
        });
    });
});


function init_sticky_bar() {
    $ = jQuery

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

// Source => https://sitesforprofit.com/responsive-tables-in-wordpress
function be_responsive_fucking_table() {
    $ = jQuery

    $('main').find('table').each(function() {
        $(this).wrap( "<div class='table-wrapper'></div>" );
    });

    $('.table-wrapper').on('click tap scroll', function() {
        $(this).addClass('clicked');
    });

    //    var headertext = [];
    //    var footertext = [];
    //    var headers = document.querySelectorAll("thead");
    //    var footers = document.querySelectorAll("tfoot");
    //    var tablebody = document.querySelectorAll("tbody");
    //
    //    for( var i = 0; i < headers.length; i++ ) {
    //        headertext[i]=[];
    //
    //        for ( var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++ ) {
    //            var current = headrow;
    //            headertext[i].push(current.textContent.replace(/\r?\n|\r/,""));
    //        }
    //    }
    //
    //    for( var i = 0; i < footers.length; i++ ) {
    //        footertext[i]=[];
    //
    //        for ( var j = 0, footrow; footrow = footers[i].rows[0].cells[j]; j++ ) {
    //            var current = footrow;
    //            footertext[i].push(current.textContent.replace(/\r?\n|\r/,""));
    //        }
    //    }
    //
    //    if ( headers.length > 0 ) {
    //        for ( var h = 0, tbody; tbody = tablebody[h]; h++ ) {
    //            for ( var i = 0, row; row = tbody.rows[i]; i++ ) {
    //                for ( var j = 0, col; col = row.cells[j]; j++ ) {
    //                    col.setAttribute("data-th", headertext[h][j]);
    //                }
    //            }
    //        }
    //    }
    //
    //    if ( footers.length > 0 ) {
    //        for ( var h = 0, tbody; tbody = tablebody[h]; h++ ) {
    //            for ( var i = 0, row; row = tbody.rows[i]; i++ ) {
    //                for ( var j = 0, col; col = row.cells[j]; j++ ) {
    //                    col.setAttribute("data-tf", footertext[h][j]);
    //                }
    //            }
    //        }
    //    }
}