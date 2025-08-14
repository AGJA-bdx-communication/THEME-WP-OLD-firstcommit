<?php

/* ============================== */
/* ============================== */
/*          WOOCOMMERCE           */
/* ============================== */
/* ============================== */
add_theme_support( 'woocommerce' );


/* ============================== */
/*      WOO PRODUITS APPARENTÉS   */
/* ============================== */
function woo_related_products_limit() {
  global $product;
    
    $args['posts_per_page'] = 5;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 5; // 4 related products
    $args['columns'] = 5; // arranged in 2 columns
    return $args;
}


/* ============================== */
/*      WOO NOMBRE DE COLONNE     */
/* ============================== */

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 3 products per row
    }
}


/* ============================== */
/*      WOO LIGHTBOX
/* ============================== */
/*
    Woocommerce 3.0.0 Compatibility Fix
    Remove Enfold's custom functions that conflict with the new image display in WooCommerce 3.0.0
*/
global $woocommerce;

if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {

    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    function avia_woocommerce_gallery_thumbnail_description($img, $attachment_id, $post_id, $image_class ) {
        return $img;
    }
    function avia_woocommerce_post_thumbnail_description($img, $post_id){
        return $img;
    }

}
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


/* ============================== */
/*      WOO PRIX AVEC TVA
/* ============================== */
function edit_price_display() {
  $product = new WC_Product( get_the_ID() );
  $price = $product->price;
 
  $price_incl_tax = $price + round($price * ( 21 / 100 ), 2);
 
  $price_incl_tax = number_format($price_incl_tax, 2, ",", "."); 
  $price = number_format($price, 2, ",", "."); 
 
  $display_price = '<span class="price">';
  $display_price .= '<span class="amount">€ ' . $price_incl_tax .'<small class="woocommerce-price-suffix"> incl BTW</small></span>';
  $display_price .= '<br>';
  $display_price .= '<span class="amount">€ ' . $price .'<small class="woocommerce-price-suffix"> excl BTW</small></span>';
  $display_price .= '</span>';
 
  echo $display_price;
}
 
add_filter('woocommerce_price_html', 'edit_price_display');


/* ============================== */
/*  WOO SUPP ZOOM AUTO SUR IMAGE
/* ============================== */
function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
    
    // Adds the new tab
    
    $tabs['test_tab'] = array(
        'title'     => __( 'Shipping', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'woo_new_product_tab_content'
    );

    return $tabs;

}


/* ============================== */
/*  WOO VENTES CROISÉES
/* ============================== */

// Display the custom fields in the "Linked Products" section
add_action( 'woocommerce_product_options_related', 'woocom_linked_products_data_custom_field' );

// Save to custom fields
add_action( 'woocommerce_process_product_meta', 'woocom_linked_products_data_custom_field_save' );


// Function to generate the custom fields
function woocom_linked_products_data_custom_field() {
    global $woocommerce, $post;
?>
<p class="form-field">
    <?php
    $product_ids = get_post_meta( $post->ID, '_upsizing_products_ids', true );
    ?>
    <label for="upsizing_products" class="woo-admin">Masquer dans le catalogue : 
        <input type="checkbox"  value="<?php echo esc_attr( $product_id ) ?>" name="upsizing_products">
    <span class="checkmark"></span>
    </label>

</p>

<?php
}
// Function the save the custom fields
function woocom_linked_products_data_custom_field_save( $post_id ){
    $product_field_type =  $_POST['upsizing_products'];
    update_post_meta( $post_id, '_upsizing_products_ids', $product_field_type );
}


/* ===================================================== */
/* REDIRIGE VERS LES COMMANDES APRES LOGIN 
/* ===================================================== */
function iconic_login_redirect( $redirect, $user ) {
    $redirect_page_id = url_to_postid( $redirect );
    $checkout_page_id = wc_get_page_id( 'checkout' );
    
    if( $redirect_page_id == $checkout_page_id ) {
        return $redirect;
    }
 
    return wc_get_page_permalink( 'orders' );
}
 
add_filter( 'woocommerce_login_redirect', 'iconic_login_redirect' );


/* ===================================================== */
/* REDIRIGE VERS LA BOUTIQUE APRÈS INSCRIPTION
/* ===================================================== */
function iconic_register_redirect( $redirect ) {
    return wc_get_page_permalink( 'shop' );
}
 
add_filter( 'woocommerce_registration_redirect', 'iconic_register_redirect' );



if($status == 2){ //when meta value is 2 user account is pending
if ( !strstr($referrer, '?login=not_activated' )) {
            wp_redirect( $referrer . '?login=empty');
            //wp_redirect( home_url('/login/?login=not_activated') );
            }
            else {
                wp_redirect( $referrer );
            }
    exit;

    }   
  }
 }

 