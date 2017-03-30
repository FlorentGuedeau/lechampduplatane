<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if( has_post_thumbnail() ) : ?> itemscope itemtype="https://schema.org/Article" <?php endif; ?>>
    <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'archive-single' ); ?>
    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="illustration">
        <a href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus">
            <?php the_post_thumbnail( 'archive-single' ); ?>
        </a>
        <meta itemprop="url" content="<?php echo $thumb[0]; ?>">
        <meta itemprop="width" content="<?php echo $thumb[1]; ?>">
        <meta itemprop="height" content="<?php echo $thumb[2]; ?>">
    </div>
    <?php endif; ?>

    <div class="content-article">
        <header>
            <h2 itemprop="headline">
                <a href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus"><span itemprop="mainEntityOfPage"><?php the_title(); ?></span></a>
            </h2>
            <small class="domhidden">
                Publié le <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
                par <span itemprop="author">Constantin Gorioux</span> chez 
                <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <span itemprop="name">Le Champ du Platane</span>
                    <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logo-le-champ-du-platane-paysagiste-concepteur-schemaORG.jpg">
                        <meta itemprop="width" content="500">
                        <meta itemprop="height" content="495">
                    </span> 
                </span>
                . Modifié le <time itemprop="dateModified" datetime="<?php the_modified_date('Y-m-d'); ?>"><?php the_modified_date( get_option( 'date_format' ) ); ?></time>
            </small>
        </header>

        <div itemprop="description">
            <?php the_excerpt(); ?>
        </div>

        <footer>
            <a itemprop="url" role="button" href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus">En savoir plus</a>
            <?php edit_post_link('Modifier l\'article', '<p class="edit-post-link">', '</p>'); ?>
        </footer>
    </div>
</article>
