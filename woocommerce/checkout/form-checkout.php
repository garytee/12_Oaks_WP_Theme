<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
<!-- 	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3> -->
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>


	<div id="order_review" class="woocommerce-checkout-review-order">

			<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

<div class="col-3">
					<div id="map"></div>
			</div>
			
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>


                      <script type="text/javascript">
                        jQuery(document).ready(function($) {
        // var sortby = scriptjs.sortby;
        if ($("#map").length) {
 // When the window has finished loading create our google map below
 google.maps.event.addDomListener(window, 'load', init);
 function init() {
   // Basic options for a simple Google Map
   // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
   var mapOptions = {
     // How zoomed in you want the map to start at (always required)
     zoom: 11,
     // The latitude and longitude to center the map (always required)
     center: new google.maps.LatLng(34.204294, -118.423223), // New York
     panControl: false,
     zoomControl: true,
     mapTypeControl: false,
     scaleControl: false,
     streetViewControl: false,
     overviewMapControl: false,
     rotateControl: false,
     fullscreenControl: false,
     // How you would like to style the map. 
     // This is where you would paste any style found on Snazzy Maps.
 };
   // Get the HTML DOM element that will contain your map 
   // We are using a div with id="map" seen below in the <body>
   var mapElement = document.getElementById('map');
   // Create the Google Map using our element and options defined above
   var map = new google.maps.Map(mapElement, mapOptions);
   // Let's also add a marker while we're at it
   var marker = new google.maps.Marker({
       position: new google.maps.LatLng(34.204294, -118.423223),
       map: map,
       title: 'Pickup Location'
   });
}
        }
      });
    </script>

			
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
