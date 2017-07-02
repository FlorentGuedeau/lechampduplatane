<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="author" content="Constantin Gorioux">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body itemscope itemtype="http://schema.org/WebPage" <?php body_class(); ?>>
        <div id="wrapper">
            <noscript><div class="states warning"><?php _e('Pour une meilleure utilisation de ce site, veuillez activer JavaScript dans votre navigateur.', 'le-champ-du-platane'); ?></div></noscript>

            <aside id="sidebar" aria-label="Menu latéral">
                <div id="sticky-sidebar">

                    <header role="banner" class="main-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php _e('Retour à l\'accueil', 'le-champ-du-platane'); ?>">
                            <span role="heading"><?php bloginfo( 'name' ); ?><?php echo ', '; ?><?php bloginfo( 'description' ); ?></span>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-le-champ-du-platane-paysagiste-concepteur.png" width="200" height="193" alt="<?php bloginfo( 'name' ); ?><?php echo ', '; ?><?php bloginfo( 'description' ); ?>">
                        </a>
                    </header>

                    <?php if ( has_nav_menu( 'main' ) ) : ?>
                    <nav role="navigation" aria-label="Menu principal">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'main',
                            'depth'             => 2,
                            'container'         => false,
                            'items_wrap'        => '<ul role="menubar" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                            'walker'            => new LCDP_Walker_Nav_Menu()
                        ) );
                        ?>
                    </nav>
                    <?php endif; ?>
                </div>
            </aside>

            <button aria-pressed="false" type="button" id="menu-button" tabindex="1"><?php _e('Menu', 'le-champ-du-platane'); ?> <span></span></button>

            <main role="main">
                <div id="content">
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<div id="breadcrumbs">','</div>');
                    }
                    ?>