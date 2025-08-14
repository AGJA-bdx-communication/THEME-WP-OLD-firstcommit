<?php

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyDeIJYa4RQEAj5y8t80YWJ2Ma7srUksXps';
	return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function al_google_map_scripts() {
	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDeIJYa4RQEAj5y8t80YWJ2Ma7srUksXps', array(), '3', true );
	wp_enqueue_script( 'google', get_template_directory_uri() . '/AL_include/js/google-maps.js', array('google-map', 'jquery'), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'al_js_scripts' );



function prefix_enqueue_scripts() {

    wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDeIJYa4RQEAj5y8t80YWJ2Ma7srUksXps' );   
	#wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=KEY', true );  
	#wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=KEY', '', true );  
    wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/acf-map.js', array('jquery', 'google-maps'), '', true);

}
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_scripts' );