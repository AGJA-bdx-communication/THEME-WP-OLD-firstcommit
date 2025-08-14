<div id="content" class="site-content">

	<?php
	/* RECUPERATION DE LA CATEGORIE DE image-section */
	$categories = get_the_category();

	if ( ! empty( $categories ) ) {
	  foreach ( $categories as $cat ) {
	    $cat_slug = $cat->slug;
	    //echo $cat->name;
	  }
	}
	$catslugs = array('sports-de-competition', 'sports-de-detente', 'activites-socio-culturelles', 'bien-etre');
	
	?>

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
	/* GESTION IMAGE DE LA SECTION */
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];

	/* GESTION A PARTIR DE */
	$a_partir = get_field('a_partir_de');
	if ($a_partir != '' && $a_partir != 0 && $a_partir != 'plus') {
		if ($a_partir <= 17) {
			$a_partir = 
				"<div class=\"texte-a-partir-de\">
					à partir de ".$a_partir." ans
				</div>";
		}
	} else if($a_partir == 'plus') {
		$a_partir = 
			"<div class=\"texte-a-partir-de\">
				à partir de 18 ans
			</div>";
	} else if($a_partir == 0) {
		$a_partir = '';
	}
	?>

	<div class="image-section" style="background-image: url(<?php echo $thumb_url; ?>)">
		<div class="container">
	        <?php
	        /*
	        if (get_field('nouveau') != '' && get_field('nouveau') == 'OUI') {
	          echo '<div class="bloc-titre-nouveau">NOUVEAUTÉ</div>';
	        };
	        */
	        ?>
			<div class="content-general bloc-section">
				<div class="left-pos bloc-titre-<?php echo $cat_slug ?>">
					<h1 class="titre-personnalise texte-titre-section"><?php the_title(); ?></h1>
					<?php echo $a_partir; ?>
				</div>
			</div>	
		</div>
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
			      		<!--
						<div class="dropdown <?php echo (in_array($cat_slug, $catslugs))?('titre-section-menu-actif'):('titre-section-menu'); ?>">
						-->
						<div class="dropdown <?php echo ($cat_slug == 'sports-de-competition')?('titre-section-menu-actif'):('titre-section-menu'); ?>">
							
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
						<div class="dropdown <?php echo ($cat_slug == 'sports-de-detente')?('titre-section-menu-actif'):('titre-section-menu'); ?>">
							
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
						<div class="dropdown <?php echo ($cat_slug == 'activites-socio-culturelles')?('titre-section-menu-actif'):('titre-section-menu'); ?>">
							
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
						<div class="dropdown <?php echo ($cat_slug == 'bien-etre')?('titre-section-menu-actif'):('titre-section-menu'); ?>">
							
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

