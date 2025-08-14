<?php

/* ================================ */
/* CSS PERSONNALISE DANS TINY MCE
/* ================================ */
function al_mce_before_init( $settings ) {

    $style_formats = array(
        array(  
            'title' => 'Titre avec trait bleu',
            'block' => 'div',
            'classes' => 'titre-trait-bleu',
            'wrapper' => true
        ),
        array(  
            'title' => 'Titre avec trait rose',
            'block' => 'div',
            'classes' => 'titre-trait-rose',
            'wrapper' => true
        ),
        array(  
            'title' => 'Titre avec trait vert',
            'block' => 'div',
            'classes' => 'titre-trait-vert',
            'wrapper' => true
        ),
        array(  
            'title' => 'Titre avec trait orange',
            'block' => 'div',
            'classes' => 'titre-trait-orange',
            'wrapper' => true
        ),
        array(  
            'title' => 'SECTION : Titre Sport Compétition',
            'block' => 'div',
            'classes' => 'titre-competition',
            'wrapper' => true
        ),
        array(  
            'title' => 'SECTION : Titre Sport Loisir',
            'block' => 'div',
            'classes' => 'titre-loisir',
            'wrapper' => true
        ),
        array(  
            'title' => 'SECTION : Titre Socio',
            'block' => 'div',
            'classes' => 'titre-socio',
            'wrapper' => true
        ),
        array(  
            'title' => 'SECTION : Titre des entrainements',
            'block' => 'div',
            'classes' => 'titre-entrainement',
            'wrapper' => true
        ),
        array(  
            'title' => 'SECTION : Dates des entrainements',
            'block' => 'div',
            'classes' => 'date-entrainement',
            'wrapper' => true
        ),
        array(  
            'title' => 'SECTION : Tarif',
            'classes' => 'section-tarif'
        ),

    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

add_filter( 'tiny_mce_before_init', 'al_mce_before_init' );
