<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if( has_post_thumbnail() ) : ?>itemscope itemtype="https://schema.org/Article"<?php endif; ?>>
    <header>
        <h1 <?php if( has_post_thumbnail() ) : ?>itemprop="headline"<?php endif; ?>>
            <span <?php if( has_post_thumbnail() ) : ?>itemprop="mainEntityOfPage"<?php endif; ?>><?php the_title(); ?></span>
        </h1>
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

            <?php if( has_post_thumbnail() ) : $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
            <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="<?php echo $thumb[0]; ?>">
                <meta itemprop="width" content="<?php echo $thumb[1]; ?>">
                <meta itemprop="height" content="<?php echo $thumb[2]; ?>">
            </span>
            <?php endif; ?>
        </small>
        <?php endif; ?>
    </header>

    <div <?php if( has_post_thumbnail() ) : ?>itemprop="articleBody"<?php endif; ?> class="article-content">
        <?php the_content(); ?>
    </div>
    <div class="clear"></div>
</article>

<?php
$categories = get_the_category();
if ( $categories && class_exists( 'Jetpack_RelatedPosts' ) && $categories[0]->term_id == 2 ) {
    echo do_shortcode( '[jetpack-related-posts]' );
}
?>

<?php edit_post_link('Modifier l\'article', '<p class="edit-post-link txt-right">', '</p>'); ?>