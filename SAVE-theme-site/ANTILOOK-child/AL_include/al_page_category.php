<?php

/* Activer le support des catégories pour les pages */
function wpc_cat_pages() {
	register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'wpc_cat_pages');