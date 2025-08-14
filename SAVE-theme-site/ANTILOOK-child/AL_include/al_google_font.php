<?php

/* =================================== */
// AJOUT DE FONTES GOOGLE DANS LE HOOK
/* =================================== */
add_action( 'wp_enqueue_scripts', 'al_google_font' );

function al_google_font() {
    wp_enqueue_style('google-font-al', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,300i,400,400i,700,700i&display=swap');
}
