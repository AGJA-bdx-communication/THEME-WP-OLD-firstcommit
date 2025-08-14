<?php
/**
 *
 * @package ANTILOOK
 */

?>

			</div><!-- .site -->

			<div class="footer">

				<div class="container">
					<div class="content-general">
						<?php wp_nav_menu( array(
									'theme_location' => 'menu-footer',
									'depth' => 2,
									/*
									'container_class' => 'menu-footer-colonne',
									*/
									'menu_id' => '',
									'menu_class' => 'nav navbar-nav'
								)
							);
						?>
						<?php
						// insertion open-content
						//get_template_part( 'template-parts/structure/close-content', 'page' );
						?>
					</div><!-- .container -->
				</div><!-- .content-general -->

			</div><!-- .footer -->
			<?php wp_footer(); ?>

		</div><!-- .container-general -->

	</body>
</html>
