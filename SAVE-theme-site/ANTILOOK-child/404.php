<?php
/**
*
* @package ANTILOOK
*
* Template Name: 404
*/

get_header();
?>

<?php
    $id = 2460;
    $billet = get_post($id);
    $title = $billet->post_title;
    $titre_perso = $billet->titre_personnalise;
    $date = $billet->post_date;
    $contenu = $billet->post_content;
    $contenu = apply_filters('the_content', $contenu);
    $contenu = str_replace(']]>', ']]&gt;', $contenu);

?>

	<?php get_template_part( 'template-parts/structure/open-content', 'page' ); ?>

	<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>

	    <div class="row contenu-general" id="contenu-general">
	      <div class="col-lg-8 xx">

                <?php echo $contenu; ?>

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
