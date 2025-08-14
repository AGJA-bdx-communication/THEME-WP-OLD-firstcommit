<?php

/* ========================================================= */
/* SUPPRIMER LE SIDEBAR PAR DÉFAUT VENANT DU THEME PARENT
/* ========================================================= */
function unregister_old_sidebars() {
    unregister_sidebar('sidebar-1');
}
add_action( 'widgets_init', 'unregister_old_sidebars' );


/* ============================== */
/* AJOUT DES WIDGETS PERSO
/* ============================== */
if ( function_exists('register_sidebar') ) {
	register_sidebar(
		array(
		'id' => 'pages_courantes',
		'name' => 'Sidebar pages courantes :',
		'description' => 'Sidebar pour les pages courantes',
		'before_widget'  => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
		)
	);
}


/* ========================================================= */
/* TRANSFORME LES UL/LI PAR DÉFAUT EN DIV OU AUTRE...
/* ========================================================= 
function antilook_widgets() {
	register_sidebar( array(
		'id' => 'custom-sidebar',
		'name' => '',
		'before_widget'  => '<div class="site__sidebar__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<p class="site__sidebar__widget__title">',
		'after_title' => '</p>',
	) );
}
add_action( 'widgets_init', 'antilook_widgets' );
*/



/* ========================================================= */
/* AJOUTE LA GESTION DES SHORTCODE DANS LES WIDGETS
/* ========================================================= */
// add_filter('widget_text', 'wpm_php_text', 99);

// function wpm_php_text($text) {
// 	if (strpos($text, '<' . '?') !== false) {
// 		ob_start();
// 		eval('?' . '>' . $text);
// 		$text = ob_get_contents();
// 		ob_end_clean();
//  	}
// 	return $text;
// }

add_filter('widget_text', 'do_shortcode');

add_filter( 'widget_display_callback', 'wpse8170_widget_display_callback', 10, 3 );
function wpse8170_widget_display_callback( $instance, $widget, $args ) {
    $instance['filter'] = false;
    return $instance;
}