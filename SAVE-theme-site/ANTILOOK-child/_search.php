<?php
/**
 * The template for displaying search results pages
 *
 * @package ANTILOOK
 */

get_header();
?>

	<?php get_template_part( 'template-parts/structure/open-content', 'page' ); ?>

		<div class="row contenu-general" id="contenu-general">
	      	<div class="col-lg-8">

				<?php $search_query = get_search_query(); ?>

				<?php
				if($search_query == '') {
				?>
				<!--
					<h1 class="titre-personnalise titre-courant-gauche"><p><strong>Recheche</strong></p>
					</h1>
					Il n'y a pas de résultat correspondant à votre recherche.
				-->
				<?php
				}
				?>

				<?php
				$age = ($_REQUEST['age']);
				$terme = ($_REQUEST['terme']);
        		//echo $term;
				//$enfant_adulte = get_field('enfant_adulte');
				//echo $enfant_adulte;

				$args = array(	's' => $search_query,
				                'post_type' => 'page',
				                //'category__and' => array(31,32,33),
				                'category__in' => array(31,32,33),
			  	            	'posts_per_page' => -1,
		  	            	   	'meta_key' => 'a_partir_de',
   								'orderby' => 'meta_value_num',
				                //'orderby' => 'a_partir_de',
				                'order' => 'ASC',
				                'meta_query'=> array(
				                    array(
										'key' => 'a_partir_de',
										'compare' => '>=',
										'value' =>  $search_query,
										'type' => 'numeric',
				                    ),
				                    array(
										'key' => 'a_partir_de',
										'compare' => '!=',
										'value' =>  0,
				                    ),
				                ),
							);

/*
				$args = array(	's' => $search_query,
				                'post_type' => 'page',
				                'category__in' => array(31,32,33),
			  	            	'posts_per_page' => -1,
		  	            	   	'meta_key' => 'a_partir_de',
   								'orderby' => 'meta_value_num',
				                'order' => 'ASC',

								'meta_query' => array(
									'relation' => 'OR',
									'enfants' => array(
										'key' => 'a_partir_de',
										'compare' => '>=',
										'value' =>  $search_query,
									),
									'adultes' => array(
										'key' => 'a_partir_de',
										'compare' => '!=',
										'value' =>  0,
									), 
								),
								'orderby' => array(
									'enfants' => 'ASC',
									'adultes' => 'ASC'
								),
							);
*/


				$query = new WP_Query($args);
				//print_r($query);
				?>

				<?php if( $query->have_posts()) { ?>

					<header class="page-header">
						<h1 class="titre-personnalise titre-courant-gauche">
							<?php
			            	if( !empty($age) && $age == 'age') {
			            		if($search_query == '') {
									printf( esc_html__( 'Résultats trouvés pour : %s', 'antilook' ), '<strong>Sans limite d\'âge</strong>' );
			            		} else {
				        			// AGE
									printf( esc_html__( 'Résultats trouvés pour : %s', 'antilook' ), '<strong>à partir de '.get_search_query().' ans</strong>' );
			            		}
			        		} elseif( !empty($terme) && $terme == 'terme') {
			        			// TERME
								printf( esc_html__( 'Résultats trouvés pour : %s', 'antilook' ), '<strong>'.get_search_query().'</strong>' );
			        		}

							?>
						</h1>
					</header><!-- .page-header -->

					<?php
					//echo $titre_cat;
					//$post_id = get_the_ID();
					//echo $post_id;
					//$post_cat = get_the_category($post_id);
					//print_r($post_cat);
					//echo $post_cat[0]->name;
					//$cat_id = $post_cat[0]->cat_ID;
					
					/*
					for($i=31; $i<=33; $i++) {

						if($titre_cat == $post_cat[0]->name) {
							$titre_cat = $post_cat[0]->name;
						}

						/*		
						$titre_cat = '';
						if($i == $cat_id) {
							if(!empty($titre_cat)) {
								$titre_cat = $post_cat[0]->name;
							} else {
								$titre_cat = '';
							}
							//echo $titre_cat;
							//echo $post_cat[0]->name;
							get_template_part( 'template-parts/content', 'search' );
						}
						
					}
					*/

					/* Start the Loop */
					while( $query->have_posts()): $query->the_post();
					{
						get_template_part( 'template-parts/content', 'search' );
					}
					endwhile;

				} else {
					if($search_query == '') {
						echo '<h1 class="titre-personnalise titre-courant-gauche"><p><strong>Aucun terme saisi</strong></p></h1>';
						echo 'Vous devez saisir un mot dans le champ de recherche...';
					} else {
						echo '<h1 class="titre-personnalise titre-courant-gauche"><p>Votre recherche : <strong>'.$search_query.'</strong></p></h1>';
						echo 'Il n\'y a pas de résultat correspondant à votre recherche.';
					}
				};
				?>
	      	</div>

	      	<div class="col-lg-4">
				<div class="sidebar">
		        	<?php get_sidebar(); ?>
		        </div>
      		</div>

      	</div>
    </div>

	<?php get_template_part( 'template-parts/structure/close-content', 'page' ); ?>
<?php
get_footer();
