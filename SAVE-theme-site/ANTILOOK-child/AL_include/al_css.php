<?php


/* ======================================== */
/* RE-ORDER CSS LOAD
/* ======================================== */
function al_dequeue_styles() {
	// suppression des styles d'origine
	wp_dequeue_style( 'antilook-style' );
	wp_deregister_style( 'antilook-style' );
}
add_action( 'wp_enqueue_scripts', 'al_dequeue_styles', 20 );


function al_enqueue_styles() {
	// parent style ( charge les CSS depuis le thème parent )
	wp_enqueue_style( 'antilook-style', get_template_directory_uri() .'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'al_enqueue_styles' );


/* ======================================== */
/* LOAD CSS
/* ======================================== */
function al_css_scripts() {
	// child style ( charge les CSS depuis le thème enfant après les CSS du thème parent )
	wp_enqueue_style( 'antilook-style', get_stylesheet_directory_uri() .'/style.css' );

	/* CSS MENU */
	wp_enqueue_style('menu-css', get_stylesheet_directory_uri() .'/css/al_menu.css');

	wp_enqueue_style('app-metier-css', get_stylesheet_directory_uri() .'/css/app_metier.css');

	wp_enqueue_style('section-css', get_stylesheet_directory_uri() .'/css/al_sections.css');

	wp_enqueue_style('agja-css', get_stylesheet_directory_uri() .'/css/al_agja.css');

	wp_enqueue_style('jeunesse-css', get_stylesheet_directory_uri() .'/css/al_jeunesse.css');

	wp_enqueue_style('tableaux-css', get_stylesheet_directory_uri() .'/css/al_tableaux.css');

	wp_enqueue_style('annuaire-css', get_stylesheet_directory_uri() .'/css/al_adherents_annuaire.css');

	wp_enqueue_style('recrutement-css', get_stylesheet_directory_uri() .'/css/al_recrutement.css');

}
add_action( 'wp_enqueue_scripts', 'al_css_scripts', 999 );
