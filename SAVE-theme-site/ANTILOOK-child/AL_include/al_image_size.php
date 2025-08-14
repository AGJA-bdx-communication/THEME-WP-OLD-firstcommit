<?php

//* ==================================== */
/* 	TAILLE DES IMAGES
/* ==================================== */
function wpse_setup_theme() {
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'masonry-thumbnail-size', 300, 300, true );
}
add_action( 'after_setup_theme', 'wpse_setup_theme' );

/*
function bbx_images( $html ) {
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
}
add_filter( 'post_thumbnail_html', 'bbx_images', 10 );
add_filter( 'image_send_to_editor', 'bbx_images', 10 );
add_filter( 'wp_get_attachment_link', 'bbx_images', 10 );
*/