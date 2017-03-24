<div class="article">
    <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'archive-single' ); ?>
    <div class="illustration">
        <a href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus">
            <?php the_post_thumbnail( 'archive-single' ); ?>
        </a>
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
            <?php edit_post_link('Modifier ce contenu', '<p class="edit-post-link">', '</p>'); ?>
        </footer>
    </div>
</div>