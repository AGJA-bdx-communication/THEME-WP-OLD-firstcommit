<?php


// PASSE GUTEMBERG EN FULL WIDTH
add_action('acf/input/admin_head', 'my_acf_modify_wysiwyg_height');

function my_acf_modify_wysiwyg_height() {
    
    ?>
    <style type="text/css">
        .acf-field_5cd3fcae66386 iframe{
            height: 200px !important;
        }
    </style>
    <?php    
    
}

// Update CSS within in Admin
function admin_style() {
	wp_enqueue_style( 'antilook-style', get_stylesheet_directory_uri() .'/css/al_admin.css' );
}
add_action('admin_enqueue_scripts', 'admin_style');