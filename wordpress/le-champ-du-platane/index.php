<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage" id="index" class="post">
    <?php get_template_part( 'page', 'content' ); ?>
</section>

<?php endwhile; ?>

<?php else : ?>

<?php get_template_part( 'page', 'none' ); ?>

<?php endif; ?>

<?php get_footer();