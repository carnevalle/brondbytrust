<?php

// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );

// we're firing all out initial functions at the start
add_action('after_setup_theme','brondbytrust_init', 15);
//add_action('after_setup_theme','brondbytrust_theme_support', 16);

function brondbytrust_init() {

    add_action('wp_enqueue_scripts', 'brondbytrust_scripts_and_styles', 999);
    add_action('after_setup_theme','brondbytrust_theme_support');

    brondbytrust_theme_support();
}



function brondbytrust_scripts_and_styles() {
    // register main stylesheet
    wp_register_style( 'twitter-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '', 'all' );
    wp_register_style( 'twitter-bootstrap-responsive', get_stylesheet_directory_uri() . '/css/bootstrap-responsive.css', array(), '', 'all' );
    wp_register_style( 'brondbytrust-stylesheet', get_stylesheet_directory_uri() . '/css/brondbytrust.css', array(), '', 'all' );

    wp_register_script( 'twitter-bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );

    wp_enqueue_style( 'twitter-bootstrap' );
    wp_enqueue_style( 'twitter-bootstrap-responsive' );
    wp_enqueue_style('brondbytrust-stylesheet');

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'twitter-bootstrap-js' );
}



function brondbytrust_theme_support() {

    // wp thumbnails (sizes handled in functions.php)
    add_theme_support('post-thumbnails');

    // default thumb size
    set_post_thumbnail_size(125, 125, true);

    // adding post format support
    add_theme_support( 'post-formats',
        array(
            'aside',             // title less blurb
            'gallery',           // gallery of images
            'link',              // quick link to other site
            'image',             // an image
            'quote',             // a quick quote
            'status',            // a Facebook like status update
            'video',             // video
            'audio',             // audio
            'chat'               // chat transcript
        )
    );
    
    add_theme_support('automatic-feed-links');
    add_theme_support( 'menus' );

    register_nav_menus(
        array(
            'main-menu' => __( 'The Main Menu', 'brondbytrusttheme' ),   // main nav in header
            'footer-links' => __( 'Footer Links', 'brondbytrusttheme' ) // secondary nav in footer
        )
    );
}

// Remove reviews on WooCommerce products
remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30);
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 30);

// Remove ordering of products
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
//add_action( 'woocommerce_before_main_content', 'woocommerce_catalog_ordering', 20 );

// We move related products to a different hook
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20 );

// We move the price to a different hook
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
//add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 10 );

//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );

add_image_size( 'shop_fanaktie', 250, 200, false );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    ob_start();
    
    ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d vare', '%d varer', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
    
}

/**
 * Output the WooCommerce Breadcrumb
 *
 * @access public
 * @return void
 */
function woocommerce_breadcrumb( $args = array() ) {

    $defaults = array(
        'delimiter'  => ' <span class="divider">/</span>',
        'wrap_before'  => '<ul class="breadcrumb" itemprop="breadcrumb>',
        'wrap_after' => '</ul>',
        'before'   => '<li>',
        'after'   => '</li>',
        'home'    => null
    );

    $args = wp_parse_args( $args, $defaults  );

    woocommerce_get_template( 'shop/breadcrumb.php', $args );
}

function woocommerce_output_related_products() {
woocommerce_related_products(4,4); // Display 3 products in rows of 3
}

?>