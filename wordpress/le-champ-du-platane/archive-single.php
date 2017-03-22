<article itemscope itemtype="http://schema.org/Article">
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
                <a href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus" itemprop="mainEntityOfPage"><?php the_title(); ?></a>
            </h2>
            <small class="domhidden">
                Publié le <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
                par <span itemprop="author">Constantin Gorioux</span> chez 
                <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                    <span itemprop="name">Le Champ du Platane</span>
                    <meta itemprop="logo" content="#">
                </span>
            </small>
        </header>

        <div itemprop="description">
            <?php the_excerpt(); ?>
        </div>

        <footer>
            <a itemprop="url" role="button" href="<?php the_permalink() ?>" title="Cliquez ici pour en savoir plus">En savoir plus</a>
        </footer>
    </div>
</article>