<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Sites
*
*/

get_header();
?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeIJYa4RQEAj5y8t80YWJ2Ma7srUksXps"></script>

	<?php get_template_part( 'template-parts/structure/open-content', 'page' ); ?>
	<style type="text/css">
		.ancres{display: block; 
			height: 100px; /*same height as header*/ 
			margin-top: -100px; /*same height as header*/
			visibility: hidden;
		}
	</style>

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
				?>

				<script type="text/javascript">
				// NY and CA sample Lat / Lng
                var southWest = new google.maps.LatLng(40.744656, -74.005966);
                var northEast = new google.maps.LatLng(34.052234, -118.243685);
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();

                // set multiple marker
                for (var i = 0; i < 250; i++) {
                    // init markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()),
                        map: map,
                        title: 'Click Me ' + i
                    });
				</script>

				<?php
				$args_preco = array(
  	            	'post_type' => 'sites',
  	            	'posts_per_page' => -1,
    				'orderby' => 'menu_order', 
				);

				$my_query_preco = new WP_Query($args_preco);
				//print_r($my_query_preco);

				$i = 1;
      	        if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
      	        	$slug = $post->post_name;
      	        	?>

      	        	<a class="ancres" href="#" name=" " id="<?php echo $slug; ?>"></a>

  	        		<div class="bandeau-titre-site">
	      	        	<h2 class="titre-site"><?php echo get_field('titre_personnalise'); ?></h2>
  	        		</div>

  	        		<div class="bloc-site">
  	        			<div class="row">

	      	        		<div class="col-lg-6 col-xs-12">
	    						<?php
								/* GESTION IMAGE DE LA SECTION */
								$thumb_id = get_post_thumbnail_id();
								if(!empty($thumb_id)) {
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
									$thumb_url = $thumb_url_array[0];
								} else {
									$thumb_url = '';
								}
	          					?>
								<?php if($thumb_url != '') { ?>
		      	        			<div class="image-site">
										<img class="card-img-top" src="<?php echo $thumb_url ?>" alt="Card image cap">
									</div>
									<?php } ?>
	      	        			<div class="texte-site">
		      	        			<?php the_content() ?>
	      	        			</div>
	      	        		</div>

      	        		<div class="col-lg-6 col-xs-12">
      	        			<?php
      	        			//$location = get_field('google_maps');
      	        			$lat = get_field('latitude');
      	        			$long = get_field('longitude');
      	        			//echo $long;

							//if( !empty($lat) ):
							?>
					       	<script type="text/javascript">
					            // Carte Google Map
					            google.maps.event.addDomListener(window, 'load', init);
					         
					            function init() {
					                // Options de base de la Google Map
					                var mapOptions = {
					                    // Zoom au depart sur la carte (obligatoire)
					                    zoom: 14,
					  
					                    // La latitude et longitude pour centrer la carte (obligatoire)
					                    center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
					  
					                };

							        var image = '<?php echo get_stylesheet_directory_uri(); ?>/images/logo_google_maps.png';
					  
					                // Carte Google Map personnalisée
					                // on utilise la div id="map"
					                var mapElement = document.getElementById('map<?php echo $i ?>');
					  
					                // on crée la carte avec les options
					                var map<?php echo $i ?> = new google.maps.Map(mapElement, mapOptions);
					  
					                // on ajoute le marqueur
					                var marker = new google.maps.Marker({
					                    position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
					                    map: map<?php echo $i ?>,
					                    title: 'AGJA',
								        icon: image
					                });
					            }
		      		        	</script>

				    			<!-- <div id="map<?php echo $i ?>" class="carte_google"></div> -->
				    			<div id="map">
									<?php
									//if( !empty($location) ):
									$GoogleMaps = get_field('carte_google_maps');
									if ( !empty($GoogleMaps) ) :
									?>
					    				<?php echo the_field('carte_google_maps'); ?>
									<?php endif; ?>
				    			</div>
							<?php //endif; ?>
      	        		</div>
  	        		</div>
      	        	</div>

					<?php
					$i++;
			       	endwhile;
				endif;

				// On réinitialise à la requête principale (important)
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
