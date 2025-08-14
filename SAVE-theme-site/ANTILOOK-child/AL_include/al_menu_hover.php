<?php

/* ================================ */
/* BOOTSTRAP 4 MENU HOVER
/* ================================ */

function al_menu_hover_scripts() {
    wp_enqueue_script(
        'menu-hover-js',
        get_stylesheet_directory_uri() . '/AL_include/js/al_menu_hover.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'al_menu_hover_scripts' );