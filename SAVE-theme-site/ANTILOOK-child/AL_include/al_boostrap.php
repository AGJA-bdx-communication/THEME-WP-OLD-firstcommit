<?php

/* BOOTSTRAP JS */
function al_bootstrap_scripts() {
    wp_enqueue_script(
        'bootstrap-js',
        get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'al_bootstrap_scripts' );


/* BOOTSTRAP CSS 
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'antilook-style';
 
    wp_enqueue_style( 'bootstrap-style',
        get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

*/

function al_bootstrap_css_scripts() {
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() .'/bootstrap/css/bootstrap.css');
}

add_action( 'wp_enqueue_scripts', 'al_bootstrap_css_scripts' );