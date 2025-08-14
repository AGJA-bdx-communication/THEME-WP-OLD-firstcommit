<?php $t = strtotime("now"); ?>
<div id="content" class="site-content">

	<div class="row">

		<?php
		$path_portail = get_field('image_portail');
		$image_portail = $path_portail ['url'];
		?>
		<!-- PORTAIL FAMILLE -->
		<div class="col-md-12 col-xs-12 marge-zero">
			<div class="acces-portail-famille">

						<div class="row">
							<div class="col-6 marge-zero">
								<div class="jeunesse-texte-dessus-bouton"><strong>Première inscription</strong></div>
								<a href="<?php echo get_field('lien_inscription'); ?>" class="btn btn-xs btn-success btn-portail-inscription">Procédure</a>
							</div>
							<div class="col-6 marge-zero">
								<div class="jeunesse-texte-dessus-bouton"><strong>Déjà inscrit</strong></div>
								<a href="<?php echo get_field('lien_connexion'); ?>" target="_blank" class="btn btn-xs btn-success btn-portail-connexion">Portail Familles</a>
							</div>
							<!--
							<div class="col-4 marge-zero">
								<div class="jeunesse-texte-dessus-bouton"><strong>Pour tout le reste</strong></div>
								<a href="<?php echo get_field('lien_information'); ?>" class="btn btn-xs btn-success btn-portail-information">Information</a>
							</div>
							-->
						</div>

			</div>

			<div class="slider_accueil">
				<?php
				// AFFICHE LE SLIDER SI LE CHAMP EST RENSEIGNÉ DANS LA PAGE
				$var = get_field('diaporama');

			   	if ($var != ''){
					echo do_shortcode($var); 
			    } else {
			    	echo '';
			    }
				?>
			</div>

		</div>

	</div><!-- close row -->

	<div class="container">
		<div class="content-general">

			<h1 class="titre-personnalise"><?php the_title(); ?></h1>

	      	<div class="row marge-zero">

		    	<div class="col-md d-flex card-periscolaire marge-menu-periscolaire">
		          	<div class="card card-body flex-fill card-jeunesse">

						<div class="titre-ecoles-periscolaire">
							Périscolaire / PAM
						</div>

						<?php
				     	$args_preco = array(
					       'post_type' => 'page',	
					       'category_name' => 'Périscolaire PAM'
				       	);                 
					    // 2. on exécute la query
					    $my_query_preco = new WP_Query($args_preco);
				       	if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						?>
						<div class="contenu-ecoles-periscolaire">
							<div class="menu-jeunesse">

								<ul id="menu-menu-jeunesse-periscolaire-pam" class="nav navbar-nav">
									<?php
									$i = 0;
									foreach ($args_preco as $lien) { 
										$lien = get_permalink();
										$lienMod = substr($lien, 0, -1);
										?>
										<li class="menu-item menu-item-type-post_type">	
										<?php echo '<a href="' . $lienMod . '/?&t='.$t.'&v=1">';
													the_title();
												echo '</a>'; 

											?>
										</li>
									<?php
									$i++; // Boucle numéro...
									if ($i === 1) { break; }
									 } ?>
								</ul>

							</div>
						</div>
						<?php
						endwhile;
				        endif;
				     	// 4. On réinitialise à la requête principale (important)
				        wp_reset_postdata();    
				        ?>

					</div>
		        </div>

		    	<div class="col-md d-flex card-mercredis marge-menu-mercredi">
		          	<div class="card card-body flex-fill card-jeunesse">

						<div class="titre-ecoles-mercredis">
							Mercredis
						</div>

						<?php
				     	$args_preco = array(
					       'post_type' => 'page',	
					       'category_name' => 'Mercredis'
				       	);                 
					    // 2. on exécute la query
					    $my_query_preco = new WP_Query($args_preco);
				       	if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						?>

						<div class="contenu-ecoles-mercredis">
							<div class="menu-jeunesse">

								<ul id="menu-menu-jeunesse-periscolaire-pam" class="nav navbar-nav">

								<?php
								$i = 0;
								foreach ($args_preco as $lien) { 
									$lien = get_permalink();
									$lienMod = substr($lien, 0, -1);
									?>
										<li class="menu-item menu-item-type-post_type">	
										<?php echo '<a href="' . $lienMod . '/?&t='.$t.'&v=2">';
													the_title();
												echo '</a>'; 
											?>
										</li>
									<?php 
									$i++; // Boucle numéro...
									if ($i === 1) { break; }
									} ?>
								</ul>

							</div>
						</div>
						<?php
						endwhile;
			            endif;
			         	// 4. On réinitialise à la requête principale (important)
			            wp_reset_postdata();    
			            ?>

					</div>
		        </div>

		    	<div class="col-md d-flex card-vacances marge-menu-vacance">
		          	<div class="card card-body flex-fill card-jeunesse">

						<div class="titre-ecoles-vacances">
							Vacances
						</div>

						<?php
				     	$args_preco = array(
					       'post_type' => 'page',	
					       'category_name' => 'Vacances'
				       	);                 
					    // 2. on exécute la query
					    $my_query_preco = new WP_Query($args_preco);
				       	if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						?>

						<div class="contenu-ecoles-vacances">
							<div class="menu-jeunesse">

							<ul id="menu-menu-jeunesse-periscolaire-pam" class="nav navbar-nav">

							<?php
							$i = 0;
							foreach ($args_preco as $lien) { 
								$lien = get_permalink();
								$lienMod = substr($lien, 0, -1);
								?>
									<li class="menu-item menu-item-type-post_type">	
									<?php echo '<a href="' . $lienMod . '/?&t='.$t.'&v=3">';
												the_title();
											echo '</a>'; 
										?>
									</li>
								<?php 
								$i++; // Boucle numéro...
								if ($i === 1) { break; }
								} ?>
							</ul>

						</div>
					</div>
					<?php
					endwhile;
		            endif;
		         	// 4. On réinitialise à la requête principale (important)
		            wp_reset_postdata();    
		            ?>
				</div>
	        </div>
	    </div>
		        
