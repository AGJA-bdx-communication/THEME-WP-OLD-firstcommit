<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Annuaire des entreprises
*
*/

get_header();
?>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/open-content', 'page' );
	?>

<style type="text/css">

</style>

  <div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>

  	<div class="row contenu-general">
  		<div class="col-lg-9">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

      		<div class="form-recrutement">
			    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#oMessagerie<?php echo $compteur ?>">
			      Contact
			    </button>
			    <div class="modal fade" id="oMessagerie<?php echo $compteur ?>" tabindex="-1" role="dialog" aria-labelledby="oMessagerieLabel" aria-hidden="true">
			      <div class="modal-dialog" role="document">
			        <div class="modal-content">
			          <div class="modal-header">
			            <strong><span class="titre-poste"><?php the_title(); ?></span></strong>
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

			<br>
			
			<?php
			endwhile; // End of the loop.
			?>


			<?php
		    $args = array(
  	            'post_type' => 'annuaire',
  	            'posts_per_page' => -1,
  	            'order' => 'title',
  	            'orderby' => 'ASC',
          	);
          	$position = 1;

            // 2. on exécute la query
            $my_query = new WP_Query($args);

            //var_dump($my_query);
           	?>

            <?php
        	if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();

			$categories = get_the_category();
			foreach ( $categories as $cats ) {
				$cls = $cats->slug;
				$nom_cat = $cats->name;

				if ($cls != $parent_name) {
					array_push($cat_page, $cls);
				}
			}

	        $path_annuaire = get_field('logo');
	        $image_annuaire = $path_annuaire ['url'];

			?>

			<div class="nom-categorie">
    			<?php echo $nom_cat; ?>
			</div>
					
			<div class="article-annuaire">
				<div class="row">

					<div class="col-3">
						<div class="image-annuaire">
							<img class="logo-adherent" src="<?php echo $image_annuaire; ?>">
						</div>
					</div>

					<div class="col-9">
		    			<h3><strong><?php the_title(); ?></strong></h3>
		    			<?php the_content(); ?>
		    			<?php $tel = get_field('telephone');
		    			if($tel != '') { ?>
		    				<strong>Téléphone : </strong><?php echo $tel; ?><br>
		    			<?php } ?>
		    			<?php $web = get_field('site_web');
		    			if($web != '') { ?>
		    				<strong>Site Web : </strong><a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
		    			<?php } ?>
					</div>

				</div>
				
			</div>
			

            <?php
            endwhile;
            endif;

            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
            ?>
        </div><!-- FIN COL 8 -->

        <div class="col-lg-3">
          <?php get_sidebar(); ?>
        </div><!-- FIN COL 3 -->

      </div>
	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
