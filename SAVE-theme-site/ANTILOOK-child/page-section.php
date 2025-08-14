<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Sections
*
*/

get_header();
?>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/open-content-sections', 'page' );
	?>

    <div class="row contenu-general">
		<div class="col-lg-8">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</div><!-- fin col-8 -->

			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- fin widget col-4 -->

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
