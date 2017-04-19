<section itemprop="mainContentOfPage" id="service" class="archive">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 itemprop="name"><?php the_title(); ?></h1>

        <?php the_content(); ?>
        <div class="clear"></div>

        <?php $sub_page = new WP_Query( array( 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_parent' => $post->ID, 'posts_per_page' => -1, 'post_status' => 'publish' ) ); ?>
        <?php if( !empty($sub_page) && $sub_page->post_count > 0 ) : ?>
        <div class="cols">
            <?php while ( $sub_page->have_posts() ) : $sub_page->the_post(); ?>
            <div class="article">
                <?php if( has_post_thumbnail() ) : ?>
                <div class="illustration">
                    <?php the_post_thumbnail( 'archive-single' ); ?>
                </div>
                <?php endif; ?>

                <div class="content-article">
                    <h2><?php the_title(); ?></h2>

                    <div>
                        <?php $content = get_extended( $post->post_content ); ?>
                        <?php echo $content['main']; ?></p> <!--  le </p> permet de fermer le début du lien more -->

                    <?php if ( !empty($content['extended']) ) : ?>
                    <div class="visibility-toggle">
                        <p><?php echo $content['extended']; ?><!--  le <p> permet d'ouvrir la fin du lien more -->
                    </div>
                    <?php endif; ?>
                </div>

                <footer>
                    <button type="button" class="button not-loading" title="Cliquez ici pour en voir plus">En voir plus</button>
                    <?php edit_post_link('Modifier la page', '<p class="edit-post-link txt-center">', '</p>'); ?>
                </footer>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>

    <?php if( get_field( "service_tarifs" ) ) : ?>
    <div id="tarifs">
        <h2 class="title-h1">Tarifs</h2>
        <?php echo get_field( "service_tarifs" ); ?>
    </div>
    <?php endif; ?>
    </div>

<?php edit_post_link('Modifier la page', '<p class="edit-post-link txt-right">', '</p>'); ?>
</section>
