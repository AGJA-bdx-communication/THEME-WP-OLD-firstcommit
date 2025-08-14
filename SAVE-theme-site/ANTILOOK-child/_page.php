<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page courante
* Template Post Type: post, page, product, files, event
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

	    <div class="row contenu-general" id="contenu-general">
	      <div class="col-lg-8 xx">

			<?php
			while ( have_posts() ) :
			?>
			<?php
				the_post();

				if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles'))) {

			        if (get_field('nouveau') != '' && get_field('nouveau') == 'OUI') {
			          	echo '<div class="nouveau-centre"><div class="bloc-titre-nouveau-centre">NOUVEAUTÉ</div></div>';
			          	//echo '<div class="ribbon"><span>NOUVEAUTÉ</span></div>';
			        };

					$titre = get_the_title();
					echo '<h1 class="titre-personnalise">'.$titre.'</h1>';
		        	if (get_field('complet') == 'OUI') {
		        		echo '<div class="section-complete">COMPLET</div>';
		        	}
					get_template_part( 'template-parts/content-section', 'page' );
				} else {
					get_template_part( 'template-parts/content', 'page' );
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
	      </div>

	      <div class="col-lg-4">

	      	<?php
	      	if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles'))) {

	      		$cat = get_the_category();
	      		$cat_slug = $cat[0]->slug;
	      		$cat_id = $cat[0]->cat_ID;
	      		//echo $cat[0]->term_id;

      			if ($cat_slug == 'sports-de-competition') {
	      			$couleur_cat = '--couleur-competition';
	      			$couleur_cat_hexa = '#f7941e';
	      		} elseif ($cat_slug == 'sports-de-detente') {
	      			$couleur_cat = '--couleur-detente';
	      			$couleur_cat_hexa = '#ffde17';
	      		} elseif ($cat_slug == 'activites-socio-culturelles') {
	      			$couleur_cat = '--couleur-socio';
	      			$couleur_cat_hexa = '#39b54a';
	      		}

	      		//if(get_field('tarif') != '') {
	      			?>
	      			<style type="text/css">
	      				.bloc-tarif {
	      					border: solid 1px var(--couleur-cadre-actu);
    						margin-bottom: 1rem;
	      				}
	      				.titre-bloc-tarif {
      					    background-color: var(<?php echo $couleur_cat ?>);
							padding: 5px;
							text-align: center;
							font-size: 1em;
							font-weight: bold;
							color: #fff;
							margin: 0;
	      				}
	      				.contenu-bloc-tarif {
	      					padding: 0.8em 0.5em 0.8em 0.5em;
	      				}
	      				.contenu-bloc-tarif .tableau-prix {
							margin-bottom: 0.5em;
	      				}
	      				.liens-reseaux a {
	      					display: inline;
	      					font-size: 0.9em;
	      					color: var(--couleur-principale);
      					}
      					.bulletin_inscription {
      						text-align: center;
      						margin-top: 0.5em;
      					}
	      			</style>
	      			<div class="bloc-tarif">
	      				<div class="titre-bloc-tarif"><?php echo (get_field('tarif') != '')?('TARIF ANNUEL'):(''); ?></div>
      					<div class="contenu-bloc-tarif">
      						<?php echo get_field('tarif'); ?>
  							<div class="liens-reseaux">
	      						<?php if(get_field('lien_page_facebook') != '') { ?>
	      								<a href="<?php echo get_field('lien_page_facebook') ?>" target="_blank">
											<i class="fa fa-facebook-official" aria-hidden="true"></i> Voir la page Facebook
										</a>
	      						<?php }?>
							</div>
  							<div class="liens-reseaux">
	      						<?php if(get_field('lien_site_web') != '') { ?>
	      								<a href="<?php echo get_field('lien_site_web') ?>" target="_blank">
											<i class="fa fa-globe" aria-hidden="true"></i> Voir le site web
										</a>
	      						<?php }?>
	      					</div>
  							<div class="bulletin_inscription">
	      						<?php if(get_field('bulletin_inscription') != '') { ?>
	      							<a class="btn btn-sm btn-agja" href="<?php echo get_field('bulletin_inscription') ?>" target="_blank" role="button"><i class="fa fa-download" aria-hidden="true"></i> Bulletin d'inscription</a>
											
	      						<?php }?>
	      					</div>
      					</div>
	      			</div>
					
					<?php

					$slug = get_post_field( 'post_name', get_post() );
					$page_id = $post->ID;
					//echo $slug;
					$slug_page = get_permalink($page_id);

            		$mois_en_cours = date('n');
            		//echo $mois_en_cours;

              		$args_preco = array(
		                'post_type' => 'actu_section'
		            );

          			// 2. on exécute la query
              		$my_query_preco = new WP_Query($args_preco);

                    /* on compte les posts */
                    $total = $my_query_preco->found_posts;
                    //echo $total;

                	if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
            		$slug_cible = get_field('visible_dans_la_section');

            		if ($slug_page == $slug_cible) {
            			//echo the_title();
						//echo '<br>';
            		}

					?>

					<?php
	                endwhile;
	                endif;

	                // 4. On réinitialise à la requête principale (important)
	                wp_reset_postdata();

					?>


      			<?php
	      		//}
	      	}
	      	?>

	      	<!--
	      	<div class="bloc-reseaux">
	      	<?php
	      	if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles'))) {

	      		$args_reseaux = array(	'post_type' => 'page',	
							       		'category_name' => 'sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles',
							       		'p'=> $id,
							       	);
					// on éxécute la query
					$my_query_preco = new WP_Query($args_reseaux);
                    if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();

					//récupère les champs de la page
					$Lien1 = get_field('lien_page_facebook');
					$Lien2 = get_field('lien_site_web');
						
					//On affiche le contenu si les les champs sont renseignés
						if (!empty($Lien1)) {			
							?>
							
						<div class="icon-social">
						<a href="<?php echo$Lien1; ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-icon.svg">
							Notre page Facebook
						</a>
						</div>
					<?php	
					}
					if (!empty($Lien2)) {
							?>
						<div class="icon-internet">
						<a href="<?php echo$Lien2; ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-internet.svg">
							Notre site Internet
						</a>
						</div>
					<?php
						}
						
					endwhile;
                    endif;

                    // 4. On réinitialise à la requête principale (important)
                    wp_reset_postdata();                   	
				}

			?>
			</div>
		-->
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
