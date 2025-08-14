<?php
/**
 * Template Name: Accueil
 *
 * @package ANTILOOK
 */

get_header(); ?>

<?php
$path_jeunesse = get_field('image_jeunesse');
$image_jeunesse = $path_jeunesse ['url'];
$path_sport = get_field('image_sport');
$image_sport = $path_sport ['url'];
?>

<?php
// insertion open-content
get_template_part( 'template-parts/structure/open-content', 'page' );
?>
<div class="text-center">
  <h1 class="titre-personnalise"><?php echo get_field('titre_personnalise'); ?></h1>
</div>

<?php
// insertion open-content
get_template_part( 'template-parts/structure/close-content', 'page' );
?>

<style type="text/css">
.pulse {
  opacity: 0.5;
  -webkit-animation: pulsate 3s ease-out;
  -webkit-animation-iteration-count: infinite;
  font-size: 2.3em;
}

@-webkit-keyframes pulsate {
  0% {
    transform: scale(0.7, 0.7);
    opacity: 0.5;
  }
  50% {
    opacity: 1.0;
  }
  100% {
    transform: scale(1, 1);
    opacity: 1;
  }
}
</style>

<div class="biais">
	<div class="interieur-biais">
  	<div class="row" >

      <!-- JEUENESSE -->
  		<div class="col-lg-4 order-lg-1 col-md-4 order-md-1 col-sm-12 order-sm-2 order-2 bloc-jeunesse marge-zero">
  			<div class="entete-jeunesse"><?php echo get_field('titre_bloc_jeunesse'); ?></div>

        <figure class="effect-marley">
          <a href="<?php echo get_field('lien_jeunesse'); ?><?php echo $datetime ?>">
            <div class="overlay overlay-jeunesse"></div>
            <figcaption class="accroche-jeunesse">
              <h2 class="pulse">DÉCOUVREZ...</h2>
              <p>les offres et les animations...</p>
            </figcaption>
          </a>     
        </figure>

        <div class="image_jeunesse" style="background-image: url(<?php echo $image_jeunesse; ?>);"></div>
  		</div><!-- FIN JEUENESSE -->

      <!-- =========== -->
      <!-- ACTUALITÉ   -->
      <!-- =========== -->
      <div class="col-lg-4 order-lg-2 col-md-4 order-md-2 col-sm-12 order-sm-1 order-1 marge-zero actu-dessus">
        <div class="actu-accueil">
          
          <!-- CAROUSEL start -->
          <div id="carousel-actu" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-content carousel-accueil">
                <?php
                $args_preco = array(
                  //'post_type' => 'evenement_agja',
                  'post_type' => array('evenement_agja', 'actu_section'),
                  //'category__in' => array(82,54),
                  'posts_per_page' => -1,
                  'order' => 'ASC',
                  'meta_query'=> array(
                      array(
                        'key' => 'afficher_bandeau_bleu',
                        'compare' => '=',
                        'value' =>  'oui'
                      )
                  ),
                );
                $position = 1;

                // 2. on exécute la query
                $my_query_preco = new WP_Query($args_preco);

                if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();
                ?>

                <?php if ($position == 1) { ?>
                <div class="carousel-item active">
                <?php } else { ?>
                <div class="carousel-item">
                <?php } ?>

                  <div class="mask flex-center">
                    <div class="container">
                      <div class="row align-items-center">
                        <div class="col-md-12 order-md-1 order-2">
                          <!--  <?php echo get_field('titre_personnalise'); ?> -->
                          <?php
                            $couleur_titre_fond_bleu = get_field('couleur_du_titre_fond_bleu');
                            if ($couleur_titre_fond_bleu != '' ? $couleur_titre = $couleur_titre_fond_bleu : $couleur_titre = '');
                          ?>
                          <div class="titre-actu" <?php if ($couleur_titre != '') { ?>style="color: <?php echo $couleur_titre; ?>" <?php } ?>>
                            <?php echo get_field('titre_dans_le_fond_bleu'); ?>
                          </div>

                          <?php
                            $couleur_extrait_texte = get_field('couleur_extrait_texte');
                            if ($couleur_extrait_texte != '' ? $couleur_extrait = $couleur_extrait_texte : $couleur_extrait = '');
                          ?>
                          <div class="texte-actu" <?php if ($couleur_extrait != '') { ?>style="color: <?php echo $couleur_extrait; ?>" <?php } ?>>
                            <?php echo get_field('extrait_de_texte'); ?>
                          </div>


                          <?php
                          $afficher_bouton = get_field_object('afficher_bouton');
                          $afficher_bt = $afficher_bouton['value'];
                          $target = '';
                          if(get_field('fonctionnement_du_bouton') == 'vers_la_section') {
                            $lien_bt = get_field('vers_la_section');
                          } else if(get_field('fonctionnement_du_bouton') == 'vers_la_page') {
                            $lien_bt = get_field('vers_la_page');
                          } else if(get_field('fonctionnement_du_bouton') == 'vers_le_lien') {
                            $lien_bt = get_field('vers_le_lien');
                            $target = 'target = "_blank"';
                          } else {
                            $lien_bt = get_permalink();
                          }
                          $lien_bt = $lien_bt.$datetime;
                          ?>
                          <?php if($afficher_bt == 'oui') { ?>
                            <div style="margin-top: 15px">
                              <a href="<?php echo $lien_bt ?>" <?php echo $target ?> class="btn btn-bleu">LIRE LA SUITE</a>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <?php
                $position += 1;
                endwhile;
                endif;

                // 4. On réinitialise à la requête principale (important)
                wp_reset_postdata();
                ?>                
              </div>

              <div>
                <a class="carousel-control-prev actu-prev" href="#carousel-actu" role="button" data-slide="prev"> 
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> </a> <a class="carousel-control-next actu-next" href="#carousel-actu" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a> 
              </div>
              <!-- CAROUSEL stop--> 

            </div>
          </div>
        </div>
      </div>
      <!-- ============= -->
      <!-- FIN ACTUALITÉ -->
      <!-- ============= -->

      <script type="text/javascript">
       $('#carousel-actu').carousel({
          interval: 10000,
       })
      </script>

      <!-- SPORT CULTURE -->
  		<div class="col-lg-4 order-lg-3 col-md-4 order-md-3 col-sm-12 order-sm-3 order-3 bloc-sport marge-zero">
        <div class="entete-section"><?php echo get_field('titre_bloc_sport'); ?></div>

        <figure class="effect-marley">
          <a href="<?php echo get_field('lien_sport'); ?><?php echo $datetime ?>">
            <div class="overlay overlay-sport"></div>
            <figcaption class="accroche-sport">
              <h2 class="pulse">PRATIQUEZ...</h2>
              <p>du sport, des activités dans la convivialité...</p>
            </figcaption>
          </a>     
        </figure>

        <div class="image_sport" style="background-image: url(<?php echo $image_sport ?>);"></div>
  		</div><!-- FIN SPORT CULTURE -->

  	</div>
	</div>
</div>


<div class="container">
	<div class="content-general">

    <div class="card-deck">
      <?php
      // 1. on défini ce que l'on veut
      $args_preco = array(
          'post_type' => 'post',
          'category_name' => 'blocs-de-page-daccueil',
          'posts_per_page' => 4,
          'order' => 'ASC'
      );

      // 2. on exécute la query
      $my_query_preco = new WP_Query($args_preco);

      // 3. on lance la boucle !
      if($my_query_preco->have_posts()) : while ($my_query_preco->have_posts() ) : $my_query_preco->the_post();

        $path_bloc = get_field('image_du_bloc');
        $image_bloc = $path_bloc ['url'];
        
      ?>
      <div class="col-xs-12 col-sm-6 col-lg-3 marge-zero">
        <section class="card-parent">
          <div class="card">
            <h5 class="card-title"><?php echo get_field('nom_bloc'); ?></h5>
            <img class="card-image" src="<?php echo $image_bloc; ?>">

            <div class="card-body">
              <!--
              <p class="card-text"><?php echo excerpt(23) ?></p>
            -->
              <?php the_content(); ?>
            </div>
            <div class="card-footer">
              <a href="<?php echo get_field('lien_du_bloc'); ?><?php echo $datetime ?>" class="btn btn-xs <?php echo get_field('couleur_du_bouton'); ?>">LIRE LA SUITE</a>
            </div>
          </div>
        </section>
      </div>
      <?php  
      endwhile;
      endif;
      // 4. On réinitialise à la requête principale (important)
      wp_reset_postdata();
      ?>
    </div>
    
    <div class="row contenu-general">
      <div class="col-lg-9">
        <?php the_content(); ?>
      </div>
      <div class="col-lg-3">
        <?php get_sidebar(); ?>
      </div>
    </div>

	</div><!-- #main -->
</div><!-- #primary -->

<script type="text/javascript">
/*
flexFont = function () {
    var divs = document.getElementsByClassName("titre-actu");
    for(var i = 0; i < divs.length; i++) {
        var relFontsize = divs[i].offsetWidth*0.05;
        divs[i].style.fontSize = relFontsize+'px';
    }
};

window.onload = function(event) {
    flexFont();
};
window.onresize = function(event) {
    flexFont();
};
*/
</script>

<?php
//get_sidebar();
get_footer();
