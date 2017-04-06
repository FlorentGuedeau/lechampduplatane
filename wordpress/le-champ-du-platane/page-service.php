<section itemprop="mainContentOfPage" id="service" class="archive">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 itemprop="name"><?php the_title(); ?></h1>

        <?php the_content(); ?>
        <div class="clear"></div>

        <?php if( get_field( "service_tarifs" ) ) : ?>
        <div id="tarifs">
            <h2 class="title-h1">Tarifs</h2>
            <?php echo get_field( "service_tarifs" ); ?>
        </div>
        <?php endif; ?>
    </div>

    <?php edit_post_link('Modifier la page', '<p class="edit-post-link txt-right">', '</p>'); ?>
</section>