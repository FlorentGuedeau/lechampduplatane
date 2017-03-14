<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage">
    <h1 itemprop="name"><?php the_title(); ?></h1>

    <?php the_content(); ?>

    <div class="clear"></div>
</section>

<?php endwhile; ?>

<?php get_footer();