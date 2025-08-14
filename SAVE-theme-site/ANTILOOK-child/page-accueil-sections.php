<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Accueil Sections
*
*/

get_header();
?>

	<?php

	$args = array('parent' => 30);
	$categories = get_categories( $args );

	$categ = array(31,32,33,92);

	// insertion open-content
	get_template_part( 'template-parts/structure/open-content-accueil-section', 'page' );
	?>

	<style type="text/css">
	.card {
		display: block; 

	}
	.card:hover {

	}
	.img-card {
		width: 100%;
		border-top-left-radius:2px;
		border-top-right-radius:2px;
		display:block;
    	overflow: hidden;
	}
	.img-card img{
		width: 100%;
	}
	.a-partir {
		text-align: center;
		font-style: italic;
	}
	</style>

	    <div class="row contenu-general">
	      	<div class="col-lg-8">

			<?php
			foreach($categories as $category) {
				//echo $category->cat_ID;
				if(in_array($category->cat_ID, $categ)) {
					// gestion des couleurs devant les catégories
					$cat_slug = $category->slug;
					if ($cat_slug == 'sports-de-competition') {
						$style_titre = 'titre-accueil-competition';
					} elseif ($cat_slug == 'sports-de-detente') {
						$style_titre = 'titre-accueil-detente';
					} elseif ($cat_slug == 'activites-socio-culturelles') {
						$style_titre = 'titre-accueil-socio';
					} elseif ($cat_slug == 'bien-etre') {
						$style_titre = 'titre-accueil-bien-etre';
					}
					//echo($cat_slug);
				?>

				<div>
					<a class="ancres" id="<?php echo $cat_slug; ?>"></a>
					<h1 class="<?php echo $style_titre ?>"><?php echo $category->name; ?></h1>
				</div>

          		<div class="card-columns">
					<?php
					$args_preco = array(
					    'post_type' => 'page',
					    'category_name' => $category->slug,
					    'posts_per_page' => -1,
					    'orderby' => 'title',
					    'order' => 'ASC',
					    'post__not_in' => array(2410),
					);
					$position = 1;

					// 2. on exécute la query
					$my_query_preco = new WP_Query($args_preco);
					if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
						global $post;
    					$slug = $post->post_name.'/?t='.$datetime;

						/* GESTION DU "A PARTIR DE" */
						$a_partir = get_field('a_partir_de');

						if ($a_partir != '' && $a_partir != 0 && $a_partir != 'plus') {
							if ($a_partir <= 17) {
								$a_partir = 
									"<div class=\"card-text a-partir\">
										à partir de ".$a_partir." ans
									</div>";
							}
						} else if($a_partir == 'plus') {
							$a_partir = 
								"<div class=\"card-text a-partir\">
									à partir de 18 ans
								</div>";
						} else if($a_partir == 0) {
							$a_partir = 
								"<div class=\"card-text a-partir\"> 
								</div>";
						}
						?>

						<!--<a href="<?php the_title(); ?>" class="link-card">-->
						<a href="<?php echo $category->slug.'/'.$slug; ?>" class="link-card">
							<div class="card">
								<?php
							        if (get_field('nouveau') != '' && get_field('nouveau') == 'OUI') {
							          echo '<div class="nouveau-grille">NOUVEAUTÉ</div>';
							        };									
								?>
								<div class="img-card">
				                    <img class="img-card" src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="card-body card-evenement">
									<?php
									if (get_field('complet') == 'OUI') {
		       							echo '<div class="section-complete-grille">COMPLET</div>';
						        	}
						        	?>


									<h5 class="card-title"><?php the_title(); ?></h5>

									<?php echo $a_partir; ?>							
								</div>
							</div>
						</a>

					<?php
					$position += 1;
					endwhile;
					endif;

					// 4. On réinitialise à la requête principale (important)
					wp_reset_postdata();
					?>
				</div>

				<?php
				}
			}
			wp_reset_postdata();
			?>

      		</div>

	      	<div class="col-lg-4">
		        <?php get_sidebar(); ?>
	      	</div>
	    </div>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
