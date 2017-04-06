<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
switch( $post->post_parent ) {
    case 8:
        get_template_part( 'page', 'service' ); // page individuelle pour les services
        break;

    default:
        get_template_part( 'page', 'content' );
        break;
}
?>

<?php endwhile; ?>

<?php get_footer();