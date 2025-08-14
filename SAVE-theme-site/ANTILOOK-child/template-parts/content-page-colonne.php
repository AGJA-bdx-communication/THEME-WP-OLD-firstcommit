<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ANTILOOK
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		$indicateur_couleur = get_field('indicateur_couleur');
		//echo $indicateur_couleur;
		
		if ( $indicateur_couleur != '' ) {
		?>
		<h1 class="stick_<?php echo $indicateur_couleur; ?> titre-courant-gauche-sans-stick"><?php echo get_field('titre_personnalise'); ?></h1>
		<?php
		} else {
		?>
		<h1 class="stick_<?php echo $indicateur_couleur; ?> titre-courant-gauche-sans-stick"><?php echo get_field('titre_personnalise'); ?></h1>
		<?php
		}
		?>
		<!-- <h1 class="titre-personnalise titre-courant-gauche"><?php echo get_field('titre_personnalise'); ?></h1> -->

	</header><!-- .entry-header -->

	<?php //antilook_post_thumbnail(); ?>
	
	<?php if(get_field('paragraphe_entete') != '') { ?>
	<div class="entete"><?php echo get_field('paragraphe_entete'); ?></div>
	<?php } ?>

	<div class="entry-content">
		<div class="deux-colonnes">
			
			<?php
			$recherche = $_GET['recherche'];
			$content = get_the_content();
			$content = '<p>'.$content.'</p>';
			$new_content = str_replace( $recherche, '<span class="search-highlight">'.$recherche.'</span>', $content );

			//echo $new_content;
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'antilook' ),
				'after'  => '</div>',
			) );
			?>
			
		</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'antilook' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
