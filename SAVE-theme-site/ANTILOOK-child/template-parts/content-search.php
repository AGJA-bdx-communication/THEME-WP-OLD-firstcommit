<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ANTILOOK
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<hr>

	<div class="row">
		<?php
		$perma = get_permalink();
		$lien_bt = $perma.'?recherche='.get_search_query();

		if (get_the_post_thumbnail() != '') {
		// ===================== //
		// thumbnail + texte
		// ===================== //
		?>
		<div class="col-lg-4 col-md-4">
			<?php //antilook_post_thumbnail(); ?>
			<a href="<?php echo $lien_bt ?>"><?php the_post_thumbnail(); ?></a>
			<?php
			if( $a_partir != '') {
				if (get_field('a_partir_de') == 0) {
					echo 'Accessible à tout âge';
				} else {
					echo 'A partir de '.get_field('a_partir_de').' ans';
				}
			}
			?>
		</div>
		<div class="col-lg-8 col-md-8">
			<?php the_title( sprintf( '<h2 class="titre-recherche"><a href="'.$lien_bt.'" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="entry-summary">
				<?php echo excerpt(16) ?>
				<?php //the_excerpt(); ?>
				<div style="margin-top: 10px">
					<a href="<?php echo $lien_bt ?>" <?php echo $target ?> class="btn btn-bleu">Afficher la page...</a>
				</div>
			</div>
		</div>
		<?php
		// ===================== //
		// texte seul
		// ===================== //
		} else {
		?>
		<div class="col-lg-12">
			<?php the_title( sprintf( '<h2 class="titre-recherche"><a href="'.$lien_bt.'" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php get_field('a_partir_de'); ?>
			<div class="entry-summary">
				<?php echo excerpt(16) ?>
				<?php //the_excerpt(); ?>
				<div style="margin-top: 10px">
					<a href="<?php echo $lien_bt ?>" <?php echo $target ?> class="btn btn-bleu">Afficher la page...</a>
				</div>
			</div>
		</div>

		<?php
		}
		?>
		
	</div>


	<footer class="entry-footer">
		<?php //antilook_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
