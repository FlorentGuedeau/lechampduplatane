<?php get_header(); // page Nos services ?>

<?php while ( have_posts() ) : the_post(); ?>

<section itemprop="mainContentOfPage" id="services" class="archive">
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
                    <a href="<?php the_permalink(); ?>" title="Cliquez ici pour en savoir plus">
                        <?php the_post_thumbnail( 'archive-single' ); ?>
                    </a>
                </div>
                <?php endif; ?>

                <div class="content-article">
                    <h2>
                        <a href="<?php the_permalink(); ?>" title="Cliquez ici pour en savoir plus">
                            <?php if( get_field( "nos_services_title" ) ) : ?>
                            <?php echo get_field( "nos_services_title" ); ?>
                            <?php else : ?>
                            <?php the_title(); ?>
                            <?php endif; ?>
                        </a>
                    </h2>

                    <div>
                        <?php the_excerpt(); ?>
                    </div>

                    <footer>
                        <a role="button" href="<?php the_permalink(); ?>" title="Cliquez ici pour en savoir plus">En savoir plus</a>
                    </footer>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php endif; ?>
    </div>

    <?php edit_post_link('Modifier la page', '<p class="edit-post-link txt-right">', '</p>'); ?>
</section>

<?php endwhile; ?>

<?php get_footer();