<?php get_header(); ?>

<section itemprop="mainContentOfPage" id="search" class="archive">

    <?php if ( have_posts() ) : ?>
    <h1 itemprop="name">Résultats de recherche pour &laquo; <em><?php echo get_search_query(); ?></em> &raquo;</h1>
    <?php else : ?>
    <h1 itemprop="name">Aucun résultat</h1>
    <?php endif; ?>


    <?php if ( have_posts() ) : ?>

    <div class="cols">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'archive', 'search' ); ?>

        <?php endwhile; ?>
    </div>

    <?php if ( is_paginated() ) : ?>
    <nav id="navigation">
        <?php lcdp_pagination(); ?>
    </nav>
    <?php endif; ?>

    <?php else : ?>

    <p>Désolé, mais rien ne correspond à votre recherche. Veuillez réessayer avec des mots différents.</p>

    <?php get_search_form(); ?>

    <?php endif; ?>
</section>

<?php get_footer();