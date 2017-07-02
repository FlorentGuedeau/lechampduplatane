<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if( has_post_thumbnail() ) : ?>itemscope itemtype="https://schema.org/Article"<?php endif; ?>>
    <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'archive-single' ); ?>
    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="illustration">
        <a href="<?php the_permalink() ?>" title="<?php _e('Cliquez ici pour en savoir plus', 'le-champ-du-platane'); ?>">
            <?php the_post_thumbnail( 'archive-single' ); ?>
        </a>
        <meta itemprop="url" content="<?php echo $thumb[0]; ?>">
        <meta itemprop="width" content="<?php echo $thumb[1]; ?>">
        <meta itemprop="height" content="<?php echo $thumb[2]; ?>">
    </div>
    <?php endif; ?>

    <div class="content-article">
        <header>
            <h2 <?php if( has_post_thumbnail() ) : ?>itemprop="headline"<?php endif; ?>>
                <a href="<?php the_permalink() ?>" title="<?php _e('Cliquez ici pour en savoir plus', 'le-champ-du-platane'); ?>"><span <?php if( has_post_thumbnail() ) : ?>itemprop="mainEntityOfPage"<?php endif; ?>><?php the_title(); ?></span></a>
            </h2>
            <?php if( has_post_thumbnail() ) : ?>
            <small class="domhidden">
                <?php _e('Publié le', 'le-champ-du-platane'); ?> <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
                <?php _e('par', 'le-champ-du-platane'); ?> <span itemprop="author">Constantin Gorioux</span> <?php _e('chez', 'le-champ-du-platane'); ?> 
                <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <span itemprop="name"><?php bloginfo( 'name' ); ?></span>
                    <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logo-le-champ-du-platane-paysagiste-concepteur-schemaORG.jpg">
                        <meta itemprop="width" content="500">
                        <meta itemprop="height" content="495">
                    </span> 
                </span>
                . <?php _e('Modifié le', 'le-champ-du-platane'); ?> <time itemprop="dateModified" datetime="<?php the_modified_date('Y-m-d'); ?>"><?php the_modified_date( get_option( 'date_format' ) ); ?></time>
            </small>
            <?php endif; ?>
        </header>

        <div <?php if( has_post_thumbnail() ) : ?>itemprop="description"<?php endif; ?>>
            <?php the_excerpt(); ?>
        </div>

        <footer>
            <a <?php if( has_post_thumbnail() ) : ?>itemprop="url"<?php endif; ?> role="button" href="<?php the_permalink() ?>" title="<?php _e('Cliquez ici pour en savoir plus', 'le-champ-du-platane'); ?>"><?php _e('En savoir plus', 'le-champ-du-platane'); ?></a>
            <?php edit_post_link('Modifier l\'article', '/// <span class="edit-post-link">', '</span>'); ?>
        </footer>
    </div>
</article>