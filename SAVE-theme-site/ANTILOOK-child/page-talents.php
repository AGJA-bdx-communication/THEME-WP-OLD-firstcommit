<?php
/**
*
* @package ANTILOOK
*
* Template Name:  Page Jeunes Talents
*
*/

get_header();
?>

	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/open-content', 'page' );
	?>

	<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>

	<div class="row contenu-general">
		<div class="col-lg-9">

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

			<?php
			    $args = array(
  	            'post_type' => 'talents',
  	            'posts_per_page' => -1,
  	            'order' => 'title',
  	            'orderby' => 'ASC',
          	);
          	$position = 1;

            // 2. on exécute la query
            $my_query = new WP_Query($args);

            //var_dump($my_query);
           	?>

            <?php
        	if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();

			$categories = get_the_category();
			foreach ( $categories as $cats ) {
				$cls = $cats->slug;
				$nom_cat = $cats->name;

				if ($cls != $parent_name) {
					array_push($cat_page, $cls);
				}
			}

	        $path_annuaire = get_field('logo');
	        $image_annuaire = $path_annuaire ['url'];

			?>
					
			<div class="article-annuaire">
				<div class="row">

					<div class="col-3">
						<div class="image-annuaire">
							<img class="logo-adherent" src="<?php the_post_thumbnail(); ?>
						</div>
					</div>

					<div class="col-9">
		    			<h3><?php the_title(); ?></h3>
		    			<?php the_content(); ?>
					</div>

				</div>
				
			</div>
			

            <?php
            endwhile;
            endif;

            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
            ?>
        </div><!-- FIN COL 8 -->

        <div class="col-lg-3">
          <?php get_sidebar(); ?>
        </div><!-- FIN COL 3 -->

      </div>
	<?php
	// insertion open-content
	get_template_part( 'template-parts/structure/close-content', 'page' );
	?>

<?php
get_footer();
