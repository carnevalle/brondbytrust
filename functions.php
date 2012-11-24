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
    wp_register_style( 'royalslider', get_stylesheet_directory_uri() . '/css/royalslider.css', array(), '', 'all' );
    wp_register_style( 'royalslider-default', get_stylesheet_directory_uri() . '/css/rs-default-inverted.css', array(), '', 'all' );

    wp_register_script( 'twitter-bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
    wp_register_script( 'royalslider-js', get_stylesheet_directory_uri() . '/js/jquery.royalslider.min.js', array( 'jquery' ), '', true );

    wp_enqueue_style( 'twitter-bootstrap' );
    wp_enqueue_style( 'twitter-bootstrap-responsive' );
    wp_enqueue_style('brondbytrust-stylesheet');
    //wp_enqueue_style('royalslider');
    //wp_enqueue_style('royalslider-default');

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'twitter-bootstrap-js' );
    //wp_enqueue_script( 'royalslider-js' );
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

/**
 * Register our sidebars and widgetized areas.
 *
 */
function brondbytrust_widgets_init() {

    register_sidebar( array(
        'name' => 'footer_left_widget',
        'id' => 'footer_left_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => 'footer_center_widget',
        'id' => 'footer_center_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => 'footer_right_widget',
        'id' => 'footer_right_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => 'sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="text-box">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'brondbytrust_widgets_init' );


/*
Function to get image for Facebook Open Graph
http://designpx.com/tutorials/facebook-open-graph-protocol-meta-tags/

*/
function get_fbimg() {
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );
        if ( has_post_thumbnail($post->ID) ) {
        $fbimage = $src[0];
        } else {
            global $post, $posts;
            $fbimage = '';
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
            $post->post_content, $matches);
            $fbimage = $matches [1] [0];
        }
        if(empty($fbimage)) {
        $fbimage = "http://brondbytrust.dev/wp-content/themes/brondbytrust/img/bstlogo-150px.png";
        }
    return $fbimage;
}


/*
    Here begins woocommerce hacking!
*/

// Remove reviews on WooCommerce products
remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30);
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 30);

// Remove ordering of products
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
//add_action( 'woocommerce_before_main_content', 'woocommerce_catalog_ordering', 20 );

// We move related products to a different hook
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// We move the price to a different hook
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
//add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 10 );

//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );

add_image_size( 'shop_fanaktie', 200, 200, true );
add_image_size( 'post-image', 770, 9999, true );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    ob_start();
    
    ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><i class="icon-shopping-cart icon-white"></i> <?php echo sprintf(_n('%d vare', '%d varer', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
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

// Hook in
/*
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {

     $fields['order']['order_bstmember'] = array(
        'label'     => __('BST Medlemsnummer', 'woocommerce'),
        'placeholder'   => _x('Indtast medlemsnummer til BST', 'placeholder', 'woocommerce'),
        'required'  => false,
        'class'     => array('form-row-wide'),
        'clear'     => true
     );
 
     return $fields;
}
*/

/*

    This is a custom walker for the Twitter Bootstrap Nav Menu

*/

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

    
    function start_lvl( &$output, $depth ) {
        
        //In a child UL, add the 'dropdown-menu' class
        $indent = str_repeat( "\t", $depth );
        $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";
        
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        //Add class and attribute to LI element that contains a submenu UL.
        if ($args->has_children){
            $classes[]      = 'dropdown';
            $li_attributes .= 'data-dropdown="dropdown"';
        }
        $classes[] = 'menu-item-' . $item->ID;
        //If we are on the current page, add the active class to that menu item.
        $classes[] = ($item->current) ? 'active' : '';

        //Make sure you still add all of the WordPress classes.
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        //Add attributes to link element.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ($args->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : ''; 

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ($args->has_children) ? ' <b class="caret"></b> ' : ''; 
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    //Overwrite display_element function to add has_children attribute. Not needed in >= Wordpress 3.4
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        
        if ( !$element )
            return;
        
        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_array( $args[0] ) ) 
            $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
        else if ( is_object( $args[0] ) ) 
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

            foreach( $children_elements[ $id ] as $child ){

                if ( !isset($newlevel) ) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge( array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
                unset( $children_elements[ $id ] );
        }

        if ( isset($newlevel) && $newlevel ){
            //end the child delimiter
            $cb_args = array_merge( array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
        
    }
    
}

?>