<?php

function al_js_scripts() {

	/*  AJOUT ANIMATION HEADER  */	
	//wp_enqueue_script( 'anim-header-js', get_template_directory_uri() . '/AL_include/js/al_header_anim.js', array('jquery'), '', true );

	/*  AJOUT ANIMATION SLIDER  */	
	// wp_enqueue_script( 'anim-slider-js', get_template_directory_uri() . '/AL_include/js/carousel_slider.js', array('jquery'), '', true );

}

add_action( 'wp_enqueue_scripts', 'al_js_scripts' );


/* INJECTION APP METIER */
function app_metier_js_scripts() {
	wp_enqueue_script( 'app-metier-js', get_stylesheet_directory_uri() . '/js/app_metier.js', '', '', true );

}

add_action( 'wp_enqueue_scripts', 'app_metier_js_scripts' );

// function app_metier_js_scripts() {
//     wp_enqueue_script(
//         'app-metier-js',
//         get_stylesheet_directory_uri() . '/js/app_metier.js',
//         array( 'app' )
//     );
// }

// add_action( 'wp_enqueue_scripts', 'app_metier_js_scripts' );

