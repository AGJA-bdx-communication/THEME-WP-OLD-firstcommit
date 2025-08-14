<?php


// Limite la quantité d'extrait montrée.
function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content. 
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content. 
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    $allowed_tags = ''; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 40; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
     
    $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');


// Autorise Shortcodes dans le champ Excerpt
 add_filter ('the_excerpt', 'do_shortcode');


// Ajout d'un Bouton à la fin de l'extrait pour lire l'article complet
function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function the_excerpt_more_link( $excerpt ){
    $post = get_post();
	$excerpt .= '<a class="fasc-button fasc-size-medium fasc-type-flat" style="background-color: #aecc13; color: #ffffff;" href="'. get_permalink($post->ID) . '">Lire la suite...</a>';
    //$excerpt .= '... <a href="'. get_permalink($post->ID) . '">continue reading</a>.';
    return $excerpt;
}
add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );


/* SPÉCIFIER LE NOMBRE DE MOTS EN FONCTION DES BESOINS */
/* utilisation : <?php echo excerpt(12) ?> affichera 12 mots */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


/* ================================== */
/* SURLIGNER LE TERME DE RECHERCHE
/* ================================== */
/*
function replace_text_wps($text){
    $replace = array(
        // 'WORD TO REPLACE' => 'REPLACE WORD WITH THIS'
        'wordpress' => '<a href="#">wordpress</a>',
        'excerpt' => '<a href="#">excerpt</a>',
        'function' => '<a href="#">function</a>'
    );
    $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
}
 
add_filter('the_content', 'replace_text_wps');
add_filter('the_excerpt', 'replace_text_wps');
*/

