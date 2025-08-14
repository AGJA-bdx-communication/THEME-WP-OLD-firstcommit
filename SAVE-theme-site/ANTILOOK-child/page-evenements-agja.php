<?php

/**
 *
 * @package ANTILOOK
 *
 * Template Name:  Page Evenements AGJA
 *
 */

get_header();
?>

<?php
$mois_en_cours = date('n');
$mois_a_venir = [];

$les_mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

?>

<?php
// insertion open-content
get_template_part('template-parts/structure/open-content', 'page');
?>

<div class="fil-d-arianne"><?php if (function_exists('seomix_content_breadcrumb')) seomix_content_breadcrumb(); ?></div>

<div class="row contenu-general">
	<div class="col-lg-9">
		<h1 class="titre-personnalise titre-courant-gauche"><?php echo get_field('titre_personnalise'); ?></h1>

		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Evènements à venir</a>
				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Evènements passés</a>
			</div>
		</nav>

		<!-- =============== -->
		<!-- ACTUS EN COURS  -->
		<!-- =============== -->
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<?php

				for ($i = 1; $i <= 12; $i++) {
					if ($mois_en_cours <= $i) {
						$mois_restant[] = [
							$les_mois[$i - 1],
							$i,
							date('Y')
						];
					}

					if ($mois_en_cours > $i) {
						$mois_a_venir[] = [
							$les_mois[$i - 1],
							$i,
							date('Y')+1
						];
					}
				}

				if (empty(count($mois_a_venir))) {
					$les_mois_complets = $mois_restant;
				} else {
					$les_mois_complets = array_merge_recursive($mois_restant, $mois_a_venir);
				}

				/* ========================= */
				/* CALCUL DU NOMBRE D'ACTU
            	/* ========================= */
				$date_du_jour = date("Y-m-d");

				$args_nb = [
					'post_type' 		=> 'evenement_agja',
					'posts_per_page' 	=> -1,
					'orderby' 			=> 'date_evenement',
					'meta_query' 		=> [
						[
							'key' 		=> 'date_evenement',
							'compare' 	=> '>=',
							'value' 	=> $date_du_jour,
							'type' 		=> 'DATE'
						]
					],
				];
				// 2. on exécute la query
				$nb_preco = new WP_Query($args_nb);
				/* on compte les posts */
				$nb_total = $nb_preco->found_posts;
				
				if ($nb_total > 0) {
					foreach ($les_mois_complets as $mois) {
						$start_date = date($mois[2] . '-' . $mois[1] . '-1');
						$end_date = date("Y-m-t", strtotime($start_date));

						if (date_format(date_create($mois[2] . '-' . $mois[1]),"m-Y") == date("m-Y")) {
							$start_date = date("Y-m-d");
						}

						$args_preco = [
							'post_type'       => 'evenement_agja',
							'posts_per_page'  => -1,
							'orderby'         => 'date_evenement',
							'order'           => 'DESC',
							'meta_query' => [
								[
									'key' => 'date_evenement',
									'compare' => '>=',
									'value'   =>  $start_date,
									'type'    => 'DATE'
								],
								[
									'key'     => 'date_evenement',
									'compare' => '<=',
									'value'   => $end_date,
									'type'    => 'DATE'
								]
							],
						];

						// 2. on exécute la query
						$my_query_preco = new WP_Query($args_preco);

						/* on compte les posts */
						$total = $my_query_preco->found_posts;
						
						if ($total > 0) { ?>
							<div class="mois-evenement">
								<div class="titre-mois"><?php echo $mois[0] ?></div> <?php echo $mois[2] ?>
							</div>

							<div class="row">
								<?php
									if ($my_query_preco->have_posts()) : while ($my_query_preco->have_posts()) : $my_query_preco->the_post();
										/* GESTION IMAGE DE LA SECTION */
										$thumb_id = get_post_thumbnail_id();
										$thumb_url = '';
										if (!empty($thumb_id)) {
											$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
											$thumb_url = $thumb_url_array[0];
										} ?>
										<div class="col-8 col-md-4 my-1 mx-auto mx-md-0">
											<div class="card card-evenement">
												<div class="card-body">
													<h5 class="card-title"><?php the_title(); ?></h5>
													<?php 
														if (get_field('date_evenement') != '') {
															echo('<div class="card-text date-evenement">' . get_field('date_evenement') . '</div>');
														} 
														
														if ($thumb_url != '') {
															echo('<img class="card-img-top" src="'. $thumb_url . '" alt="Card image cap">');
														} ?>
													<div class="card-text text-evenement"><?php echo get_field('extrait_de_texte') ?></div>
													<div class="row">
														<div class="col-12 bt-evenement">
															<?php 
																$afficher_bouton = get_field_object('afficher_bouton')["value"];
															?>
															<?php if ($afficher_bouton == 'oui') : ?><a href="<?php the_permalink() ?>" class="btn btn-xs btn-bleu">En savoir plus...</a><?php endif ?>
														</div>
													</div>
												</div>
											</div>
										</div>
								<?php
									endwhile;
								endif;

								// 4. On réinitialise à la requête principale (important)
								wp_reset_postdata();
								?>
							</div>

						<?php } ?>
					<?php } 
				} else {
					// echo("Il n'y a aucune évènements à venir. Revenez plus tard !");
				} ?>
			</div>

			<!-- ============= -->
			<!-- ACTUS PASSÉES -->
			<!-- ============= -->
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<?php
				
				$month = date('m');
                $year = date('Y');
                while ($res != date("m-Y", mktime(0, 0, 0, 12, 1, date('Y')-2))) {
                    $mois_restants[] = [
                        $les_mois[$month - 1],
                        $month,
                        $year
                    ];

                    if ($month == 1) {
                        $month = 13;
                        $year--;
                    }

                    $month--;

                    $res = date_format(date_create($year . "-" . $month),"m-Y");
                }

				foreach ($mois_restants as $mois) {
					$start_date = date($mois[2] . '-' . $mois[1] . '-1');
                    $end_date = date("Y-m-t", strtotime($start_date));

                    if (date_format(date_create($mois[2] . '-' . $mois[1]),"Y-m") == date("Y-m")) {
                        $end_date = date("Y-m-d");
                    }

					$args_preco = [
						'post_type' 		=> 'evenement_agja',
						'posts_per_page' 	=> -1,
						'orderby' 			=> 'date_evenement',
                        'order'         	=> 'ASC',
						'meta_query' => [
							[
								'key' 		=> 'date_evenement',
								'compare' 	=> '>=',
								'value' 	=>  $start_date,
								'type' 		=> 'DATE'
							],
							[
								'key' 		=> 'date_evenement',
								'compare'	=> '<',
								'value' 	=> $end_date,
								'type' 		=> 'DATE'
							]
						],
					];

					// 2. on exécute la query
					$my_query_preco = new WP_Query($args_preco);

					/* on compte les posts */
					$total = $my_query_preco->found_posts;
					
					if ($total > 0) { ?>
						<div class="mois-evenement">
							<div class="titre-mois"><?php echo $mois[0] ?></div> <?php echo $mois[2] ?>
						</div>
						
						<?php
							if ($my_query_preco->have_posts()) : while ($my_query_preco->have_posts()) : $my_query_preco->the_post(); ?>
								<div class="titre-evenement-passe">
									<a href="<?php the_permalink() ?>">
										<?php
										$date_even = get_field('date_evenement');
										$date_even = str_ireplace('<p>', '', $date_even);
										$date_even = str_ireplace('</p>', '', $date_even);
										?>
										<strong><?php the_title(); ?></strong> - <?php echo $date_even; ?>
									</a>
								</div>
						<?php
							endwhile;
						endif;

						// 4. On réinitialise à la requête principale (important)
						wp_reset_postdata();
						?>

					<?php } ?>
				<?php } ?>
			</div><!-- FIN DU TAB EVENEMENTS PASSÉS -->
		</div>

	</div><!-- FIN COL 8 -->

	<div class="col-lg-3">
		<?php get_sidebar(); ?>
	</div><!-- FIN COL 3 -->

</div>

<?php
// insertion open-content
get_template_part('template-parts/structure/close-content', 'page');
?>

<?php
get_footer();
