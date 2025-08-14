<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Nos adhérents ont du talent
*/

get_header();
?>

	<?php
	// insertion open-content pour les pages de section
	if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles'))) {
		get_template_part( 'template-parts/structure/open-content-sections', 'page' );
	// insertion open-content pour les pages courantes
	} else {
		get_template_part( 'template-parts/structure/open-content', 'page' );
	}
	?>

	<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>

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

		        $path_talent = get_field('image_talent');
		        $image_talent = $path_talent ['url'];

		        $path_annuaire = get_field('image_annuaire');
		        $image_annuaire = $path_annuaire ['url'];

				?>

		      	<div class="row">
		      		<div class="col-lg-6 col-md-6 col-sm-6 col-sm-12">

				        	<a href="<?php echo get_field('lien_talent'); ?><?php echo $datetime ?>">
					          	<div class="card d-flex">
						            <h5 class="card-title">Les talents<br>de l'AGJA</h5>
						            <img class="card-image-adherent" src="<?php echo $image_talent; ?>">
						            <div class="card-body">
						            </div>
						            <div class="card-footer">
						            </div>
					          	</div>
				          </a>

		      		</div>
		      		<div class="col-lg-6 col-md-6 col-sm-6 col-sm-12">

				        	<a href="<?php echo get_field('lien_annuaire'); ?><?php echo $datetime ?>">
					          	<div class="card d-flex">
						            <h5 class="card-title">Le répertoire<br>des adhérents professionnels</h5>
						            <img class="card-image-adherent" src="<?php echo $image_annuaire; ?>">
						            <div class="card-body">
						            </div>
						            <div class="card-footer">
						            </div>
					          	</div>
				          	</a>

		      		</div>
		      	</div>

      		</div>

			<div class="col-lg-4">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>

	    </div>

	<?php
	// insertion close-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
