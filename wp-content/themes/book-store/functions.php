<?php
/**
 * book-store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package book-store
 */

 include_once('simple_html_dom.php');

if ( ! function_exists( 'book_store_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function book_store_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on book-store, use a find and replace
		 * to change 'book-store' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'book-store', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'book-store' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'book_store_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'book_store_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function book_store_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPsrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'book_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'book_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function book_store_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'book-store' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'book-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'book_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function book_store_scripts() {
	wp_enqueue_style( 'bootstrap-style',  get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style( 'book-store-style', get_stylesheet_uri() );

	wp_enqueue_script( 'book-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'book-store-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'book-store-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
	wp_enqueue_script( 'book-store-jquery', get_template_directory_uri() . '/js/jquery-3.3.1.slim.min.js' );
	wp_enqueue_script('book-store-popper', get_template_directory_uri() . '/js/popper.min.js');



}
add_action( 'wp_enqueue_scripts', 'book_store_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function add_image_class($class){
    $class .= ' img-fluid';
    return $class;
}
add_filter('get_image_tag_class','add_image_class');

add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
  
    return __( 'Купи', 'woocommerce' );
  
}

add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +
  
function woo_custom_product_add_to_cart_text() {
  
	return __( 'Купи', 'woocommerce' );
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Опис' );		// Rename the description tab
	$tabs['reviews']['title'] = __( 'Оцени' );				// Rename the reviews tab
	$tabs['additional_information']['title'] = __( 'Дополнителни информации' );	// Rename the additional information tab

	return $tabs;

}


/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['home'] = 'Почетна';
	return $defaults;
}


function lv2_add_bootstrap_input_classes( $args, $key, $value = null ) {
	/* This is not meant to be here, but it serves as a reference
	of what is possible to be changed.
	$defaults = array(
		'type'			  => 'text',
		'label'			 => '',
		'description'	   => '',
		'placeholder'	   => '',
		'maxlength'		 => false,
		'required'		  => false,
		'id'				=> $key,
		'class'			 => array(),
		'label_class'	   => array(),
		'input_class'	   => array(),
		'return'			=> false,
		'options'		   => array(),
		'custom_attributes' => array(),
		'validate'		  => array(),
		'default'		   => '',
	); */
	// Start field type switch case
	switch ( $args['type'] ) {
		case "select" :  /* Targets all select input type elements, except the country and state select input types */
			$args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
			$args['input_class'] = array('form-control', 'input-lg'); // Add a class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('control-label');
			$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
		break;
		case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group single-country';
			$args['label_class'] = array('control-label');
		break;
		case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group'; // Add class to the field's html element wrapper
			$args['input_class'] = array('form-control', 'input-lg'); // add class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('control-label');
			$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
		break;
		case "password" :
		case "text" :
		case "email" :
		case "tel" :
		case "number" :
			$args['class'][] = 'form-group';
			//$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;
		case 'textarea' :
			$args['input_class'] = array('form-control', 'input-lg', 'col-12');
			$args['label_class'] = array('control-label','col-12');
		break;
		case 'checkbox' :
		break;
		case 'radio' :
		break;
		default :
			$args['class'][] = 'form-group';
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;
	}
	return $args;
}
add_filter('woocommerce_form_field_args','lv2_add_bootstrap_input_classes',10,3);

/**
 * Add Cart icon and count to header if WC is active
 */
function my_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
        $count = WC()->cart->cart_contents_count;
        ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
        if ( $count > 0 ) {
            ?>
            <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
            <?php
        }
                ?></a><?php
    }
 
}
add_action( 'your_theme_header_top', 'my_wc_cart_count' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

// remove width & height attributes from images
//
function remove_img_attr ($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
 
add_filter( 'post_thumbnail_html', 'remove_img_attr' );
