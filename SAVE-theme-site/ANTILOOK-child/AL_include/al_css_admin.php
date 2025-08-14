<?php

/* ============================== */
/* AJOUTE LE CSS COTÉ ADMIN
/* ============================== */
function al_ajouter_styles_editeur() {
    add_editor_style( 'antilook_admin.css' );
}

add_action( 'init', 'al_ajouter_styles_editeur' );

