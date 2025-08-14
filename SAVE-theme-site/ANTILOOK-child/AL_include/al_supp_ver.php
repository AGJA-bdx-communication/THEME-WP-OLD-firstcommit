<?php

/* ============================== */
/* 		SUPPRESSION ?VER=
/* ============================== */
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
	$handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

	if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
	    $src = remove_query_arg( 'ver', $src );

	return $src;
}