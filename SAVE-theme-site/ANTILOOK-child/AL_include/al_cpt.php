<?php


function annuaire() {
    $args = array(
        'label' => __('Annuaire'),
        'singular_label' => __('Article Annuaire'),
        'public' => true,
        'show_ui' => true,
        '_builtin' => false, // It's a custom post type, not built in
        '_edit_link' => 'post.php?post=%d',
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array("slug" => "article_annuaire"),
        'query_var' => "article_annuaire", // This goes to the WP_Query schema
        'supports' => array('title') //titre + zone de texte + champs personnalisés + miniature valeur possible : 'title','editor','author','thumbnail','excerpt'
    );
    
    register_post_type( 'annuaire' , $args );
}

add_action('init', 'annuaire');