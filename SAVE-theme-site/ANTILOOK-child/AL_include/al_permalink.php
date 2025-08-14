<?php

add_filter('post_link', 'rating_permalink', 10, 3);
add_filter('post_type_link', 'rating_permalink', 10, 3);
 
function rating_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%rating%') === FALSE) return $permalink;
     
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;
 
        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'rating');   
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'not-rated';
 
    return str_replace('%rating%', $taxonomy_slug, $permalink);
}