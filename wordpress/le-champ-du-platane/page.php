<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage">
    <?php get_template_part( 'page', 'content' ); ?>
    <div class="clear"></div>
</section>

<?php endwhile; ?>

<?php get_footer();