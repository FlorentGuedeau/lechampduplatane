<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="author" content="Florent Guédeau">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

    <body itemscope itemtype="http://schema.org/WebPage" <?php body_class(); ?>>
        <div id="page" class="site">
            <div class="site-inner">
                <header id="masthead" class="site-header" role="banner">
                    <div class="site-header-main">
                        <div class="site-branding">
                            <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif;

                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->

                        <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                        <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

                        <div id="site-header-menu" class="site-header-menu">
                            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Primary Menu', 'twentysixteen' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu',
                                ) );
                                ?>
                            </nav><!-- .main-navigation -->
                            <?php endif; ?>

                            <?php if ( has_nav_menu( 'social' ) ) : ?>
                            <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php _e( 'Social Links Menu', 'twentysixteen' ); ?>">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'social',
                                    'menu_class'     => 'social-links-menu',
                                    'depth'          => 1,
                                    'link_before'    => '<span class="screen-reader-text">',
                                    'link_after'     => '</span>',
                                ) );
                                ?>
                            </nav><!-- .social-navigation -->
                            <?php endif; ?>
                        </div><!-- .site-header-menu -->
                        <?php endif; ?>
                    </div><!-- .site-header-main -->
                </header><!-- .site-header -->

                <div id="content" class="site-content">