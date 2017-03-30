<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage" id="post" class="post">
    <?php get_template_part( 'single', 'content' ); ?>
</section>

<?php endwhile; ?>

<?php get_footer();