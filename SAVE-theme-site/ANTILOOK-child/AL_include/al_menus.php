<?php

/* ============================== */
/* 				MENUS	      	  */
/* ============================== */
function al_menu_scripts() {

	register_nav_menu('menu-general',__( 'Menu Général' ));

	register_nav_menu('menu-jeunesse-periscolaire',__( 'Menu Jeunesse Périscolaire' ));
	register_nav_menu('menu-jeunesse-mercredis',__( 'Menu Jeunesse Mercredis' ));
	register_nav_menu('menu-jeunesse-vacances',__( 'Menu Jeunesse Vacances' ));

	register_nav_menu('menu-sport-competition',__( 'Menu Sports de compétition' ));
	register_nav_menu('menu-sport-detente',__( 'Menu Sports de détente' ));
	register_nav_menu('menu-socio-culturelle',__( 'Menu Socio-culturel' ));
	register_nav_menu('menu-bien-etre',__( 'Menu Bien Être' ));

	register_nav_menu('menu-footer',__( 'Menu Footer' ));

}
add_action( 'init', 'al_menu_scripts' );



/* ========================================= */
/* AJOUT D'UN TIMESTAMP AUX LIENS DES MENUS
/* ========================================= */
add_filter( 'wp_nav_menu_objects', 'wpse_76401_filter' );

function wpse_76401_filter( $items )
{
	$datetime = strtotime("now");

    $out = array();
    foreach ( $items as $item )
    {
        if ( isset ( $item->url ) )
            $item->url = add_query_arg( 't', $datetime, $item->url );

        $out[] = $item;
    }

    return $out;
}