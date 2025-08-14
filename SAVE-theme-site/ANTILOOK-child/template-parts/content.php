<?php
/**
 * Template part for displaying posts
 *
 * @package ANTILOOK
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="titre-personnalise titre-courant-gauche">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				//antilook_posted_on();
				//antilook_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php antilook_post_thumbnail(); ?>

	<!-- RÉCUPÈRE LE NOM DE LA SECTION LIÉE À L'ARTICLE -->
	<?php if(has_category(array('evenements-sections'))) { ?>
		<?php
		$post_id = get_field( 'section', false, false );
		if( $post_id ):
			$lien = get_the_permalink( $post_id );
			?>
			<h2>Section <strong><?php echo get_the_title( $post_id ); ?></strong></h2>
			<?php
		endif;
		?>
	<?php } ?>


	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'antilook' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'antilook' ),
			'after'  => '</div>',
		) );
		?>

		<!-- BOUTON POUR ALLER À LA SECTION -->
		<?php if(has_category(array('evenements-sections'))) {
			if(!empty($lien)) { ?>
			<a class="btn btn-sm btn-agja" href="<?php echo $lien ?>" role="button">Inscription en ligne</a>
		<?php } } ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
