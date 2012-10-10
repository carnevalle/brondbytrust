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

    /*
    // modernizr (without media query polyfill)
    wp_register_script( 'bones-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

    // register main stylesheet
    wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

    // ie-only style sheet
    wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );


    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    //adding scripts file in the footer
    wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
    wp_enqueue_script( 'bones-modernizr' );
    wp_enqueue_style( 'bones-stylesheet' );
    wp_enqueue_style('bones-ie-only');
    /*

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bones-js' );
    */
}

?>