<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label for="<?php echo $unique_id; ?>">Recherche <span class="required">obligatoire</span></label>
        <input required type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="Veuillez taper votre recherche" value="<?php echo get_search_query(); ?>" name="s">
    </div>

    <div><button type="submit">Valider votre recherche</button></div>
</form>