<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Ecoles
*
*/
//echo $_GET['t'];
if (isset($_GET['v']) && $_GET['v'] !='') {
	$v=$_GET['v'];
}
else{
	wp_redirect(home_url());
	exit();
}

//Tableaux réference
$cat_ref = array(
	1=>'periscolaire-pam',
	2=>'mercredis',
	3=>'vacances',
);

//Récupérer catégories enfants
foreach (get_the_category() as $child) {
	//Récupérer depuis cat enfant, l'ID du parent
	$parent = $child->parent;
	$parent_name = get_category($parent);
	//Récupère le slug de la catégorie
	$parent_name = $parent_name->slug;
}

$cat_page = array();

$id = get_the_ID();

//Tableaux Query
$args_preco = array(
	'post_type' => 'page',	
	'category_name' => $parent_name,
	'p'=> $id,
);

//on éxécute la Query
$my_query_preco = new WP_Query($args_preco);

if($my_query_preco->have_posts()) : 
	while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();

		//Vérifier catégorie active
		$categories = get_the_category();
		foreach ( $categories as $cats ) {
			$cls = $cats->slug;
				if ($cls != $parent_name) {
					array_push($cat_page, $cls);
				}
		}

   	endwhile;
endif;

//comparaison tableaux
$cat_valid = array_intersect( $cat_ref, $cat_page);
		
//Vérifie que le tableau n'est pas vide 
if (count($cat_valid) > 0){
	//teste toutes les key du tableau 
	foreach ($cat_valid as $key => $nom_cat) {
		if ( $v == $key){
			$lien_valid = true;
			$num_cat = $key;
		}
	}
	unset($key);
	if ($v != $num_cat){
		wp_redirect(home_url());
		exit();
	}
}

// On réinitialise à la requête principale (important)
wp_reset_postdata();

get_header();
?>
<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/open-content-ecoles', 'page' );
?>

<style type="text/css">
#map {
    width: 100%;
    height: 300px;
	border: #ccc solid 1px;
}
#map_elementaire {
    width: 100%;
    height: 300px;
	border: #ccc solid 1px;
}
.gm-style .place-card-large {
	display: none;
}
</style>

<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeIJYa4RQEAj5y8t80YWJ2Ma7srUksXps&callback=initMap&libraries=&v=weekly"
	async
></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeIJYa4RQEAj5y8t80YWJ2Ma7srUksXps"></script> -->

<?php
while ( have_posts() ) : the_post();
?>

<div class="row contenu-general">
	<div class="col-lg-8">
		<h1 class="titre-personnalise titre-courant-gauche"><?php echo get_field('titre_personnalise'); ?></h1>
		<?php
		$location = get_field('google_maps');
		//print_r ($location);

		$lat = get_field('latitude');
		$long = get_field('longitude');

		/* GESTION IMAGE DE LA SECTION */
		$thumb_id = get_post_thumbnail_id();
		if(!empty($thumb_id)) {
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
		} else {
			$thumb_url = '';
		}
        
        $photo_maternelle = get_field('photo_maternelle');
		$image_photo_maternelle = $photo_maternelle ['url'];

        $photo_elementaire = get_field('photo_elementaire');
		$image_photo_elementaire = $photo_elementaire ['url'];

		?>

		<div class="onglets-ecoles">

			<?php if($lien_valid) { ?>
				<?php
				/* GESTION DES ONGLETS OUVERTS OU FERMÉS SUIVANT LA PRÉSENCE DE CONTENU */
				$maternelle_v = get_field('maternelle_v'.$num_cat);
				$elementaire_v = get_field('elementaire_v'.$num_cat);
				if($maternelle_v != '' && $elementaire_v != ''){
					$maternelle_show = ' show active';
					$maternelle_true = 'true';
					$elementaire_show = '';
					$elementaire_true = 'false';
				} elseif ($maternelle_v == '' && $elementaire_v != '') {
					$maternelle_show = '';
					$maternelle_true = 'false';
					$elementaire_show = ' show active';
					$elementaire_true = 'true';
				} elseif ($maternelle_v != '' && $elementaire_v == '') {
					$maternelle_show = ' show active';
					$maternelle_true = 'false';
					$elementaire_show = '';
					$elementaire_true = 'true';
				};
				?>

		       	<script type="text/javascript">

		            // ======================
		            // Cartes Google Map
		            // ======================
		            google.maps.event.addDomListener(window, 'load', init);
		         
		            function init() {
		                // Options de base de la Google Map
		                var mapOptions = {
		                    // Zoom au depart sur la carte (obligatoire)
		                    zoom: 14,
		  
		                    // La latitude et longitude pour centrer la carte (obligatoire)
		                    center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
		                    mapTypeControl: false,

	                      	/*
	                      	zoomControl: false,
							mapTypeControl: true,
							scaleControl: true,
							streetViewControl: true,
							rotateControl: false,
							fullscreenControl: true
							*/

		                    // Modification du style d'affichage de la carte : couleurs, luminosité...
		                    //styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
		                };

				        var image = '<?php echo get_stylesheet_directory_uri(); ?>/images/logo_google_maps.png';
		  
		                // Carte Google Map personnalisée
		                // on utilise la div id="map"
		                var mapElement = document.getElementById('map');
		                var mapElement_elementaire = document.getElementById('map_elementaire');
		  
		                // on crée la carte avec les options
		                var map = new google.maps.Map(mapElement, mapOptions);
		                var map_elementaire = new google.maps.Map(mapElement_elementaire, mapOptions);
		  
		                // on ajoute le marqueur
		                var marker = new google.maps.Marker({
		                    position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
		                    map: map,
		                    title: 'AGJA',
					        icon: image
		                });
		                var marker_elementaire = new google.maps.Marker({
		                    position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
		                    map: map_elementaire,
		                    title: 'AGJA',
					        icon: image
		                });
		            }
      		    </script>

				<nav>
					<div class="nav nav-tabs nav-fill tabs-ecoles" id="nav-tab" role="tablist">
						<?php
							if(get_field('maternelle_v'.$num_cat) != '') { ?>
								<a class="nav-item nav-link<?php echo $maternelle_show ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="<?php echo $elementaire_true ?>">Maternelle</a>
						<?php } ?>
						<?php
							if(get_field('elementaire_v'.$num_cat) != '') { ?>
								<a class="nav-item nav-link<?php echo $elementaire_show ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="<?php echo $elementaire_true ?>">Elémentaire</a>
						<?php } ?>
					</div>
				</nav>
					
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<?php 
					if(get_field('maternelle_v'.$num_cat) != '') { ?>
						<div class="tab-pane fade<?php echo $maternelle_show ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

							<!-- PLAN + PHOTO -->
							<?php if($image_photo_maternelle != '') { ?>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-12">
					    			<div id="map">
									<?php
									//if( !empty($location) ):
									$GoogleMaps = get_field('carte_google_maps');
									if ( !empty($GoogleMaps) ) :
									?>
					    				<?php echo the_field('carte_google_maps'); ?>
									<?php endif;

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
									?>
					    			</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">					
									<div class="photo-ecole ">
					                  	<img class="img-ecole" src="<?php echo $image_photo_maternelle ?>" alt="Ecole de l'AGJA">
					            	</div>
								</div>
							</div>
							<!-- PLAN UNIQUEMENT -->
							<?php } else { ?>
								<?php
								if( !empty($location) ):
								?>
					    			<div id="map"></div>
								<?php endif;

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>			
							<?php } ?>

							<div class="texte-ecoles">
								<?php echo get_field('maternelle_v'.$num_cat); ?>
							</div>
						</div>
					<?php } ?>
					<?php 
					if(get_field('elementaire_v'.$num_cat) != '') { ?>
						<div class="tab-pane fade<?php echo $elementaire_show ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

							<!-- PLAN + PHOTO -->
							<?php if($image_photo_elementaire != '') { ?>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-12">
									<?php
									if( !empty($location) ):
									?>
						    			<div id="map_elementaire"></div>
									<?php endif;

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
									?>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">					
									<div class="photo-ecole ">
					                  	<img class="img-ecole" src="<?php echo $image_photo_elementaire ?>" alt="Ecole de l'AGJA">
					            	</div>
								</div>
							</div>
							<!-- PLAN UNIQUEMENT -->
							<?php } else { ?>
								<?php
								if( !empty($location) ):
								?>
					    			<div id="map_elementaire"></div>
								<?php endif;

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>			
							<?php } ?>

							<div class="texte-ecoles">
								<?php echo get_field('elementaire_v'.$num_cat); ?>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

		</div>
	</div><!-- fin col-8 -->

	<div class="col-lg-4">
		<?php get_sidebar(); ?>
	</div>

</div><!-- fin contenu-general -->

<?php
endwhile; // End of the loop.
?>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
