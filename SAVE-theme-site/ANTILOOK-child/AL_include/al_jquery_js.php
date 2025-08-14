<?php

/* ========================= */
/* REMOVE JQUERY
/* ========================= */


function remove_jquery_scripts() {    
    if( !is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', false);
		wp_enqueue_script('jquery');
	}
}
add_action( 'wp_enqueue_scripts', 'remove_jquery_scripts' );
/* ========================= */
/* ADD CUSTOM JQUERY
/* ========================= */
function al_jquery_scripts() {    
    wp_enqueue_script( 'jq-3-4', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js');
}

add_action( 'wp_enqueue_scripts', 'al_jquery_scripts' );