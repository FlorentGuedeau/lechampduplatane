<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage" id="page" class="post">
    <?php get_template_part( 'page', 'content' ); ?>
</section>

<?php endwhile; ?>

<?php get_footer();