<div id="content" class="site-content">
	
	<div class="slider_accueil">
		<?php
		// AFFICHE LE SLIDER SI LE CHAMP EST RENSEIGNÉ DANS LA PAGE
		$var = get_field('diaporama');
	    if ($var != '')
	    {
		    echo do_shortcode($var); 
	    } else {
	    	echo '';
	    }
		?>
	</div>

	<?php
	if (is_page_template('page-maps.php')) { 
		// insertion Google Maps
		get_template_part( 'template-parts/content', 'maps' );
	}
	?>

	<div class="container">

		<div class="content-general">

			<!--
			<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb();?></div>
			-->

