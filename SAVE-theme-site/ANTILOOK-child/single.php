<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ANTILOOK
 */

get_header();
?>

<?php
// insertion open-content
get_template_part( 'template-parts/structure/open-content', 'page' );
?>

<!--
<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>
-->

<?php
if(has_category(array('evenements-sections'))) {
	//echo 'even';
?>
<!-- ARTICLES EVENEMENTS -->
	<?php
	while ( have_posts() ) :
		the_post();

		if (get_field('nombre_de_colonne') == '2' ) {
			get_template_part( 'template-parts/content-page-2-colonne', get_post_type() );
		} else if(get_field('nombre_de_colonne') == '1' ) {
			get_template_part( 'template-parts/content-page-colonne', get_post_type() );
		} else {
			get_template_part( 'template-parts/content-page-colonne', get_post_type() );
		}

		// get_template_part( 'template-parts/content-page-colonne', get_post_type() );

	endwhile; // End of the loop.
	?>
	<br><br>
<?php
} else {
	//echo 'actu';
?>
<!-- ARTICLES COURANTS -->
<div class="row contenu-general">
	<div class="col-lg-9">
		<?php
		while ( have_posts() ) :
			the_post();

			if (get_field('nombre_de_colonne') == '2' ) {
				get_template_part( 'template-parts/content-page-2-colonne', get_post_type() );
			} else if(get_field('nombre_de_colonne') == '1' ) {
				get_template_part( 'template-parts/content-page-colonne', get_post_type() );
			} else {
				get_template_part( 'template-parts/content-page-colonne', get_post_type() );
			}

			// get_template_part( 'template-parts/content-page-colonne', get_post_type() );

		endwhile; // End of the loop.
		?>
	</div>

	<div class="col-lg-3">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php
}
?>

<?php
// insertion close-content
get_template_part( 'template-parts/structure/close-content', 'page' );
?>

<?php
get_footer();
