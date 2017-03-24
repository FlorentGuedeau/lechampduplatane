<article <?php if( has_post_thumbnail() ) : ?> itemscope itemtype="https://schema.org/Article" <?php endif; ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1 itemprop="headline">
            <span itemprop="mainEntityOfPage"><?php the_title(); ?></span>
        </h1>
        <small class="domhidden">
            Publié le <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
            par <span itemprop="author">Constantin Gorioux</span> chez 
            <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <span itemprop="name">Le Champ du Platane</span>
                <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logo-le-champ-du-platane-paysagiste-concepteur-schemaORG.jpg" alt="Logo <?php bloginfo( 'name' ); ?><?php echo ', '; ?><?php bloginfo( 'description' ); ?>">
                    <meta itemprop="width" content="500">
                    <meta itemprop="height" content="495">
                </span> 
            </span>
            . Modifié le <time itemprop="dateModified" datetime="<?php the_modified_date('Y-m-d'); ?>"><?php the_modified_date( get_option( 'date_format' ) ); ?></time>

            <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
            <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="<?php echo $thumb[0]; ?>">
                <meta itemprop="width" content="<?php echo $thumb[1]; ?>">
                <meta itemprop="height" content="<?php echo $thumb[2]; ?>">
            </span>
            <?php endif; ?>
        </small>
    </header>

    <div itemprop="articleBody" class="article-content">
        <?php the_content(); ?>

        <div class="clear"></div>

        <?php
        wp_link_pages( array(
            'before'      => '<div class="page-links">Pages:',
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) );
        ?>
    </div>
</article>