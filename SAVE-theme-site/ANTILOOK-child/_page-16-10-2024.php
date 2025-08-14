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
	if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles', 'bien-etre'))) {
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
					//$content = get_the_content();
					//$regEx = '\'(?!((<.*?)|(<a.*?)))(\b'. $key . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
					//$text = preg_replace($regEx, '<strong class="search-highlight">\0</strong>', $text);
					//$new_content = str_ireplace( $s, '<span class="search-highlight">'.$s.'</span>', $content );
					//$new_content = str_replace( $s, '<span class="search-highlight">'.$s.'</span>', $content );
					//$bodytag = str_replace("%body%", "black", "<body text='%body%'>");

					function search_title_highlight() {
					    $title = get_the_title();
					    //$keys = implode('|', explode(' ', get_search_query()));
					    //$title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);
						$new_title = str_replace( $s, '<span class="search-highlight">'.$s.'</span>', $title );
					 
					    echo $new_title;
					}

					function search_content_highlight() {
						$s = get_search_query('recherche');
				        $content = get_the_content();
				        //$keys = implode('|', explode(' ', get_search_query()));
						$new_content = str_replace( $s, '<span class="search-highlight">'.$s.'</span>', $content );
				        //$content = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $content);
				 
				        echo '<p>' . $new_content . '</p>';
					}

					//echo $new_content;
					the_post();
					//search_title_highlight();
					//search_content_highlight();

					if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles', 'bien-etre'))) {

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
				.bouton_actu_section {
					margin-bottom: 15px;
					display: table;
					float: left;
				}
				.actu-section {
					margin-right: -15px;
					margin-left: -15px;
				}
			</style>
			<?php
	      	if (get_field('tarif')) {
	      		if(has_category(array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles', 'bien-etre'))) {

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
				} elseif ($cat_slug == 'bien-etre') {
					$couleur_cat = '--couleur-bien-etre';
					$couleur_cat_hexa = '#39b54a';
				}

	      		//if(get_field('tarif') != '') {
      			?>

				<!-- BLOC DE TARIF -->
      			<div class="bloc-tarif">
      				<div class="widget-title"><?php echo (get_field('tarif') != '')?('CATÉGORIES'):(''); ?></div>
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
		      	}
		      	?>

				<?php
				// on récupère les infos de la page courante
				$slug = get_post_field( 'post_name', get_post() );
				// on récupère l'ID de la page courante
				$page_id = $post->ID;
				// on récupère le slug de la page courante grace à son ID
				$slug_page = get_permalink($page_id);

        		// on récupère le mois en cours
        		$mois_en_cours = date('n');

    			// ====================
    			// REQUETE SUR MESURE
    			// ====================
          		$args_preco = array(
	                'post_type' => 'actu_section',
	            );

      			// 2. on exécute la query
          		$my_query_preco = new WP_Query($args_preco);

          		// calcul du nombre d'evenement liés à cette section
            	if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
            		$slug_cs = get_field_object('visible_dans_la_section');
            		//print_r($test);
            		//$slug_cs = get_field('visible_dans_la_section');
            		if(count($slug_cs) > 0)
            		{
	            		$nb_s = count($slug_cs);

	            		for($i=0; $i<=$nb_s; $i++) {
	            			$slug_c = $slug_cs[$i];
		        			if ($slug_page == $slug_c) {
		        				//echo $i;
		        			}
		        		}
		        	}

                endwhile;
                endif;
        		//echo $nb_s;

                // 4. On réinitialise à la requête principale (important)
                wp_reset_postdata();
                ?>

		      	<?php
		      	if (get_field('tarif')) {
	      		?>

	          	<!-- BLOC CAROUSEL start -->
	          	<div id="carousel-section" class="carousel slide carousel-fade" data-ride="carousel">
	            	<div class="carousel-inner">

	              		<div class="carousel-content carousel-sections">

							<?php

		                	$position = 1;
		                	if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
		            		$slug_cibles = get_field('visible_dans_la_section');
		            		$nb_slug = count($slug_cibles);
		            		//echo $nb_slug;
							
		            		for($i=0; $i<=$nb_slug; $i++) {
		            			$slug_cible = $slug_cibles[$i];
			        			if ($slug_page == $slug_cible) {
			            			//echo $position;
			            			//echo $i;
			        				?>

					                <?php if ($position == 1) { ?>
					                <div class="carousel-item active">
					                <?php } else { ?>
					                <div class="carousel-item">
					                <?php } ?>

					                  	<div class="mask flex-center actu-section">

											<div class="image-annuaire">
												<img class="-" src="<?php the_post_thumbnail(); ?>
											</div>
											<div class="titre-actu-section">
			                            		<?php echo the_title(); ?>
			                          		</div>
			                          		<div class="texte-section">
			                            		<?php echo get_field('extrait'); ?>
			                            		<?php //echo excerpt(35) ?>
			                          		</div>
			                          		<?php
			                          		$afficher_bouton = get_field_object('afficher_bouton');
			                          		$afficher_bt = $afficher_bouton['value'];
			                          		$target = '';
				                          	if(get_field('fonctionnement_du_bouton') == 'vers_la_section') {
				                            	$lien_bt = get_field('vers_la_section');
				                          	} else if(get_field('fonctionnement_du_bouton') == 'vers_la_page') {
				                            	$lien_bt = get_field('vers_la_page');
				                          	} else if(get_field('fonctionnement_du_bouton') == 'vers_le_lien') {
				                            	$lien_bt = get_field('vers_le_lien');
					                            $target = 'target = "_blank"';
				                          	} else {
					                            $lien_bt = get_permalink();
				                          	}
			                          		?>
			                          		<?php if($afficher_bt == 'oui') { ?>
		                            		<div class="bouton_actu_section">
			                              		<a href="<?php echo $lien_bt ?>" <?php echo $target ?> class="btn btn-bleu">LIRE LA SUITE</a>
			                            	</div>
			                          		<?php } ?>

					                  	</div>

					                </div>

	        					<?php
		                		$position += 1;
			        			}
		            		}
							?>

							<?php
			                endwhile;
			                endif;

			                // 4. On réinitialise à la requête principale (important)
			                wp_reset_postdata();
							?>
		              	</div>

	              		<div>
							<a class="carousel-control-prev" href="#carousel-section" role="button" data-slide="prev"> 
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carousel-section" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
							</a> 
	              		</div>
	              		<!-- CAROUSEL stop--> 
        			</div>
      			</div>
      			
      			<?php
		      	}
		      	?>

  			<?php
	      	}
	      	?>

	      	<script type="text/javascript">
				//Animate any height differences
				jQuery('#powderkeg_carousel').on('slide.bs.carousel', function (e) {
				   var nextH = jQuery(e.relatedTarget).height();
				   jQuery(this).find('.active.item').parent().animate({
				      height: nextH
				   }, 500);
				});
	      	</script>

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
