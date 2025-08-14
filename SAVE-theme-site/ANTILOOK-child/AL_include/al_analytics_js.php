<?php

function al_analytics_scripts() {

	/*  AJOUT GOOGLE ANALYTICS  */	
	wp_enqueue_script( 'anim-analytics-js', get_template_directory_uri() . '/AL_include/js/analytics.js', array('jquery'), '', true );

}

add_action( 'wp_enqueue_scripts', 'al_analytics_scripts' );