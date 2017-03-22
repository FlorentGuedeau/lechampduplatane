<div class="article">
    <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'archive-single' ); ?>
    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="illustration">
        <a href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus">
            <?php //the_post_thumbnail( 'archive-single' ); ?>
            <img src="http://placehold.it/280x280">
        </a>
        <meta itemprop="url" content="<?php echo $thumb[0]; ?>">
        <meta itemprop="width" content="<?php echo $thumb[1]; ?>">
        <meta itemprop="height" content="<?php echo $thumb[2]; ?>">
    </div>
    <?php endif; ?>

    <div class="content-article">
        <header>
            <h2>
                <a href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus"><?php the_title(); ?></a>
            </h2>
        </header>

        <div>
            <?php the_excerpt(); ?>
        </div>

        <footer>
            <a role="button" href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus">En savoir plus</a>
        </footer>
    </div>
</div>