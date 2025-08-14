<?php

/* ========================================= */
/* AFFICHAGE DES ARTICLES D'UNE CATÉGORIE    */
/* ========================================= */
function jc_post_by_category($atts, $content = null) {
    extract(shortcode_atts(array(
        "nb" => '3',
        "orderby" => 'post_date',
        "order" => 'DESC',
        "category_name" => ''
    ), $atts));
    global $post;
    $tmp_post = $post;
    $myposts = get_posts('showposts='.$nb.'&orderby='.$orderby.'&category_name='.$category_name);
    $out = '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            	<div class="bloc-accueil-<?php echo $nb ?>">';
    foreach($myposts as $post){
        $out .= the_content();
    }
    $out .= '	</div>
			</div>';
    $post = $tmp_post;
    return $out;
}

add_shortcode("post-by-category", "jc_post_by_category");

