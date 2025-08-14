<?php
/**
*
* @package ANTILOOK
*/


/* ============================= */
/* ============================= */
/*  © ANTILOOK
/* 	FONCTIONS PERSONNALISÉES
/*  www.anti-look.com
/* ============================= */
/* ============================= */


function ANTILOOK()
{

  function add_cats_and_tags_to_pages_definition() {
      register_taxonomy_for_object_type('post_tag', 'page');
      register_taxonomy_for_object_type('category', 'page');  
  }
  add_action( 'init', 'add_cats_and_tags_to_pages_definition' );

  /* ====================== */
  /* INDISPENSABLES
  /* ====================== */

  /* GESTION FAVICON ET TOUCH ICON */
  //locate_template( array( '/AL_include/al_icon.php' ), true, true );

  /* GESTION BREADCRUMB */
  locate_template( array( '/AL_include/al_fil_ariane.php' ), true, true );

  /* GESTION BOOTSTRAP */
  locate_template( array( '/AL_include/al_boostrap.php' ), true, true );

  /* CUSTOM JQUERY */
  //locate_template( array( '/AL_include/al_jquery_js.php' ), true, true );

  /**
 * Move jQuery to the footer. 
 */
function wpse_173601_enqueue_scripts() {
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'wpse_173601_enqueue_scripts' );

  /* GESTION LOGO */
  locate_template( array( '/AL_include/al_logo.php' ), true, true );

  locate_template( array( '/AL_include/al_menu_hamburger.php' ), true, true );

  /* GESTION BOOTSTRAP NAVWALKER */
  //locate_template( array( '/AL_include/class-wp-bootstrap-navwalker.php' ), true, true );

  /* GESTION MENU HOVER */
  //locate_template( array( '/AL_include/al_menu_hover.php' ), true, true );

  /* GESTION NAVBAR */
  //locate_template( array( '/AL_include/al_navbar.php' ), true, true );

  /* GESTION CSS */
  locate_template( array( '/AL_include/al_css.php' ), true, true );

  /* GESTION MENUS */
  locate_template( array( '/AL_include/al_menus.php' ), true, true );

  /* GESTION tiny mce */
  locate_template( array( '/AL_include/al_tiny_mce.php' ), true, true );

	//** *PERMISSION UPLOAD WEBP IMAGE FILES*/
	function webp_upload_mimes($existing_mimes) {$existing_mimes['webp'] = 'image/webp';return $existing_mimes;}
	add_filter('mime_types', 'webp_upload_mimes');
	
	//** * PERMISSION PREVIEW WEBP THUMBNAILS IN MEDIA SECTION*/
	function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
	}
	add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

  /* ====================== */
  /* APPARENCE
  /* ====================== */

  /* GESTION FONTAWESOM */
//   locate_template( array( '/AL_include/al_fontawesome.php' ), true, true );

  /* GESTION SVG */
  locate_template( array( '/AL_include/al_svg.php' ), true, true );

  /* GESTION GOOGLE FONTS */
  locate_template( array( '/AL_include/al_google_font.php' ), true, true );

  /* GESTION MANSORY */
  //locate_template( array( '/AL_include/al_masonry.php' ), true, true );

  /* GESTION EXERP */
  locate_template( array( '/AL_include/al_excerpt.php' ), true, true );

  /* GESTION WIDGETS */
  locate_template( array( '/AL_include/al_widgets.php' ), true, true );

  // add_theme_support('html5', array('gallery', 'caption'));
  // add_filter( 'use_default_gallery_style', '__return_false' );

  /* ====================== */
  /* OPTION
  /* ====================== */
  /* GESTION UPLOAD */
  locate_template( array( '/AL_include/al_reglage_upload.php' ), true, true );

  /* GESTION TAILLE THUMBNAIL */
  //locate_template( array( '/AL_include/al_image_size.php' ), true, true );

  /* GESTION UPLOAD SVG */
  //locate_template( array( '/AL_include/al_media_option.php' ), true, true );

  /* GESTION CATÉGORIES DE PAGE */
  //locate_template( array( '/AL_include/al_page_category.php' ), true, true );

  /* GESTION CUSTOM POST TYPE */
  //locate_template( array( '/AL_include/al_cpt.php' ), true, true );


  /* ====================== */
  /* ADMIN / LOGIN
  /* ====================== */
  /* GESTION GUTEMBERG */
  locate_template( array( '/AL_include/al_admin.php' ), true, true );

  //locate_template( array( '/AL_include/al_admin_menu.php' ), true, true );

  /* GESTION LOGIN PAGE */
  locate_template( array( '/AL_include/al_login_page.php' ), true, true );

  /* GESTION GOOGLE MAPS */
  //locate_template( array( '/AL_include/al_google_maps.php' ), true, true );


  /* ====================== */
  /* OPTIMISATION / VITESSE
  /* ====================== */
  /* GESTION DEFFERING JS */
  //locate_template( array( '/AL_include/al_deferring_js.php' ), true, true );

  /* SUPPRESSION DES ?VER= */
  //locate_template( array( '/AL_include/al_supp_ver.php' ), true, true );

  /* GESTION MINIFY HTML */
  //locate_template( array( '/AL_include/al_minify_html.php' ), true, true );


  locate_template( array( '/AL_include/al_js.php' ), true, true );

}
add_action( 'after_setup_theme', 'ANTILOOK' );

/*
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
*/


/*
function highlight_results($text){
    if(is_search()){
    $keys = implode('|', explode(' ', get_search_query()));
    $text = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'highlight_results');
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');


function highlight_results_css() {
  ?>
  <style>
  .search-highlight {
    background-color: #ec008c;
    color: #fff;
    font-weight: bold;
  }
  </style>
  <?php
}
add_action('wp_head','highlight_results_css');
*/


/* =============================================================== */
/* ADMIN : AJOUTER LE NOMBRE DE CARACTÈRES DANS LES CHAMPS ACF
/* =============================================================== */
function my_acf_input_admin_footer() {
  
?>
<script type="text/javascript">
(function($) {
  
acf.add_action('wysiwyg_tinymce_init', function( ed, id, mceInit, $field ){
  $('#wp-'+id+'-editor-container .mce-statusbar').append('<div class="acfcounter" style="background-color: #f7f7f7; color: #444; padding: 2px 10px; font-size: 12px; border-top: 1px solid #e5e5e5;"><span class="words" style="font-size: 12px; padding-right: 30px;"></span><span class="chars" style="font-size: 12px;"></span></div>');
  counter = function() {
      var value = $('#'+id).val();
  
      if (value.length == 0) {
          $('#wp-'+id+'-editor-container .mce-statusbar .acfcounter .words').html('Word Count: 0');
          $('#wp-'+id+'-editor-container .mce-statusbar .acfcounter .chars').html('Characters: 0');
          return;
      }
  
      var regex = /\s+/gi;
      var wordCount = value.trim().replace(regex, ' ').split(' ').length;
      var totalChars = value.length;

      $('#wp-'+id+'-editor-container .mce-statusbar .acfcounter .words').html('Word Count: '+wordCount);
      $('#wp-'+id+'-editor-container .mce-statusbar .acfcounter .chars').html('Characters: '+totalChars);

  };
  
    $('#wp-'+id+'-editor-container .mce-statusbar .acfcounter .words').html('Word Count: 0');
    $('#wp-'+id+'-editor-container .mce-statusbar .acfcounter .chars').html('Characters: 0');
          
    $('#'+id).change(counter);
    $('#'+id).keydown(counter);
    $('#'+id).keypress(counter);
    $('#'+id).keyup(counter);
  $('#'+id).blur(counter);
    $('#'+id).focus(counter);

  
});

})(jQuery); 
</script>
<?php
    
}
add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');



/* =============================================================== */
/* CHANGER LE LIEN DE LA FONCTION THE_CUSTOM_LOGO
/* =============================================================== */
add_filter( 'get_custom_logo', 'wecodeart_com' );
function wecodeart_com() {

    $datetime = strtotime("now");
    $datetime = '?t='.$datetime;

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( 'https://www.agja.org'.$datetime ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
} 
