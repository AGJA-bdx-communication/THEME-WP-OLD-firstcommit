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
				$age = ($_REQUEST['age']);
				$terme = ($_REQUEST['terme']);

            	if( isset($age) && !empty($age) && $age == 'age') {

						$args = array(	's' => $search_query,
						                'post_type' => 'page',
						                //'category__and' => array(31,32,33),
						                'category__in' => array(31,32,33,54,82),
					  	            	'posts_per_page' => -1,
				  	            	   	'meta_key' => 'a_partir_de',
		   								//'orderby' => 'meta_value_num',
						                'orderby' => 'title',
						                'order' => 'ASC',
						                'meta_query'=> array(
						      //               array(
												// 'key' => 'a_partir_de',
												// 'compare' => '>=',
												// 'value' =>  $search_query,
												// 'type' => 'numeric',
						      //               ),
						                    array(
												'key' => 'a_partir_de',
												'type' => 'numeric',
												'compare' => '>=',
												// 'value' =>  0,
						                    ),
						                ),
									);

				} elseif ( isset($terme) && !empty($terme) && $terme == 'terme') {

						$args = array(	's' => $search_query,
						                'post_type' => 'page',
						                //'category__and' => array(31,32,33),
						                //'category__in' => array(31,32,33,54,82),
					  	            	'posts_per_page' => -1,
				  	            	   	//'meta_key' => 'a_partir_de',
		   								//'orderby' => 'meta_value_num',
						                //'orderby' => 'a_partir_de',
						                'order' => 'ASC',
						                /*
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
						                */
									);
					

				}



				$query = new WP_Query($args);

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
