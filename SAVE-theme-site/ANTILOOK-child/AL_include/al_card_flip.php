<?php

/* ========================== */
/* AJOUT GESTION DU LOGO      */
/* ========================== */

function al_card_flip_scripts() {

	/*  AJOUT JS   */
	wp_enqueue_script( 'card-flip-js', get_template_directory_uri() . '/AL_include/js/al_card_flip.js', '', '', true );
 
	/*  AJOUT CSS   */
	wp_enqueue_style('card-flip-css', get_template_directory_uri() .'/AL_include/css/al_card_flip.css');
}

add_action( 'wp_enqueue_scripts', 'al_card_flip_scripts' );
