<?php get_header(); ?>

<section itemprop="mainContentOfPage" id="error-404">
    <h1 itemprop="name">Aie ! Cette page est introuvable</h1>

    <img src="<?php echo get_template_directory_uri(); ?>/images/404-le-champ-du-platane.jpg" width="1200" height="400" alt="Page non trouvée - 404">

    <p>Apparemment, rien n’a été trouvé à cette adresse. Essayez avec une recherche ?</p>

    <?php get_search_form(); ?>
</section>

<?php get_footer();