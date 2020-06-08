<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="woocommerce">
       <div class="wrap">
        <?php 
        if ( is_singular( 'product' ) ) {
         woocommerce_content();
         if ( get_edit_post_link() ) : ?>
          <footer class="entry-footer">
            <?php
            edit_post_link(
              sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Edit Page<span class="screen-reader-text">%s</span>', 'cope' ),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                get_the_title()
              ),
              '<span class="edit-link animated fadeInUp">',
              '</span>'
            );
            ?>
          </footer><!-- .entry-footer -->
        <?php endif;
      }
      else{
   //For ANY product archive.
   //Product taxonomy, product search or /shop landing
        woocommerce_get_template( 'archive-product.php' );
      }
      ?>
    </div>
  </div>
</main>
</div>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>