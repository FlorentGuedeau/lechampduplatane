<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <meta itemprop="target" content="<?php echo esc_url( home_url( '/' ) ); ?>?s=<?php echo get_search_query(); ?>"/>
    <div>
        <label for="<?php echo $unique_id; ?>"><?php _e('Recherche', 'le-champ-du-platane'); ?> <span class="required"><?php _e('obligatoire', 'le-champ-du-platane'); ?></span></label>
        <input itemprop="query-input" required type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php _e('Veuillez taper votre recherche', 'le-champ-du-platane'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </div>

    <div><button type="submit"><?php _e('Valider votre recherche', 'le-champ-du-platane'); ?></button></div>
</form>