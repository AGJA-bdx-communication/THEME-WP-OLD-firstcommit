<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Recrutement
*
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

  	        $args_preco = array(
  	            'post_type' => 'postes',
  	            'posts_per_page' => -1,
  	            'order'      => 'ASC'
  	            //'orderby' => 'service',
  	        );
  	        $position = 1;

  	        // 2. on exécute la query
  	        $my_query_preco = new WP_Query($args_preco);
  	        //print_r($my_query_preco);
      		$compteur = 0;

      	    if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
	      	?>
      		<?php
      		$field = get_field_object('service');
      		$modal_form = get_field('formulaire');
      		//echo $modal_form;
      		?>

			<div class="bloc-recrutement">
		      	<div class="titre-recrutement">
		      		<?php echo $field['value'] ?>
		      	</div>

		      	<div class="contenu-recrutement">		      	
		      		<strong>Poste à pourvoir : <span class="titre-poste"><?php the_title(); ?></span></strong>
		      		<div class="paragraphe-recrutement">
		      			<?php the_content(); ?>
		      		</div>
		      		<div class="form-recrutement">
					    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#oMessagerie<?php echo $compteur ?>">
					      Postuler
					    </button>
					    <div class="modal fade" id="oMessagerie<?php echo $compteur ?>" tabindex="-1" role="dialog" aria-labelledby="oMessagerieLabel" aria-hidden="true">
					      <div class="modal-dialog" role="document">
					        <div class="modal-content">
					          <div class="modal-header">
					            <strong>Poste à pourvoir : <span class="titre-poste"><?php the_title(); ?></span></strong>
					            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
					              <span aria-hidden="true">×</span>
					            </button>
					          </div>
					          <div class="modal-body">
					            <?php the_field('formulaire'); ?>
					          </div>
					          <div class="modal-footer">
					            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					          </div>
					        </div>
					      </div>
					    </div>
		      		</div>
		      	</div>
			</div>

            <?php
            $compteur += 1;
            endwhile;
            endif;

            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
            ?>

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
