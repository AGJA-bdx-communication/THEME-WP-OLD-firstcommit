<?php

/* ==================================== */
/* CHANGER LE NOM DE LA PAGE WP-LOGIN
/* ==================================== 
add_filter('site_url',  'wplogin_filter', 10, 3);
function wplogin_filter( $url, $path, $orig_scheme )
{
	$old  = array( "/(wp-login\.php)/");
	$new  = array( "backoffice");
	return preg_replace( $old, $new, $url, 1);
}
*/


/* ==================================== */
/* BLOQUER L'ACCÈS A LA PAGE WP-LOGIN
/* ==================================== 
add_action('init','custom_login');

function custom_login(){
	global $pagenow;
	if( 'wp-login.php' == $pagenow && $_GET['action']!="logout") {
		wp_redirect('https://www.agja.org/');
		exit();
	}
}
*/


/* ==================================== */
/* 	RETOUR A L'ACCUEIL APRES LOGOUT
/* ==================================== */
add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}


/* =================================== */
/* RETOUR A L'ACCUEIL SI PSW FAUX
/* =================================== */
add_action( 'wp_login_failed', 'al_login_fail' );

function al_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    global $wp;
	$current_uri = add_query_arg( NULL, NULL );

    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
		wp_redirect( site_url() );
		//wp_redirect($current_uri . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
		exit;
 	}
}


/* =================================== */
/* CCS PERSO
/* =================================== */
function al_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/AL_include/css/antilook_login.css" />';
}
add_action('login_head', 'al_custom_login');

/* RETOUR A L'ACCUEIL */
function al_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'al_login_logo_url' );

/* TEXTE AU SURVOL */
function al_login_logo_url_title() {
	return 'AGJA - accès privé';
}
add_filter( 'login_headertitle', 'al_login_logo_url_title' );

add_action( 'login_head', function() {
    ?>
		<style>
		.button {
		    background: #003e7e !important;
		    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0) !important;
		    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0) !important;
		    border-color: #003e7e !important;
		}
		.button:hover {
		    background: #000 !important;
		    border-color: #000 !important;
		}
		</style>
    <?php
});

/* LOGO PERSONNALISÉ */
function al_login_logo() { ?>
    <style type="text/css">
        #login h1 {
        	background-color: transparent;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/AGJA_logo_login.png);
	        height:127px;
	        width:250px;
	        background-size: 250px 127px;
	        background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'al_login_logo' );


