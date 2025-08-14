<?php
if (isset($_GET['v']) && $_GET['v'] !='') {
	$v=$_GET['v'];
}
if (isset($_GET['t']) && $_GET['t'] !='') {
	$t=$_GET['t'];
}
?>
<div id="content" class="site-content">
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

	<div class="container">
		<div class="content-general">

			<div class="row">
		    	<div class="col-md d-flex card-periscolaire">
		          	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-ecoles-periscolaire-menu">

						<?php
						//change couleur du menu
						if ($v =='1') { ; ?>
							<style>
								.titre-ecoles-periscolaire-menu{
									background: var(--couleur-rose);
								}
							</style>
						<?php
						}
						?>
			
							<button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
					   		Périscolaire / PAM
							</button>
						
							<div class="dropdown-menu menu-ecoles">

						<?php

		     				$args_preco = array(
	    	 					'post_type' => 'page',	
	     						'category_name' => 'periscolaire-pam'
	     					);                 
	    
	   						// on exécute la query
	   						$my_query_preco = new WP_Query($args_preco);
	   					   		if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						?>

							<div class="contenu-ecoles-periscolaire">
								<div class="menu-jeunesse">

									<ul id="menu-menu-jeunesse-periscolaire-pam" class="nav navbar-nav">

									<?php

										$i = 0;
										// on récupère le lien, on enlève le dernier "/",on remplace par v=1
										
										foreach ($args_preco as $lien) { 
											$lien = get_permalink();
											$lienMod = substr($lien, 0, -1);
											?>
											
											<li class="menu-item menu-item-type-post_type">	
											<?php 
												echo '<a href="' . $lienMod . '?t='.$t.'&v=1">';
													the_title();
												echo '</a>'; 

											?>
											</li>
											<?php
			
											$i++; // Boucle numéro...
												
												if ($i === 1) { 
													break;
												}
										} 
										?>
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
			    </div>

			    <div class="col-md d-flex card-mercredis">
		          	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-ecoles-mercredis-menu">

						<?php
						//change couleur du menu
						if ($v =='2') { ; ?>
							<style>
								.titre-ecoles-mercredis-menu{
									background: var(--couleur-rose);
								}
							</style>
						<?php
						}
						?>
			
							<button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
					   		Mercredis
							</button>
						
							<div class="dropdown-menu menu-ecoles">

						<?php

		     				$args_preco = array(
	    	 					'post_type' => 'page',	
	     						'category_name' => 'mercredis'
	     					);                 
	    
	   						// on exécute la query
	   						$my_query_preco = new WP_Query($args_preco);
	   					   		if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						?>

							<div class="contenu-ecoles-mercredis">
								<div class="menu-jeunesse">

									<ul id="menu-menu-jeunesse-periscolaire-pam" class="nav navbar-nav">

									<?php

										$i = 0;
										// on récupère le lien, on enlève le dernier "/",on remplace par v=2
										
										foreach ($args_preco as $lien) { 
											$lien = get_permalink();
											$lienMod = substr($lien, 0, -1);
											?>
											
											<li class="menu-item menu-item-type-post_type">	
											<?php 
												echo '<a href="' . $lienMod . '?t='.$t.'&v=2">';
													the_title();
												echo '</a>'; 

											?>
											</li>
											<?php
			
											$i++; // Boucle numéro...
												
												if ($i === 1) { 
													break;
												}
										} 
										?>
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
			    </div>

				<div class="col-md d-flex card-vacances">
		          	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-ecoles-vacances-menu">

						<?php
						//change couleur du menu
						if ($v =='3') { ; ?>
							<style>
								.titre-ecoles-vacances-menu{
									background: var(--couleur-rose);
								}
							</style>
						<?php
						}
						?>
			
							<button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
					   		Vacances
							</button>
						
							<div class="dropdown-menu menu-ecoles">

						<?php

		     				$args_preco = array(
	    	 					'post_type' => 'page',	
	     						'category_name' => 'vacances'
	     					);                 
	    
	   						// on exécute la query
	   						$my_query_preco = new WP_Query($args_preco);
	   					   		if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						?>

							<div class="contenu-ecoles-vacances">
								<div class="menu-jeunesse">

									<ul id="menu-menu-jeunesse-periscolaire-pam" class="nav navbar-nav">

									<?php

										$i = 0;
										// on récupère le lien, on enlève le dernier "/",on remplace par v=3
										
										foreach ($args_preco as $lien) { 
											$lien = get_permalink();
											$lienMod = substr($lien, 0, -1);
											?>
											
											<li class="menu-item menu-item-type-post_type">	
											<?php 
												echo '<a href="' . $lienMod . '?t='.$t.'&v=3">';
													the_title();
												echo '</a>'; 

											?>
											</li>
											<?php
			
											$i++; // Boucle numéro...
												
												if ($i === 1) { 
													break;
												}
										} 
										?>
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
			    </div>

			</div>

			<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>

