<?php

/* BOOTSTRAP JS */
function al_hamburger_scripts() {
    wp_enqueue_script(
        'hamburger-js',
        get_stylesheet_directory_uri() . '/js/menu_hamburger.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'al_hamburger_scripts' );

