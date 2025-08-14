<?php

/* =================================== */
// AJOUT DE ROLES PERSO
/* =================================== */
$result = add_role( 'PRO', __( 'PRO' ),

	array(

		'read' => true, // true allows this capability
		'edit_posts' => true, // Allows user to edit their own posts
		'edit_pages' => true, // Allows user to edit pages
		'edit_others_posts' => true, // Allows user to edit others posts not just their own
		'create_posts' => true, // Allows user to create new posts
		'manage_categories' => true, // Allows user to manage post categories
		'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
		'edit_themes' => false, // false denies this capability. User can’t edit your theme
		'install_plugins' => false, // User cant add new plugins
		'update_plugin' => false, // User can’t update any plugins
		'update_core' => false // user cant perform core updates
	)
);