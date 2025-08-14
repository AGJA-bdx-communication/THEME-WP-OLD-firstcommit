<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ANTILOOK
 */

if ( ! is_active_sidebar( 'pages_courantes' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'pages_courantes' ); ?>
</aside><!-- #secondary -->
