<div id="content" class="site-content">

	<div class="slider_accueil">
		<?php
		// AFFICHE LE SLIDER SI LE CHAMP EST RENSEIGNÉ DANS LA PAGE
		$var = get_field('diaporama');
	    if ($var != '')
	    {
		    echo do_shortcode($var); 
	    } else {
	    	echo '';
	    }
		?>
	</div>
	
	<?php
	if (is_page_template('page-maps.php')) { 
		// insertion Google Maps
		get_template_part( 'template-parts/content', 'maps' );
	}
	?>

	<div class="container">

		<div class="content-general">

			<div class="row">

				<div class="col-md d-flex card-periscolaire">
			      	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-section-menu">
							
							  <button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
							    Sports de Compétition
							  </button>
							  <div class="dropdown-menu menu-sections">
								<?php wp_nav_menu( array(
											'theme_location' => 'menu-sport-competition',
											'depth' => 2,
											'container_class' => 'menu-jeunesse',
											'menu_id' => '',
											'menu_class' => 'nav navbar-nav',
					    					'orderby' => 'title',
											'order' => 'ASC'
										)
									);
								?>
							  </div>
																
						</div>
					</div>
			    </div>

				<div class="col-md d-flex card-mercredis">
			      	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-section-menu">
							
							  <button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
							    Sports de détente
							  </button>
							  <div class="dropdown-menu menu-sections">
								<?php wp_nav_menu( array(
											'theme_location' => 'menu-sport-detente',
											'depth' => 2,
											'container_class' => 'menu-jeunesse',
											'menu_id' => '',
											'menu_class' => 'nav navbar-nav',
					    					'orderby' => 'title',
											'order' => 'ASC'
										)
									);
								?>
							  </div>
																
						</div>

					</div>
			    </div>

				<div class="col-md d-flex card-vacances">
			      	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-section-menu">
							
							  <button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
							    Socio-culturel
							  </button>
							  <div class="dropdown-menu menu-sections">
								<?php wp_nav_menu( array(
											'theme_location' => 'menu-socio-culturelle',
											'depth' => 2,
											'container_class' => 'menu-jeunesse',
											'menu_id' => '',
											'menu_class' => 'nav navbar-nav',
					    					'orderby' => 'title',
											'order' => 'ASC'
										)
									);
								?>
							  </div>
						</div>
					</div>
			    </div>

				<div class="col-md d-flex card-vacances">
			      	<div class="card card-body flex-fill card-jeunesse">
						<div class="dropdown titre-section-menu">
							
							  <button class="btn btn-secondary dropdown-toggle btn-periscolaire-vacances" type="button" data-toggle="dropdown">
							    Bien-être
							  </button>
							  <div class="dropdown-menu menu-sections">
								<?php wp_nav_menu( array(
											'theme_location' => 'menu-bien-etre',
											'depth' => 2,
											'container_class' => 'menu-jeunesse',
											'menu_id' => '',
											'menu_class' => 'nav navbar-nav',
					    					'orderby' => 'title',
											'order' => 'ASC'
										)
									);
								?>
							  </div>
						</div>
					</div>

			    </div>
				
			</div>

