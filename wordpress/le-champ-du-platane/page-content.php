<section itemprop="mainContentOfPage" id="page" class="post">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 itemprop="name"><?php the_title(); ?></h1>

        <?php the_content(); ?>
    </div>
    <div class="clear"></div>

    <?php edit_post_link('Modifier la page', '<p class="edit-post-link txt-right">', '</p>'); ?>
</section>