<?php

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function theme_setup() {
    // Charge les langues
    //    load_theme_textdomain( 'lechampduplatane', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'archive-single', 280, 280, true );
    //    add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

    /* Ajout les menus au theme */
    register_nav_menus( array(
        'main'      => 'Menu principal',
        //        'footer-1'  => 'Menu accès rapides (pied de page)',
        //        'footer-2'  => 'Menu Le Champ du Platane (pied de page)',
        //        'footer-3'  => 'Menu social (pied de page)',
    ));

    /* ajout les input html5 comme type=email etc.. */
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}
add_action('after_setup_theme', 'theme_setup');


function theme_widgets_init() {
    register_sidebar( array(
        'name'          => 'Menu accès rapides (pied de page)',
        'id'            => 'widget-footer-1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="title" role="heading">',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name'          => 'Menu Le Champ du Platane (pied de page)',
        'id'            => 'widget-footer-2',
        'before_widget' => '<div itemscope itemtype="http://schema.org/Organization">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="title" role="heading">',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name'          => 'Menu social (pied de page)',
        'id'            => 'widget-footer-3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="title" role="heading">',
        'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name'          => 'Crédits (pied de page)',
        'id'            => 'widget-footer-4',
        'before_widget' => '<div class="sub-footer">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="title visuallyhidden" role="heading">',
        'after_title'   => '</p>',
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );


function theme_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>', esc_url( get_permalink( get_the_ID() ) ), sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', get_the_title( get_the_ID() ) ) );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'theme_excerpt_more' );


function theme_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'theme_pingback_header' );


function theme_scripts() {
    // Theme stylesheet.
    wp_enqueue_style( 'main-style', get_theme_file_uri( '/stylesheets/main.css' ) );

    //    // Load the Internet Explorer 8 specific stylesheet.
    //    wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
    //    wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );
    //
    //    // Load the html5 shiv.
    //    wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
    //    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'global-js', get_theme_file_uri( '/javascripts/global.js' ), array( 'jquery' ), true );
    wp_enqueue_script( 'jquery-sticky-kit', get_theme_file_uri( '/javascripts/modules/jquery.sticky-kit.js' ), array( 'jquery' ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// Supprime le type='text/css' de la balise style => HTML 4
function theme_hide_style_type($src) {
    return str_replace("type='text/css'", "", $src);
}
add_filter('style_loader_tag', 'theme_hide_style_type');


// Supprime le type='text/javascript' de la balise script => HTML 4
function theme_hide_script_type($src) {
    return str_replace("type='text/javascript'", "", $src);
}
add_filter('script_loader_tag', 'theme_hide_script_type');


//function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
//	$width = $size[0];
//
//	if ( 740 <= $width ) {
//		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
//	}
//
//	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
//		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
//			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
//		}
//	}
//
//	return $sizes;
//}
//add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
    if ( is_archive() || is_search() || is_home() ) {
        $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
    } else {
        $attr['sizes'] = '100vw';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );


// Ajout de la fonction 'Un extrait' sur une page au lieu d'un article
function wpc_excerpt_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action('admin_menu', 'wpc_excerpt_pages');


// ajoute l'attribut ordre au type post (article)
function theme_posts_order() {
    add_post_type_support( 'post', 'page-attributes' );
}
add_action( 'admin_init', 'theme_posts_order' );


// Change le logo de la partie d'administration
function my_login_logo() { ?>
<style type="text/css">
    body.login div#login h1 a {
        background-size: 269px 100px;
        height: 100px;
        width: 269px;
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
    }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// change l'url du logo du login form
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


// change le title du logo du login form
function my_login_logo_url_title() {
    $title = get_bloginfo('name', 'display');
    $site_description = get_bloginfo('description', 'display');

    $return = $title;

    if( $site_description ) {
        $return .= ' - '.$site_description;
    }

    return $return;
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


// Remove Category: %s etc.
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif( is_tax() ) {
        $title = single_term_title('', false);
    }
    return $title;
});


function theme_tinymce_settings($settings) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;';

    //    // Command separated string of extended elements
    //    $ext = 'ul[role|aria-label], span[itemscope|itemtype|itemprop|role]';
    //    //    $ext = 'span, *[itemscope|itemtype|itemprop|role]';
    //
    //    // Add to extended_valid_elements if it alreay exists
    //    if ( isset( $init['extended_valid_elements'] ) ) {
    //        $settings['extended_valid_elements'] .= ',' . $ext;
    //    } else {
    //        $settings['extended_valid_elements'] = $ext;
    //    }

    //    $ext = "@[itemscope|itemtype|itemprop|content|role|aria-label],span,ul,li,meta,link";
    //    // Add to extended_valid_elements if it alreay exists
    //    if ( isset( $init['extended_valid_elements'] ) ) {
    //        $settings['extended_valid_elements'] .= ',' . $ext;
    //    } else {
    //        $settings['extended_valid_elements'] = $ext;
    //    }

    $ext = '*[*]';
    $settings['valid_elements'] = $ext;
    $settings['extended_valid_elements'] = $ext;

    //    // Define the style_formats array
    //    $style_formats = array(
    //        // Each array child is a format with it's own settings
    //        array(
    //        'title'     => 'Transformer un lien en bouton',
    //        'classes'   => 'btn',
    //        'wrapper'   => false,
    //        'selector'  => 'a'
    //    ),
    //        array(
    //        'title'     => 'H2 => H4',
    //        'classes'   => 'title-4',
    //        'wrapper'   => false,
    //        'selector'  => 'h2'
    //    ),
    //        array(
    //        'title'     => 'H3 => H4',
    //        'classes'   => 'title-4',
    //        'wrapper'   => false,
    //        'selector'  => 'h3'
    //    ),
    //    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    //    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
add_filter( 'tiny_mce_before_init', 'theme_tinymce_settings' );


// Walker personnalisé avec role + schema
class LCDP_Walker_Nav_Menu extends Walker_Nav_Menu {
    public $nb_smenu;
    public $tabindex;

    /**
	 * What the class handles.
	 *
	 * @since 3.0.0
	 * @access public
	 * @var string
	 *
	 * @see Walker::$tree_type
	 */
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

    /**
	 * Database fields to use.
	 *
	 * @since 3.0.0
	 * @access public
	 * @todo Decouple this.
	 * @var array
	 *
	 * @see Walker::$db_fields
	 */
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    /**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        global $nb_smenu;
        global $tabindex;
        $nb_smenu++;
        $tabindex++;

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        //        $output .= "{$n}{$indent}<ul class=\"sub-menu\">{$n}";
        $output .= '<span tabindex="' . $tabindex . '" role="button" aria-controls="smenu' . $nb_smenu . '" aria-pressed="false" title="Cliquez ici pour ouvrir ou fermer le sous-menu de Nos services"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>';
        $output .= "{$n}{$indent}<ul id=\"smenu$nb_smenu\" role=\"menu\" aria-hidden=\"true\">{$n}";
    }

    /**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
    }

    /**
	 * Starts the element output.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 * @see Walker::start_el()
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $tabindex;
        $tabindex++;

        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        /**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li role="menuitem"' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        /**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        //        $tabindex = $item->menu_order;

        $item_output = $args->before;

        $aria_current = strpos($class_names, 'current-menu-item');
        if( $aria_current === false ) {
            $item_output .= '<a tabindex="' . $tabindex . '" itemprop="url"'. $attributes .'><span itemprop="name">';
        } else {
            $item_output .= '<a aria-current="page" tabindex="' . $tabindex . '" itemprop="url"'. $attributes .'><span itemprop="name">';
        }

        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;

        /**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
	 * Ends the element output, if needed.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
}