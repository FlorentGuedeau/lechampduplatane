<div id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
    <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'archive-single' ); ?>
    <div class="illustration">
        <a href="<?php the_permalink() ?>" title="<?php _e('Cliquez ici pour en savoir plus', 'le-champ-du-platane'); ?>">
            <?php the_post_thumbnail( 'archive-single' ); ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="content-article">
        <header>
            <h2>
                <a href="<?php the_permalink() ?>" title="<?php _e('Cliquez ici pour en savoir plus', 'le-champ-du-platane'); ?>"><?php the_title(); ?></a>
            </h2>
        </header>

        <div>
            <?php the_excerpt(); ?>
        </div>

        <footer>
            <a role="button" href="<?php the_permalink() ?>" title="<?php _e('Cliquez ici pour en savoir plus', 'le-champ-du-platane'); ?>"><?php _e('En savoir plus', 'le-champ-du-platane'); ?></a>
            <?php edit_post_link('Modifier ce contenu', ' /// <span class="edit-post-link">', '</span>'); ?>
        </footer>
    </div>
</div>
