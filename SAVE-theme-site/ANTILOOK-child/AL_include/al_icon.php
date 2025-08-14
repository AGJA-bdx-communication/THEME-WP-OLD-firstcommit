<?php

/* ================================ */
/* AJOUT FAVICON ET TOUCH ICON      */
/* ================================ */
add_action('wp_head', function() {
	//echo '<link rel="icon" sizes="32x32" href="/favicon-32x32.png">';
	echo '<link rel="icon" sizes="192x192" href="'.bloginfo('template_directory').'/images/al_icon_192.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="'.bloginfo('template_directory').'/images/al_icon_152.png">';
});