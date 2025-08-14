<?php
/*
   _   _  _ _____ ___ _    ___   ___  _  __
  /_\ | \| |_   _|_ _| |  / _ \ / _ \| |/ /
 / _ \| .` | | |  | || |_| (_) | (_) | ' < 
/_/ \_\_|\_| |_| |___|____\___/ \___/|_|\_\

*/
/**
* @package ANTILOOK
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />
	<link rel="icon" sizes="192x192" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_192.png">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_152.png">
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146396306-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-146396306-1');
	</script>

</head>

<body <?php body_class(); ?>>
<!-- <iframe id="iframe_2" name="iframe_2" src="https://egyla.agja.org/connexion" style="display:none; height:100%; width: 100%; background-color: rgba(0, 0, 0, 0.5); position: fixed; z-index: 100000;"></iframe> -->
<!-- 
<iframe id="test" name="test" src="#" style="height:100%; width: 100%; background-color: transparent; position: fixed; z-index: 100000;"></iframe> -->

	<?php
	global  $datetime ;
	$datetime = strtotime("now");
	$datetime = '?t='.$datetime;
	?>

<div class="container-general">
	
	<div id="page" class="site">
		<header id="masthead" class="site-header">
		
		<div class="container">
			<div class="bar-recherche">
				<div class="row recherche-container">
					
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="filtre-recherche">

							<?php
							$a_partir_de = array(	3 => '3 ans',
													4 => '4 ans',
													5 => '5 ans',
													6 => '6 ans',
													7 => '7 ans',
													8 => '8 ans',
													9 => '9 ans',
													10 => '10 ans',
													11 => '11 ans',
													12 => '12 ans',
													13 => '13 ans',
													14 => '14 ans',
													15 => '15 ans',
													16 => '16 ans',
													17 => '17 ans',
													18 => '18 ans',
												);
							?>
							
							<form method="get" id="age_form" action="<?php echo esc_url( home_url( '/'  ) ); ?>" role="search" >
								<label for="exampleFormControlSelect1"><h3><strong>Rechercher par âge :</strong></h3></label>
								<div class="input-group">
									<select class="form-control custom-select" id="age" name="s" required="required" data-error="Merci de choisir un âge...">
										<option value="">Choisissez un âge...</option>
										<?php foreach($a_partir_de as $key => $value) { ?>
										<option value="<?php echo $key ?>">à partir de <?php echo $value ?></option>
										<?php } ?>
									</select>
									<div class="input-group-append">
										<button type="submit" class="btn btn-outline-secondary" id="choix_age"><span class="fa fa-search"></span> Rechercher</button>
									</div>
								</div>
								<input type="hidden" id="age" name="age" value="age">
							</form>

						</div>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-12">
						<form method="get" id="terme_form" action="<?php echo esc_url( home_url( '/'  ) ); ?>" role="search">
							<label for="exampleFormControlSelect1"><h3><strong>Rechercher une activité :</strong></h3></label>
							<div class="input-group">
								<input type="text" class="form-control input-lg" placeholder="Saisissez le terme à rechercher..." name="s" id="terme" required/>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="submit"><span class="fa fa-search"></span> Rechercher</button>
								</div>
							</div>

							<input type="hidden" id="terme" name="terme" value="terme">
						</form>
					</div>
					
				</div>
			</div>

			<div class="bar-mobile">
				<div class="row no-gutters justify-content-around recherche-container">
					<div class="col-lg-3 col-md-2 col-sm-12">

						<div class="filtre-recherche">
							<form method="get" id="age_form" action="<?php echo esc_url( home_url( '/'  ) ); ?>" role="search">
								<label for="exampleFormControlSelect1"><h3><strong>Rechercher par âge :</strong></h3></label>
								<div class="input-group">
									<select class="form-control" id="age" name="s">
										<option value="0">Choisissez un age...</option>
										<?php foreach($a_partir_de as $key => $value) { ?>
										<option value="<?php echo $key ?>">à partir de <?php echo $value ?></option>
										<?php } ?>
									</select>
									<div class="input-group-append">
										<button type="submit" class="btn btn-outline-secondary" id="choix_age"><span class="fa fa-search"></span> Rechercher</button>
									</div>
								</div>
								<input type="hidden" id="age" name="age" value="age">
							</form>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12">
						<form method="get" id="terme_form" action="<?php echo esc_url( home_url( '/'  ) ); ?>" role="search">
							<label for="exampleFormControlSelect1"><h3><strong>Rechercher une activité :</strong></h3></label>
							<div class="input-group">
								<input type="text" class="form-control input-lg" placeholder="Saisissez le terme à rechercher..." name="s" id="terme"/>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="submit"><span class="fa fa-search"></span> Rechercher</button>
								</div>
							</div>

							<input type="hidden" id="terme" name="terme" value="terme">
						</form>
					</div>
			
				</div>
			</div>
		</div>

		<div  class="site-header fond-header fond-degrade">
			<div class="menu-complet">
				<div class="burger-container">
					<div class='hamburger'>
						<div class="bar top"></div>
						<div class="bar middle"></div>
						<div class="bar bottom"></div>
					</div>
				</div>
				<div class='menu'>
					<?php wp_nav_menu( array(
								'theme_location' => 'menu-general',
								'depth' => 2,
								'container_class' => 'menu-general-deroulant',
								'menu_id' => '',
								'menu_class' => 'nav navbar-nav menu-general',
							)
						);
					?>
				</div>	

			</div>

			<div class="container">
				
				<div class="row">
					
					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="bloc-logo">
							<div class="logo">
								<?php the_custom_logo(); ?>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="row slogan-header">

							<div class="nom-mdq">
								La Maison de Quartier de Caudéran
							</div>
							
							<div class="slogan-mdq">
								du sport, des animations et des loisirs pour tous
							</div>

							<div class="bloc-recherche-mobile">
								<a class="btn btn-success btn-labeled bouton-recherche" role="button">
									<i class="fa fa-search"></i> Recherchez...
								</a> 
							</div>

						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-3">
						<div class="container-infos">
							<!-- INFO DESKTOP -->
							<div class="infos-accueil">
								<div class="row">
									<div class="facebook-accueil">
										<a href="https://www.facebook.com/AGJA-Bordeaux-Caud%C3%A9ran-325543441177438/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-icon.svg" width="20px" alt="Logo Facebook"></a>
									</div>
									<div class="tel-accueil">
										<a href="tel:+33556086779">05 56 08 67 79</a>
									</div>
								</div>
							</div>
							<!-- INFO MOBILES -->
							<div class="infos-accueil-mobile">
								<div class="text-center">
									<div class="facebook-accueil">
										<a href="https://www.facebook.com/AGJA-Bordeaux-Caud%C3%A9ran-325543441177438/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-icon.svg" width="20px"></a>
									</div>
									<div class="tel-accueil">
										<a href="tel:+33556086779">05 56 08 67 79</a>
									</div>
								</div>
							</div>

							<div class="bloc-recherche">
								<a class="btn btn-success btn-labeled bouton-recherche" role="button">
									<i class="fa fa-search"></i> Recherchez...
								</a> 
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

		</header><!-- #masthead -->
