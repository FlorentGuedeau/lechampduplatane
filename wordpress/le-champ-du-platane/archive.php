<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<section itemprop="mainContentOfPage" id="realisations" class="archive">
    <h1 itemprop="name"><?php the_archive_title(); ?></h1>

    <?php the_archive_description(); ?>

    <div class="cols">
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'archive', 'content' ); ?>

        <?php endwhile; ?>
    </div>

    <?php if ( is_paginated() ) : ?>
    <nav id="navigation">
        <?php lcdp_pagination(); ?>
    </nav>
    <?php endif; ?>
</section>

<?php else : ?>

<?php get_template_part( 'archive', 'none' ); ?>

<?php endif; ?>

<?php get_footer();