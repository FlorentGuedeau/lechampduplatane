<?php get_header(); // Page Contact ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage" id="contact" class="post">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 itemprop="name"><?php the_title(); ?></h1>

        <div class="cols">
            <div class="col">
                <?php the_content(); ?>

                <div class="clear"></div>
            </div>

            <?php if( get_field( "contact_right_column" ) ) : ?>
            <div class="col">
                <?php echo get_field( "contact_right_column" ); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php edit_post_link('Modifier la page', '<p class="edit-post-link txt-right">', '</p>'); ?>
</section>

<?php endwhile; ?>

<?php get_footer();