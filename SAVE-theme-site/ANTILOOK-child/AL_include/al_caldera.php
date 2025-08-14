<?php

/* ============================== */
/* 			CALDERA  	      	  */
/* ============================== */

//* Add Font Awesome Support
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );

function enqueue_font_awesome() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
}


/* ================================= */
/* ENREGISTREMENT DES PIÈCES JOINTES */
/* ================================= */
add_filter( 'caldera_forms_upload_directory', function(){
	return 'form-uploads';
});

add_filter( 'caldera_forms_upload_directory', function( $dir, $field_id, $form_id ){
	$field = Caldera_Forms_Field_Util::get_field( $field_id, Caldera_Forms_Forms::get_form(  $form_id ) );
	if ( is_array( $field ) ) {
		$dir = sanitize_title( $field[ 'slug' ] );
	}
	return $dir;
}, 10, 3  );
