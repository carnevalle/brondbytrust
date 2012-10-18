<?php

// we're firing all out initial functions at the start
add_action('after_setup_theme','brondbytrust_init', 15);

function brondbytrust_init() {

    add_action('wp_enqueue_scripts', 'brondbytrust_scripts_and_styles', 999);

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

add_image_size( 'shop_fanaktie', 250, 200, true );
/*
        $shop_thumbnail_crop    = (get_option('woocommerce_thumbnail_image_crop')==1) ? true : false;
        $shop_catalog_crop      = (get_option('woocommerce_catalog_image_crop')==1) ? true : false;
        $shop_single_crop       = (get_option('woocommerce_single_image_crop')==1) ? true : false;

        add_image_size( 'shop_thumbnail', $this->get_image_size('shop_thumbnail_image_width'), $this->get_image_size('shop_thumbnail_image_height'), $shop_thumbnail_crop );
        add_image_size( 'shop_catalog', $this->get_image_size('shop_catalog_image_width'), $this->get_image_size('shop_catalog_image_height'), $shop_catalog_crop );
        add_image_size( 'shop_single', $this->get_image_size('shop_single_image_width'), $this->get_image_size('shop_single_image_height'), $shop_single_crop );
*/
?>