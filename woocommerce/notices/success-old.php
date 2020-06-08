<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>

<style>
/*    .woocommerce-message .close-button {
        float:right;
        display:inline-block;
        color:white;
        cursor:pointer;
    }*/
</style>
<script>
  // (function($){
  //   $(document).ready(function(){
  //     $('.woocommerce-message .close-button').on('click', function(){
  //       $('.woocommerce-message').fadeOut(function(){$(this).remove();});
  //     });
  //   });
  // }(jQuery));
</script>
<?php foreach ( $messages as $message ) : ?>
  <!-- <div class="woocommerce-message-overlay"> -->
    <div class="woocommerce-message">
        <?php echo wp_kses_post( $message ); ?>    
        <!-- <span class="close-button">Continue Shopping</span> -->
    </div>
  <!-- </div> -->


  <div class="woocommerce-message-overlay">
    <div class="woocommerce-message2">
        <?php echo wp_kses_post( $message ); ?>    
        <!-- <span class="close-button">Continue Shopping</span> -->
    </div>
  </div>



<!--     <div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div> -->
<?php endforeach; ?>
