<?php
/**
 * twelveoaksdesserts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twelveoaksdesserts
 */
if ( ! function_exists( 'twelveoaksdesserts_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twelveoaksdesserts_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twelveoaksdesserts, use a find and replace
	 * to change 'twelveoaksdesserts' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twelveoaksdesserts', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
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
	register_nav_menus(
		array( 
			// 'main-menu' => esc_html__( 'Main Menu', 'twelveoaksdesserts' ),
			'left-main-menu' => esc_html__( 'Left Main Menu', 'twelveoaksdesserts' ),
			'right-main-menu' => esc_html__( 'Right Main Menu', 'twelveoaksdesserts' ),
			'account-dropdown' => esc_html__( 'Account Dropdown', 'twelveoaksdesserts' )
		));
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
	add_theme_support( 'custom-background', apply_filters( 'twelveoaksdesserts_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'twelveoaksdesserts_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twelveoaksdesserts_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twelveoaksdesserts_content_width', 640 );
}
add_action( 'after_setup_theme', 'twelveoaksdesserts_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twelveoaksdesserts_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'twelveoaksdesserts' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'twelveoaksdesserts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Cart Dropdown', 'twelveoaks' ),
		'id'            => 'cart-dropdown',
		'description'   => esc_html__( 'Add widgets here.', 'twelveoaksdesserts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Account Dropdown', 'twelveoaksdesserts' ),
		'id'            => 'account-dropdown',
		'description'   => esc_html__( 'Add widgets here.', 'twelveoaks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twelveoaksdesserts_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function twelveoaksdesserts_scripts() {
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'jquery-maskinput', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js');
	wp_enqueue_script( 'jquery-flexslider', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js');
	    // wp_enqueue_script('jquery-ui-datepicker');
	    // wp_enqueue_script( 'jquery-ui-core' );

	    // wp_enqueue_script( 'jquery-ui-datepicker' );

    wp_enqueue_script( 'jquery-ui-datepicker' );


	gravity_form_enqueue_scripts(4, true);
	wp_enqueue_script('ajax-load-more');  
	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAXulXd0GLV7y0soyn1QNAuN_cWEkt-Py8');   
	wp_enqueue_script( 'twelveoaksdesserts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'twelveoaksdesserts-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'font-awesome-pro', 'https://pro.fontawesome.com/releases/v5.6.3/css/all.css' );
	wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/js/slick.min.js', array("jquery"));
	wp_enqueue_style( 'animations', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_script( 'instafeed', get_template_directory_uri() . '/js/instafeed.min.js' );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array("jquery"));
	wp_enqueue_script( 'touchswipe', get_template_directory_uri() . '/js/jquery.detect_swipe.min.js' );
	wp_enqueue_script( 'mousewheel-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js' );
	wp_enqueue_script( 'tilt-js', 'https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js' );
	wp_enqueue_style( 'lightgallery-css', get_template_directory_uri() . '/css/lightgallery.css' );
	wp_enqueue_script( 'lightgallery-js', get_template_directory_uri() . '/js/lightgallery.min.js' );
	wp_enqueue_script( 'lg-thumbnail', get_template_directory_uri() . '/js/lg-thumbnail.min.js' );
	wp_enqueue_script( 'lg-fullscreen', get_template_directory_uri() . '/js/lg-fullscreen.min.js' );
	wp_enqueue_script( 'smoothstate-js', get_template_directory_uri() . '/js/jquery.smoothState.js');
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'wc-single-product' ) );
	wp_localize_script( 'script-js', 'scriptjs', array( 'sortby' => get_field('sort_by') ) );
	wp_enqueue_style( 'twelveoaksdesserts-style', get_stylesheet_uri() );



}
add_action( 'wp_enqueue_scripts', 'twelveoaksdesserts_scripts' );




// add_action( 'wp_enqueue_scripts', 'prefix_disable_frontend_enqueue_scripts', 20 );
// function prefix_disable_frontend_enqueue_scripts() {
// wp_dequeue_script( 'jquery-ui-datepicker-local' );
// wp_dequeue_script( 'views-pagination-script' );
// wp_dequeue_style( 'wptoolset-field-datepicker' );
// wp_dequeue_style( 'views-pagination-style' );
// }



/**
 * Add custom admin styles
 */
function load_custom_admin_styles() {
	wp_register_style( 'custom_dashicons', get_template_directory_uri() . '/css/dashicons_style.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_dashicons' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_admin_styles' );
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
/**
 * ACF Options Pages
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'menu_slug' 	=> 'header',
		'capability' 	=> 'edit_posts', 
		'icon_url' => 'dashicons-upload',
		'position' => 2
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer',
		'capability' 	=> 'edit_posts', 
		'icon_url' => 'dashicons-download',
		'position' => 3
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Cart & Checkout',
		'menu_title'	=> 'Cart & Checkout',
		'menu_slug' 	=> 'cartcheckout',
		'capability' 	=> 'edit_posts', 
		'icon_url' => 'dashicons-cart',
		'position' => 4
	));
	acf_add_options_page(array(
		'page_title' 	=> 'All Posts Page',
		'menu_title'	=> 'All Posts Page',
		'parent_slug'    => 'edit.php',
		'menu_slug' 	=> 'all-posts-page',
		'capability' 	=> 'edit_posts', 
		'icon_url' => 'dashicons-admin-customizer',
		'position' => 4
	));
}
/**
 * Add arrows to menu items
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/add-arrows-to-menu-items/
 * 
 * @param string $item_output, HTML output for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */
function be_arrows_in_menus( $item_output, $item, $depth, $args ) {
	if( in_array( 'menu-item-has-children', $item->classes ) ) {
		$arrow = 0 == $depth ? '<i class="fa fa-caret-down" aria-hidden="true"></i>' : '<i class="fa fa-caret-right" aria-hidden="true"></i>';
		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );
// Remove Woocommerce breadcrumbs
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
function so_38878702_remove_hook(){
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
}
add_action( 'woocommerce_before_shop_loop', 'so_38878702_remove_hook', 1 );
// Add Woocommerce theme support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
// First create a field group assigned to the Product custom post type
// Make a repeater field with sub-fields "Title" (text) and "Content" (WYSIWYG)
add_filter( 'woocommerce_product_tabs', 'custom_tabs' );
function custom_tabs( $tabs ) {
	global $post;
	$priority = 100;
	while ( has_sub_field( 'tabs', $post->ID ) ) {
		$title = get_sub_field( 'title' );
		$content = get_sub_field( 'content' );
		$id = sanitize_title( $title );
		// $id = str_replace( '-', '_', $id );
		$tabs[ $id ] = array(
			'title' 	=> $title,
			'priority' 	=> $priority++,
			'callback' 	=> 'custom_tab_content'
		);
	}
	return $tabs;
}
function custom_tab_content( $id ) {
	global $post;
	while ( has_sub_field( 'tabs', $post->ID ) ) {
		$title = get_sub_field( 'title' );
		$this_id = sanitize_title( $title );
		$this_ = str_replace( '-', '_', $this_ );
		if ( $id == $this_id ) {
			the_sub_field( 'content' );
		}
	}
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}
// Remove button on shop archive pages
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
/**
 * Returns product price based on sales.
 * 
 * @return string
 */
function the_dramatist_price_show() {
	global $product;
	if( $product->is_on_sale() ) {
		return $product->get_sale_price();
	}
	return $product->get_regular_price();
}
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function woo_related_products_limit() {
	global $product;
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}
// Remove SKU from product pages
add_filter( 'wc_product_sku_enabled', '__return_false' );
// Remove product category from product pages
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
/**
 * Expand Shortcode
 */ 
// Add Shortcode
function expand_shortcode( $atts , $content = null ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'content' => '',
		),
		$atts,
		'expand'
	);
	// Return image HTML code
	return '<div class="expander-container">
	<div class="expand-item">
	<div class="expand-show">
	' . $atts['content'] . '
	</div>
	<div class="expand-hide">
	<p>
	' . $content . '
	</p>
	</div>
	</div>
	</div>';
}
add_shortcode( 'expand', 'expand_shortcode' );
/**
 * Lightbox
 */ 
add_action( 'woocommerce_single_product_summary', 'charting', 20 );
function charting() {
    if( !empty( get_field('short_description') ) ) { // if your custom field is not empty…
    	echo '<div class="short_description"><p>' . get_field('short_description') . '</p></div>';
    }
    return;
}
add_action( 'woocommerce_single_product_summary', 'lightdesc', 25 );
function lightdesc() {
	?>
	<div class="single-product-modal">
		<?php
		if(get_field( 'lightbox')): ; ?>
			<?php $i=0; while(has_sub_field( 'lightbox')):; ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="zoom-wrap"><a class="modalbtn" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>"><?php the_sub_field('lightbox_title'); ?></a></div>
					<!-- Modal -->
					<div id="myModal-<?php echo $i;?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-body">
									<img class="img-responsive" src="<?php the_sub_field('sub_field_image'); ?>" alt=""/>
									<p><?php the_sub_field('lightbox_content'); ?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>                
					<?php the_sub_field('class_text'); ?>
				</div>
			</div>
			<?php $i++; endwhile; ?>
		<?php endif;
		?>
	</div>
	<?php
}
// Custom editor styles
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px 40px 44px 48px 54px 60px 72px 80px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );
add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );
function wpex_mce_google_fonts_array( $initArray ) {
    // $initArray['font_formats'] = 'Montserrat=Montserrat;Proxima Nova=proxima-nova,sans-serif;';
	$theme_advanced_fonts = 'Montserrat=Montserrat, sans-serif;' . 'Proxima Nova=proxima-nova,sans-serif;' . 'Halo Handletter=HaloHandletter;';
	$initArray['font_formats'] = $theme_advanced_fonts;
	return $initArray;
}

// ACF Product Image and Gallery images
function my_acf_save_post($post_id) {
	$repeater = 'other_images';
	$subfield = 'image';
	// using get_post_meta because that way we're sure to get the image ID
	$count = intval(get_post_meta($post_id, $repeater, true));
	$images = array();
	for ($i=0; $i<$count; $i++) {
		$field = $repeater.'_'.$i.'_'.$subfield;
		$images[] = intval(get_post_meta($post_id, $field, true));
	}
	if (count($images)) {
		$images = implode(',', $images); // convert to comma separated list
	} else {
		$images = '';
	}
	update_post_meta($post_id, '_product_image_gallery', $images);
}
add_action('acf/save_post', 'my_acf_save_post', 20); // priority of 20 so it runs after ACF
// ACF Product Image and Gallery images
// Remove Product Image from sidebar
function acf_set_featured_image( $value, $post_id, $field ){
	update_post_meta($post_id, '_thumbnail_id', $value);
	return $value;
}
// acf/update_value/name={$field_name} – filter for a specific field based on it's name
add_filter('acf/update_value/name=pfimage', 'acf_set_featured_image', 10, 3);
// hide existing featured image
add_action('admin_head', 'my_admincss');
function my_admincss() {
	$url = get_stylesheet_directory_uri();
	echo '<style>
	@font-face {
		font-family: "HaloHandletter";
		font-style: normal;
		font-weight: normal;
		src: url("'.$url.'/HaloHandletter.woff") format("woff");
		letter-spacing: 2px;
		unicode-range: U+20-21, U+3F, U+41-5A, U+61-7A;
	}
	</style>';
}
// Remove Product Image from sidebar
// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

//Redirect Author page to homepage -- keeps bots out!
function author_page_redirect() {
	if ( is_author() ) {
		wp_redirect( home_url() );
	}
}
add_action( 'template_redirect', 'author_page_redirect' );
// Change WooCommerce to Store -- Change weDocs to Documentation
function rename_header_to_logo( $translated, $original, $domain ) {
	$strings = array(
		'WooCommerce' => 'Store',
		'weDocs' => 'Documentation',
	);
	if ( isset( $strings[$original] ) && is_admin() ) {
		$translations = get_translations_for_domain( $domain );
		$translated = $translations->translate( $strings[$original] );
	}
	return $translated;
}
add_filter( 'gettext', 'rename_header_to_logo', 10, 3 );
function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'WooCommerce' :
		$translated_text = __( 'Store', 'woocommerce' );
		break;
		case 'weDocs' :
		$translated_text = __( 'Documentation', 'wedocs' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

function edit_admin_menus() {
	global $menu;
    $menu[5][0] = 'Blog Posts'; // Change Posts to Blog Posts
}
add_action( 'admin_menu', 'edit_admin_menus' );
// Remove dashboard widgets
function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
// Remove Visit site from dashboard dropdown
function remove_admin_bar_links() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    // $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    $wp_admin_bar->remove_menu('view-store'); // Remove the view store link
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('themes');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_menu('menus');
    $wp_admin_bar->remove_menu('dashboard');
    $wp_admin_bar->remove_menu('simple-history-view-history');
       // $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('gform-forms');          // Remove the updates link
    $wp_admin_bar->remove_menu('wpseo-menu');          // Remove the updates link
    $wp_admin_bar->remove_menu('gform-forms');          // Remove the updates link
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
// Remove Wordpress logo from dashboard
add_action('admin_bar_menu', 'remove_wp_logo', 999);
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node('wp-logo');
// $wp_admin_bar->remove_node('edit');
        $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    }

    add_filter( 'gettext', 'upload_wp_text_convert', 20, 3 );
    function upload_wp_text_convert( $translated_text, $text, $domain ) {
    	switch ( $translated_text ) {
    		case 'Want a custom color? Let us know here!:' :
    		$translated_text = __( 'Check out these related products', 'woocommerce' );
    		break;
    	}
    	return $translated_text;
    } 

// rename the "Have a Coupon?" message on the checkout page
    function woocommerce_rename_coupon_message_on_checkout() {
    	return 'Have a Promo Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
    }
    add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
// rename the coupon field on the checkout page
    function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
    	if ( is_admin() || 'woocommerce' !== $text_domain ) {
    		return $translated_text;
    	}
    	if ( 'Coupon code' === $text ) {
    		$translated_text = 'Promo Code';
    	} elseif ( 'Apply Coupon' === $text ) {
    		$translated_text = 'Apply Promo Code';
    	}
    	return $translated_text;
    }
    add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );

// Remove all update notifications for wordpress & plugins for all users except the first one (garyt)
    function custom_admin_css() {
    	global $current_user;
    	get_currentuserinfo();
    	if ($current_user->ID != 1) {
    		echo '<style type="text/css">.plugin-count, .update-count {display: none!important; }</style>';
    	}
    }
    add_action('admin_head','custom_admin_css');
    add_action('admin_init', 'cnk_lock_panels');
    function cnk_lock_panels() {
    	global $submenu, $userdata;
    	get_currentuserinfo();
    	if ($userdata->ID != 1) {
    		unset($submenu['index.php'][10]);
    	}
    }
// Change login image
    function custom_loginlogo() {
    	echo '<style type="text/css">
    	h1 a {background-image: url('.get_bloginfo('template_directory').'/images/Logo-with-Tagline.jpg) !important;
    }
    .login h1 a{
    	-webkit-background-size: cover !important;
    	background-size: cover !important;
    	height: 185px !important;
    	width: 200px !important;
    }
    body.login {
    	background-color: #FFFFFF;
    }
    .login label {
    	font-size: 12px;
    	color: #555555;
    }
    .login input[type="text"]{
    	background-color: #ffffff;
    	border-color:#dddddd;
    	-webkit-border-radius: 4px;
    }
    .login input[type="password"]{
    	background-color: #ffffff;
    	border-color:#dddddd;
    	-webkit-border-radius: 4px;
    }
    .login .button-primary {
    	width: 120px;
    	float:right;
    	background-color:#17a8e3 !important;
    	background: -webkit-gradient(linear, left top, left bottom, from(#17a8e3), to(#17a8e3));
    	background: -webkit-linear-gradient(top, #17a8e3, #17a8e3);
    	background: -moz-linear-gradient(top, #17a8e3, #17a8e3);
    	background: -ms-linear-gradient(top, #17a8e3, #17a8e3);
    	background: -o-linear-gradient(top, #17a8e3, #17a8e3);
    	background-image: -ms-linear-gradient(top, #17a8e3 0%, #17a8e3 100%);
    	color: #ffffff;
    	-webkit-border-radius: 4px;
    	border: 1px solid #0d9ed9;
    }
    .login .button-primary:hover {
    	background-color:#17a8e3 !important;
    	background: -webkit-gradient(linear, left top, left bottom, from(#17a8e3), to(#0d9ed9 ));
    	background: -webkit-linear-gradient(top, #17a8e3, #0d9ed9 );
    	background: -moz-linear-gradient(top, #17a8e3, #0d9ed9 );
    	background: -ms-linear-gradient(top, #17a8e3, #0d9ed9 );
    	background: -o-linear-gradient(top, #17a8e3, #0d9ed9 );
    	background-image: -ms-linear-gradient(top, #0b436e 0%, #0d9ed9 100%);
    	color: #fff;
    	-webkit-border-radius: 4px;
    	border: 1px solid #0d9ed9;
    }
    .login .button-primary:active {
    	background-color:#17a8e3 !important;
    	background: -webkit-gradient(linear, left top, left bottom, from(#0d9ed9), to(#17a8e3));
    	background: -webkit-linear-gradient(top, #0d9ed9, #17a8e3);
    	background: -moz-linear-gradient(top, #0d9ed9, #17a8e3);
    	background: -ms-linear-gradient(top, #0d9ed9, #17a8e3);
    	background: -o-linear-gradient(top, #0d9ed9, #17a8e3);
    	background-image: -ms-linear-gradient(top, #0d9ed9 0%, #17a8e3 100%);
    	color: #fff;
    	-webkit-border-radius: 4px;
    	border: 1px solid #0d9ed9;
    }
    p#backtoblog {
    	display: none;
    }
    </style>';
}
add_action('login_head', 'custom_loginlogo');

//Remove WooCommerce Short Description
function remove_short_description() {
	remove_meta_box( 'postexcerpt', 'product', 'normal');
}
add_action('add_meta_boxes', 'remove_short_description', 999);

// Cheapest Price
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
    // Main Price
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	$price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
    // // Sale Price
    // $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    // sort( $prices );
    // $saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
    // if ( $price !== $saleprice ) {
    //     $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
    // }
	return $price;
}

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
	$cols = 12;
	return $cols;
}
//support page revisions
add_filter( 'woocommerce_register_post_type_product', 'wpse_modify_product_post_type' );
function wpse_modify_product_post_type( $args ) {
	$args['supports'][] = 'revisions';
	return $args;
}

//change variations from comma seperated - show variations correctly in cart
add_filter( 'woocommerce_product_variation_title_include_attributes', 'custom_product_variation_title', 10, 2 );
function custom_product_variation_title($should_include_attributes, $product){
	$should_include_attributes = false;
	return $should_include_attributes;
}

add_action("init", function () {
    // removing the woocommerce hook
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
});
// add a new fonction to the hook
add_action("woocommerce_shop_loop_item_title", function () {
	echo '<h3>' . get_the_title() . '</h3>';
});

add_action( 'wp_footer', 'x_hide_cart' );
function x_hide_cart(){
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
		?>
		<style type="text/css">.hidden_cart{opacity: 0;}</style>
		<?php
	}
}
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
	<?php
	$fragments['span.cart-count'] = ob_get_clean();
	return $fragments;
}


add_action( 'woocommerce_single_product_summary', 'custom', 30 );
function custom() {
	global $post;
	$args = array( 'taxonomy' => 'product_cat',);
	$terms = wp_get_post_terms($post->ID,'product_cat', $args);
	$count = count($terms); 
	if ($count > 0) {
		foreach ($terms as $term) {
			if( have_rows('lightbox', $term) ): ?>
				<div class="single-product-modal">
					<?php $i=0; while( have_rows('lightbox', $term) ): the_row(); ?>
					<div class="row">
						<div class="zoom-wrap">
							<a class="modalbtn" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>"><?php the_sub_field('lightbox_title'); ?></a>
						</div>
						<div id="myModal-<?php echo $i;?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-body">
										<p><?php the_sub_field('lightbox_content'); ?></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>  
					</div>
					<?php $i++; endwhile; ?>
				</div>
			<?php endif;
		}
	}
}

/**
* Dequeue jQuery Migrate script in WordPress.
*/
function isa_remove_jquery_migrate( &$scripts) {
	if(!is_admin()) {
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
	}
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );

add_action('get_header', 'my_filter_head');
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
// REMOVES THE ADMIN BAR
add_filter('show_admin_bar', '__return_false');

// DISABLES COMMENTS ON ATTACHMENT PAGES (IMAGES, ETC.)
// FIXES SPAM COMMENTS ON CUPCAKES IMAGES
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

// CHANGE RELATED PRODUCTS TEXT
function related_products_text( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Related products' :
		$translated_text = __( 'You Might Also Like These...', 'woocommerce' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'related_products_text', 20, 3 );
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
function iconic_cart_count_fragments( $fragments ) {
	$fragments['span.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}

add_action( 'wp_enqueue_scripts', 'gallery_scripts', 20 );
function gallery_scripts() {
	if ( !is_product()) {
		if ( current_theme_supports( 'wc-product-gallery-zoom' ) ) { 
			wp_enqueue_script( 'zoom' );
		}
		if ( current_theme_supports( 'wc-product-gallery-slider' ) ) {
			wp_enqueue_script( 'flexslider' );
			wp_enqueue_script( 'tm-final-price-js', plugins_url() . '/woocommerce-tm-final-price/js/tm-final-price.js', array('jquery') );
			wp_enqueue_script( 'tm-final-price' );
		}
		if ( current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
			wp_enqueue_script( 'photoswipe-ui-default' );
			wp_enqueue_style( 'photoswipe-default-skin' );
			add_action( 'wp_footer', 'woocommerce_photoswipe' );
		}
		wp_enqueue_script( 'wc-single-product' );
		add_action('wp_footer', 'wp_enqueue_scripts', 5);
	}
}
/**
 * Move jQuery to the footer. 
 */
function wpse_173601_enqueue_scripts() {
	wp_scripts()->add_data( 'jquery', 'group', 1 );
	wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'wpse_173601_enqueue_scripts' );
function pwcc_live_reload_js2() {
	?>
	<!-- <script>document.write('<script src="/wp-content/plugins/woocommerce-tm-final-price/js/tm-final-price.js?ver=1.4.5"></' + 'script>')</script> -->
	<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
	<script type="text/template" id="tmpl-variation-template">
		<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
		<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
		<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
	</script>
	<script type="text/template" id="tmpl-unavailable-variation-template">
		<p>Sorry, this product is unavailable. Please choose a different combination.</p>
	</script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var tm_final_price_js = {"extra_fee":"0","i18n_final_total":"Final total:","currency_format_num_decimals":"2","currency_format_symbol":"$","currency_format_decimal_sep":".","currency_format_thousand_sep":",","currency_format":"%s%v "};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce-tm-final-price/js/tm-final-price.js?ver=1.4.5'></script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var wc_add_to_cart_params = {"ajax_url":"\/12oaksdesserts\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/12oaksdesserts\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/localhost\/12oaksdesserts\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.4.0'></script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/zoom/jquery.zoom.min.js?ver=1.7.21'></script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/flexslider/jquery.flexslider.min.js?ver=2.7.0'></script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe.min.js?ver=4.1.1'></script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min.js?ver=4.1.1'></script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var woocommerce_params = {"ajax_url":"\/12oaksdesserts\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/12oaksdesserts\/?wc-ajax=%%endpoint%%"};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.4.0'></script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var wc_cart_fragments_params = {"ajax_url":"\/12oaksdesserts\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/12oaksdesserts\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_f80a86b0b4e89364a8dda9d4f406e377","fragment_name":"wc_fragments_f80a86b0b4e89364a8dda9d4f406e377"};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.4.0'></script>
	<script type='text/javascript' src='/wp-content/themes/twelveoaksdesserts/js/navigation.js?ver=20151215'></script>
	<script type='text/javascript' src='/wp-content/themes/twelveoaksdesserts/js/skip-link-focus-fix.js?ver=20151215'></script>
	<script type='text/javascript' src='/wp-includes/js/comment-reply.min.js?ver=4.9.6'></script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var wc_gravityforms_params = {"currency_format_num_decimals":"2","currency_format_symbol":"$","currency_format_decimal_sep":".","currency_format_thousand_sep":",","currency_format":"%s%v ","prices":{"47":42,"1708":42,"1709":42,"52":42,"53":42,"54":42,"55":42,"56":42,"57":42,"58":42,"59":42,"60":42,"61":42,"62":42,"63":42,"64":42,"65":42,"66":42,"67":42,"68":42,"69":42,"70":42,"71":42},"price_suffix":{"47":""},"use_ajax":{"47":false}};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce-gravityforms-product-addons/assets/js/gravityforms-product-addons.js?ver=3.2.4'></script>
	<script type='text/javascript' src='/wp-includes/js/wp-embed.min.js?ver=4.9.6'></script>
	<script type='text/javascript' src='/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var _wpUtilSettings = {"ajax":{"url":"\/12oaksdesserts\/wp-admin\/admin-ajax.php"}};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-includes/js/wp-util.min.js?ver=4.9.6'></script>
	<script type='text/javascript'>
		/* <![CDATA[ */
		var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/12oaksdesserts\/?wc-ajax=%%endpoint%%","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
		/* ]]> */
	</script>
	<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min.js?ver=3.4.0'></script>
	<script type='text/javascript' src='/wp-content/plugins/gravityforms/js/placeholders.jquery.min.js?ver=2.3.2'></script>
	<?php
}
add_action('wp_footer', 'pwcc_live_reload_js2');

/**
 * @snippet       Disable Free Shipping if Cart has Shipping Class (WooCommerce 2.6+)
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=19960
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.2
 */
add_filter( 'woocommerce_package_rates', 'businessbloomer_hide_free_shipping_for_shipping_class', 10, 2 );
function businessbloomer_hide_free_shipping_for_shipping_class( $rates, $package ) {
$shipping_class_target = 63; // shipping class ID (to find it, see screenshot below)
$in_cart = false;
foreach( WC()->cart->cart_contents as $key => $values ) {
	if( $values[ 'data' ]->get_shipping_class_id() == $shipping_class_target ) {
		$in_cart = true;
		break;
	} 
}
if( $in_cart ) {
   unset( $rates['flat_rate:1'] );
}
return $rates;
}
// add_filter( 'wp_footer','custom_product_title_script' );
function custom_product_title_script(){
    //if( ! is_checkout() || is_page('cart') ) return; // only on checkout
	if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) return;
	$method_id = "'63'";
    // Find the Shipping Method ID for the Shipping Method label name 'Delivery price on request'
	foreach( WC()->session->get('shipping_for_package_0')['rates'] as $rate_key => $rate ){
		if( 'Shipping' == $rate->label ){
			$method_id = $rate_key;
			break;
		}
		if( 'Local pickup' == $rate->label ){
			$method_id = $rate_key;
			break;
		}
		if( 'Local Delivery' == $rate->label ){
			$method_id = $rate_key;
			break;
		}
	}
	?>
	<script type="text/javascript">
		(function($){
                // variables initialization
                var a = 'input[name^="shipping_method[0]"]',
                    // b = a+':checked',
                    b = a,
                    c = 'exclude-shipping',
                    d = '<?php echo $method_id; ?>';
                    if( $(b).val() == d )
                    	$('body').addClass(c);
                    else
                    	$('body').removeClass(c);
                    $( 'form.checkout' ).on( 'change', a, function() {
                    	if( $(b).val() == d )
                    		$('body').addClass(c);
                    	else
                    		$('body').removeClass(c);
                    });
                })(jQuery);
            </script>
            <?php
        }

/**
 * @snippet       Disable Shipping Fields for Local Pickup
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=72660
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.0.7
 */
add_action( 'woocommerce_after_checkout_form', 'bbloomer_disable_shipping_local_pickup' );
function bbloomer_disable_shipping_local_pickup( $available_gateways ) {
	global $woocommerce;
// Part 1: Hide shipping based on the static choice @ Cart
// Note: "#customer_details .col-2" strictly depends on your theme
	$chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
	$chosen_shipping_no_ajax = $chosen_methods[0];
	if ( 0 === strpos( $chosen_shipping_no_ajax, 'local_pickup' ) ) {
		?>
		<script type="text/javascript">
            jQuery('#customer_details .col-2 .woocommerce-shipping-fields').fadeOut();
            jQuery('.iconic-wds-fields__title').addClass('deliverydetails');
            jQuery('.jckwds-delivery-date label').addClass('deliverydate');
            jQuery('.jckwds-delivery-date input').addClass('deliverydatepicker');
        </script>
        <?php
    } 
// Part 2: Hide shipping based on the dynamic choice @ Checkout
// Note: "#customer_details .col-2" strictly depends on your theme
    ?>
    <script type="text/javascript">
    	jQuery('form.checkout').on('change','input[name^="shipping_method"]',function() {
    		var val = jQuery( this ).val();
    		if (val.match("^local_pickup")) {
    			jQuery('#customer_details .col-2 .woocommerce-shipping-fields').fadeOut();
            jQuery('.iconic-wds-fields__title').addClass('deliverydetails');
            jQuery('.jckwds-delivery-date label').addClass('deliverydate');
            jQuery('.jckwds-delivery-date input').addClass('deliverydatepicker');
        } else {
        	jQuery('#customer_details .col-2 .woocommerce-shipping-fields').fadeIn();
            jQuery('.iconic-wds-fields__title').removeClass('deliverydetails');
            jQuery('.jckwds-delivery-date label').removeClass('deliverydate');
            jQuery('.jckwds-delivery-date input').removeClass('deliverydatepicker');
        }
    });
</script>
<?php
}
/**
 * @snippet       Disable Map for Shipping/Local Delivery - Show Map For Local Pickup
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=72660
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.0.7
 */
add_action( 'woocommerce_after_checkout_form', 'bbloomer_disable_shipping_local_pickup2' );
function bbloomer_disable_shipping_local_pickup2( $available_gateways ) {
	global $woocommerce;
// Part 1: Hide shipping based on the static choice @ Cart
// Note: "#customer_details .col-2" strictly depends on your theme
	$chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
	$chosen_shipping_no_ajax = $chosen_methods[0];
	if ( 0 === strpos( $chosen_shipping_no_ajax, 'flat_rate' ) ) {
		?>
		<script type="text/javascript">
        jQuery('.col-3').fadeOut();
    </script>
    <?php
} 
// Part 2: Hide shipping based on the dynamic choice @ Checkout
// Note: "#customer_details .col-2" strictly depends on your theme
?>
<script type="text/javascript">
	jQuery('form.checkout').on('change','input[name^="shipping_method"]',function() {
		var val = jQuery( this ).val();
		if (val.match("^flat_rate")) {
			jQuery('.col-3').fadeOut();
		} else {
			jQuery('.col-3').fadeIn();
		}
	});
</script>
<?php
}
add_action( 'woocommerce_widget_shopping_cart_buttons', function(){
    // Removing Buttons
	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
    // Adding customized Buttons
	add_action( 'woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_button_view_cart', 10 );
	add_action( 'woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_proceed_to_checkout', 20 );
}, 1 );
// Custom cart button
function custom_widget_shopping_cart_button_view_cart() {
	$original_link = wc_get_cart_url();
    $custom_link = home_url( '/cart/?id=1' ); // HERE replacing cart link
    echo '<a href="' . esc_url( $custom_link ) . '" class="button wc-forward">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
}
// Custom Checkout button
function custom_widget_shopping_cart_proceed_to_checkout() {
	$original_link = wc_get_checkout_url();
    $custom_link = home_url( '/checkout/' ); // HERE replacing checkout link
    echo '<a href="' . esc_url( $custom_link ) . '" class="button checkout wc-forward mini-cart-checkout-button no-smoothstate">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
}

             add_filter( 'woocommerce_widget_cart_is_hidden', 'always_show_cart', 40, 0 );
             function always_show_cart() {
             	return false;
             }
             add_filter ( 'wc_add_to_cart_message_html', 'wc_add_to_cart_message_html_filter', 10, 2 );
             function wc_add_to_cart_message_html_filter( $message, $products ) {
             	foreach( $products as $product_id => $quantity ){
       
             		$titles[] = get_the_title( $product_id );
             		$titles = array_filter( $titles );
             		$added_text = '<div class="addedtocarttext">' . sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) ) . '</div></div>';
             		$product_meta = get_post_meta($product_id);
             		$img = '<div class="addedtocartwrap"><div class="addedtocartimage">' . wp_get_attachment_image(($product_meta['_thumbnail_id'][0]), 'thumbnail') . '</div>';

                 $viewcart = '<div class="addedtocartbuttons"><div><a href="' . home_url( '/cart/?id=1' ) . '">View Cart</a></div>'; // HERE replacing cart link
                 $continueshopping = '<div class="close-button"><a href="#">Continue Shopping</a></div></div>';
                 $message   = sprintf( "$img" .  "$added_text" . "$viewcart" . "$continueshopping" );
             }
             return $message;
         }
         /* GammaFX: Preventing Hidden WooCommerce products from showing up in WordPress search results */
         if ( ! function_exists( 'gamma_search_query_fix' ) ){
         	function gamma_search_query_fix( $query = false ) {
         		if(!is_admin() && is_search()){
         			$query->set( 'meta_query', array(
         				'relation' => 'OR',
         				array(
         					'key' => '_visibility',
         					'value' => 'hidden',
         					'compare' => 'NOT EXISTS',
         				),
         				array(
         					'key' => '_visibility',
         					'value' => 'hidden',
         					'compare' => '!=',
         				),
         			));
         		}
         	}
         }
         add_action( 'pre_get_posts', 'gamma_search_query_fix' );
         function wpdocs_excerpt_more( $more ) {
         	return '...<a href="'.get_the_permalink().'" rel="nofollow"> Read more</a>';
         }
         add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
         function wpbeginner_numeric_posts_nav() {
         	if( is_singular() )
         		return;
         	global $wp_query;
         	/** Stop execution if there's only 1 page */
         	if( $wp_query->max_num_pages <= 1 )
         		return;
         	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
         	$max   = intval( $wp_query->max_num_pages );
         	/** Add current page to the array */
         	if ( $paged >= 1 )
         		$links[] = $paged;
         	/** Add the pages around the current page to the array */
         	if ( $paged >= 3 ) {
         		$links[] = $paged - 1;
         		$links[] = $paged - 2;
         	}
         	if ( ( $paged + 2 ) <= $max ) {
         		$links[] = $paged + 2;
         		$links[] = $paged + 1;
         	}
         	echo '<div class="navigation"><ul>' . "\n";
         	/** Previous Post Link */
         	if ( get_previous_posts_link() )
         		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
         	/** Link to first page, plus ellipses if necessary */
         	if ( ! in_array( 1, $links ) ) {
         		$class = 1 == $paged ? ' class="active"' : '';
         		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
         		if ( ! in_array( 2, $links ) )
         			echo '<li>…</li>';
         	}
         	/** Link to current page, plus 2 pages in either direction if necessary */
         	sort( $links );
         	foreach ( (array) $links as $link ) {
         		$class = $paged == $link ? ' class="active"' : '';
         		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
         	}
         	/** Link to last page, plus ellipses if necessary */
         	if ( ! in_array( $max, $links ) ) {
         		if ( ! in_array( $max - 1, $links ) )
         			echo '<li>…</li>' . "\n";
         		$class = $paged == $max ? ' class="active"' : '';
         		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
         	}
         	/** Next Post Link */
         	if ( get_next_posts_link() )
         		printf( '<li>%s</li>' . "\n", get_next_posts_link() );
         	echo '</ul></div>' . "\n";
         }
         add_action('pre_get_posts', 'wpse_187444_search_query_pre');
         function wpse_187444_search_query_pre($query) {
         	if ($query->is_search() && $query->is_main_query()) {
         		$tax_query = $query->get('tax_query', array());
         		$tax_query[] = array(
         			'taxonomy' => 'product_visibility',
         			'field'    => 'name',
         			'terms'    => 'exclude-from-catalog',
         			'operator' => 'NOT IN',
         		);
         		$query->set('tax_query', $tax_query);
         	}
         }
         function add_custom_sizes() {
         	add_image_size( 'advisory-board', 1400, 600, true );
         	add_image_size( 'homepage-slide', 1920, 600, true );
         	add_image_size( 'homepage-slide2', 1920, 720, true );
         	add_image_size( 'mobile-homepage-slide', 400, 400, true );
         	add_image_size( 'home-category-thumbnail', 300, 200, true );
         }
         add_action('after_setup_theme','add_custom_sizes');

// Connect the WordPress post editor to your custom stylesheet
         function my_theme_add_editor_styles() {
         	add_editor_style( 'custom-editor-style.css' );
         }
         add_action( 'admin_init', 'my_theme_add_editor_styles' );
         function mce_mod( $init ) {
         	$init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;';
    //This allows color styles to be inherited from the editor styelsheet.
         	unset($init['preview_styles']);
         	$style_formats = array (
        // array( 'title' => 'Bold text', 'inline' => 'b' ),
         	);
         	$init['style_formats_merge'] = false;
         	return $init;
         }
         add_filter('tiny_mce_before_init', 'mce_mod');

         add_filter( 'gform_form_tag', 'gform_form_tag_autocomplete', 11, 2 );
         function gform_form_tag_autocomplete( $form_tag, $form ) {
         	if ( is_admin() ) return $form_tag;
         	if ( GFFormsModel::is_html5_enabled() ) {
         		$form_tag = str_replace( '>', ' autocomplete="off">', $form_tag );
         	}
         	return $form_tag;
         }
         add_filter( 'gform_field_content', 'gform_form_input_autocomplete', 11, 5 ); 
         function gform_form_input_autocomplete( $input, $field, $value, $lead_id, $form_id ) {
         	if ( is_admin() ) return $input;
         	if ( GFFormsModel::is_html5_enabled() ) {
         		$input = preg_replace( '/<(input|textarea)/', '<${1} autocomplete="off" ', $input ); 
         	}
         	return $input;
         }

         function gravity_js_to_footer() {
         	return true;
         }
         add_filter("gform_init_scripts_footer", "gravity_js_to_footer");
// Fix the ajax jquery inline code issue when gravity js is being called in the footer
//https://bjornjohansen.no/load-gravity-forms-js-in-footer
         add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
         function wrap_gform_cdata_open( $content = '' ) {
         	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
         	return $content;
         }
         add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
         function wrap_gform_cdata_close( $content = '' ) {
         	$content = ' }, false );';
         	return $content;
         }
         function my_acf_admin_head() {
         	?>
         	<style type="text/css">
         		.acf-flexible-content .layout .acf-fc-layout-handle {
         			background-color: #202428;
         			color: #eee;
         		}
         		.acf-repeater.-row > table > tbody > tr > td,
         		.acf-repeater.-block > table > tbody > tr > td {
         			border-top: 2px solid #202428;
         		}
         		.acf-repeater .acf-row-handle {
         			vertical-align: top !important;
         			padding-top: 16px;
         		}
         		.acf-repeater .acf-row-handle span {
         			font-size: 20px;
         			font-weight: bold;
         			color: #202428;
         		}
         		.imageUpload img {
         			width: 75px;
         		}
         		.acf-repeater .acf-row-handle .acf-icon.-minus {
         			top: 30px;
         		}
         	</style>
         	<?php
         }
         add_action('acf/input/admin_head', 'my_acf_admin_head');
         function hwid_acf_admin_footer() {
         	?>
         	<script>
         		( function( $) {
         			acf.add_filter( 'wysiwyg_tinymce_settings', function( mceInit, id ) {
				// grab the classes defined within the field admin and put them in an array
				var classes = $( '#' + id ).closest( '.acf-field-wysiwyg' ).attr( 'class' );
				if ( classes === undefined ) {
					return mceInit;
				}
				var classArr = classes.split( ' ' ),
				newClasses = '';
				// step through the applied classes and only use those that start with the 'hwid-' prefix
				for ( var i=0; i<classArr.length; i++ ) {
					if ( classArr[i].indexOf( 'hwid-' ) === 0 ) {
						newClasses += ' ' + classArr[i];
					}
				}
				// apply the prefixed classes to the body_class property, which will then
				// put those classes on the rendered iframe's body tag
				mceInit.body_class += newClasses;
				return mceInit;
			});
         		})( jQuery );
         	</script>
         	<?php
         }
         add_action('acf/input/admin_footer', 'hwid_acf_admin_footer');
// check for clear-cart get param to clear the cart, append ?clear-cart to any site url to trigger this
         add_action( 'init', 'woocommerce_clear_cart_url' );
         function woocommerce_clear_cart_url() {
         	if ( isset( $_GET['clear-cart'] ) ) {
         		global $woocommerce;
         		$woocommerce->cart->empty_cart();
         	}
         }



// function get_attached_file_copy_back_to_local( $copy_back_to_local, $file, $attachment_id ) {
// 		if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {
// 			return $copy_back_to_local;
// 		}

// 		if ( isset( $_POST['action'] ) && 'some-plugin-action' == $_POST['action'] ) {
// 			$copy_back_to_local = true;
// 		}

// 		return $copy_back_to_local;
// 	}




	// function assets_pull_test_endpoint_sslverify( $verify, $domain ) {
	// 	return false;
	// }



