<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Texte sur deux colonnes
*
*/

get_header();
?>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/open-content', 'page' );
	?>

	    <div class="row contenu-general">
	    	<div class="col-lg-8">
				<?php
				while ( have_posts() ) :

					the_post();

					get_template_part( 'template-parts/content', 'page-colonne' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>

			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
	    </div>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
