
<?php

function al_masonry_scripts() {

	/*  AJOUT DE MASONRY  */	
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/AL_include/js/isotope.pkgd.min.js', array('masonry'), '', true );

	wp_enqueue_script( 'anim-js', get_template_directory_uri() . '/AL_include/js/anim.js', array('masonry'), '', true );

	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/AL_include/lib/wow/dist/wow.js', array('masonry'), '', true );

	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/AL_include/lib/flexslider/jquery.flexslider.js', array('masonry'), '', true );

	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/AL_include/lib/imagesloaded/imagesloaded.pkgd.js', array('masonry'), '', true );

	wp_enqueue_script( 'popup-js', get_template_directory_uri() . '/AL_include/lib/magnific-popup/dist/jquery.magnific-popup.js', array('masonry'), '', true );

	wp_enqueue_script( 'text-rotator-js', get_template_directory_uri() . '/AL_include/lib/simple-text-rotator/jquery.simple-text-rotator.min.js', array('masonry'), '', true );

	wp_enqueue_script( 'carousel-js', get_template_directory_uri() . '/AL_include/lib/owl.carousel/dist/owl.carousel.min.js', array('masonry'), '', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/AL_include/js/main.js', array('masonry'), '', true );

	wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/AL_include/js/plugins.js', array('masonry'), '', true );

}

add_action( 'wp_enqueue_scripts', 'al_masonry_scripts' );