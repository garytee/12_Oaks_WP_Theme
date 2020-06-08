<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package twelveoaksbakery
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
  </header><!-- .entry-header -->
  <?php if ( have_rows( 'v2_content' ) ): ?>
    <?php while ( have_rows( 'v2_content' ) ) : the_row(); ?>
      <?php if ( get_row_layout() == 'v2_homepage_slider' ) : ?>
        <?php if ( have_rows( 'v2_homepage_slider' ) ) : ?>
          <div class="section-hero-slider2"><div class="hero-slider2">
            <?php while ( have_rows( 'v2_homepage_slider' ) ) : the_row(); ?>
              <?php $v2_link_to_page = get_sub_field( 'v2_link_to_page' ); ?>
              <?php if ( $v2_link_to_page ) { ?>
                <a href="<?php echo $v2_link_to_page; ?>">
                  <?php $v2_image = get_sub_field( 'v2_image' ); ?>
                  <?php if ( $v2_image ) { ?>
                    <div class="slider-image">
                      <?php
                      echo rwp_picture( $v2_image, array(
                        'sizes' => array( 'mobile-homepage-slide', 'large', 'homepage-slide2' )
                      ) ); 
                      ?>
                    </div>
                  <?php } ?>
                  <div class="slider-content">
                    <div class="slider-text">
                      <?php the_sub_field( 'v2_text' ); ?>
                    </div>
                    <div class="button-text">
                      <?php the_sub_field( 'v2_button_text' ); ?>
                    </div>
                  </div>
                </a>
              <?php } ?>
            <?php endwhile; ?>
          </div></div>
          <?php else : ?>
            <?php // no rows found ?>
          <?php endif; ?>
        <?php elseif ( get_row_layout() == 'product_category_columns' ) : 
          $counter = get_sub_field('product_category_columns');
          ?>
          <?php if ( have_rows( 'product_category_columns' ) ) : 
            echo '<div class="flexible_columns">';
            ?>
            <?php while ( have_rows( 'product_category_columns' ) ) : the_row(); ?>
              <?php
              $count = count( $counter );
                          // echo $count;
                          // HTML goes here
              echo '<div class="col ';
              if ($count == 1) {
                $class  = 'one';
                echo $class .'">';
              } 
              if ($count == 2) {
                $class  = 'two';
                echo $class .'">';
              }
              if ($count == 3) {
                $class  = 'three';
                echo $class .'">';
              }
              if ($count == 4) {
                $class  = 'four';
                echo $class .'">';
              }
              if ($count == 5) {
                $class  = 'five';
                echo $class .'">';
              }
              if ($count == 6) {
                $class  = 'six';
                echo $class .'">';
              }
              if ($count == 7) {
                $class  = 'seven';
                echo $class .'">';
              }
              if ($count == 8) {
                $class  = 'eight';
                echo $class .'">';
              }
              if ($count == 9) {
                $class  = 'nine';
                echo $class .'">';
              }
              if ($count == 10) {
                $class  = 'ten';
                echo $class .'">';
              }
              if ($count == 11) {
                $class  = 'eleven';
                echo $class .'">';
              }
              if ($count == 12) {
                $class  = 'twelve';
                echo $class .'">';
              }
              else {
              }
              ?>
              <?php if ( have_rows( 'product_category_column' ) ): ?>
                <?php while ( have_rows( 'product_category_column' ) ) : the_row(); ?>
                  <?php if ( get_row_layout() == 'product_image' ) : ?>
                    <?php $product_image = get_sub_field( 'product_image' ); ?>
                          <?php if ( $product_image ) { ?>
                            <?php
  // vars
                            $url = $product_image['url'];
                            $title = $product_image['title'];
                            $alt = $product_image['alt'];
                            $caption = $product_image['caption'];
  // thumbnail
                            $size = 'home-category-thumbnail';
                            $thumb = $product_image['sizes'][ $size ];
                            $width = $product_image['sizes'][ $size . '-width' ];
                            $height = $product_image['sizes'][ $size . '-height' ];
                            ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                          <?php } ?>
                    <?php elseif ( get_row_layout() == 'product_excerpt' ) : ?>
                      <?php the_sub_field( 'product_excerpt' ); ?>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
                <?php else: ?>
                  <?php // no layouts found ?>
                <?php endif; ?>
              <?php endwhile; ?>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
              <?php elseif ( get_row_layout() == 'shop_section' ) : ?>
                <?php 
                $counter = get_sub_field('products'); 
                if ( have_rows('products') ) : ?>
                  <div class="flexible_columns">
                    <?php while ( have_rows('products') ) : the_row();
                      $count = count( $counter );
    // echo $count;
                      echo '<div class="col ';
                      if ($count == 1) {
                        $class  = 'one';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      } 
                      if ($count == 2) {
                        $class  = 'two';
                                  // echo $class .'" style="background-color: blue;">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 3) {
                        $class  = 'three';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 4) {
                        $class  = 'four';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 5) {
                        $class  = 'five';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 6) {
                        $class  = 'six';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 7) {
                        $class  = 'seven';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 8) {
                        $class  = 'eight';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 9) {
                        $class  = 'nine';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 10) {
                        $class  = 'ten';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 11) {
                        $class  = 'eleven';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                      if ($count == 12) {
                        $class  = 'twelve';
                                  // echo $class .'">';
                        echo $class;
                        $color = the_sub_field("background_color");
                        echo $color .'">';
                      }
                    // echo 'test</div>';
                      ?>
                      <?php $category_term = get_sub_field( 'category' ); ?>
                      <?php if ( $category_term ): ?>
                        <a href="/product-category/<?php echo $category_term->slug; ?>">
                          <?php $product_image = get_sub_field( 'product_image' ); ?>
                          <?php if ( $product_image ) { ?>
                            <?php
  // vars
                            $url = $product_image['url'];
                            $title = $product_image['title'];
                            $alt = $product_image['alt'];
                            $caption = $product_image['caption'];
  // thumbnail
                            $size = 'home-category-thumbnail';
                            $thumb = $product_image['sizes'][ $size ];
                            $width = $product_image['sizes'][ $size . '-width' ];
                            $height = $product_image['sizes'][ $size . '-height' ];
                            ?>
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                          <?php } ?>
                          <button class="homepage-category-button">
                            <?php echo $category_term->name; ?>
                          </button>
                        </a>
                        <div class="product-excerpt">
                          <?php the_sub_field( 'product_excerpt' ); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <?php
    // HTML goes here
                  endwhile; ?>
                </div>
              <?php endif;
              ?>
              <?php elseif ( get_row_layout() == 'slider_shortcode' ) : ?>
                <div class="section-hero-slider2">
                  <?php
                  $slider = get_sub_field( 'slider_shortcode' );
                  echo do_shortcode($slider)  ?>
                </div>
                <?php elseif ( get_row_layout() == 'v2_three_equal_columns' ) : ?>
                  <?php if ( have_rows( 'v2_columns' ) ) : ?>
                    <?php while ( have_rows( 'v2_columns' ) ) : the_row(); ?>
                      <div class="homeintro">
                        <?php the_sub_field( 'v2_column' ); ?>
                      </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                      <?php // no rows found ?>
                    <?php endif; ?>
                    <?php elseif ( get_row_layout() == 'v2_instagram_feed' ) : ?>
                      <div id="instafeed" class="wow fadeInUp instafeed" data-wow-offset="50" data-wow-duration="0.5s" data-wow-delay="0.5s"></div>
                      <script type="text/javascript">
                        jQuery(document).ready(function($) {
        // var sortby = scriptjs.sortby;
        if ($("#instafeed").length) {
          var feed = new Instafeed({
            resolution: 'low_resolution',
            get: 'user',
            userId: 15207770,
            accessToken: '15207770.8dd1611.472da477ed1c40abb9be5714b8edb0c5',
            // template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
            target: 'instafeed',
            sortBy: '<?php the_sub_field('v2_sort_by');  ?>',
            after: function() {
              var images = $("#instafeed").find('a');
              for (var i = 8; i < images.length; i += 1) {
                images[i].remove();
              }
              $.each(images, function(index, image) {
                var delay = (index * 75) + 'ms';
                $(image).css('-webkit-animation-delay', delay);
                $(image).css('-moz-animation-delay', delay);
                $(image).css('-ms-animation-delay', delay);
                $(image).css('-o-animation-delay', delay);
                $(image).css('animation-delay', delay);
                $(image).addClass('animated flipInX');
              });
            },
            // template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /><div class="likes">&hearts; {{likes}}</div></a>'
            template: '<a data-tilt href="{{link}}" target="_blank"><img src="{{image}}" class="lazyload" /></a>',
          });
          feed.run();
        }
      });
    </script>
  <?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
  <?php // no layouts found ?>
  <?php twelveoaks_post_thumbnail(); ?>
  <div class="entry-content">
    <?php
    the_content();
    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'twelveoaks' ),
      'after'  => '</div>',
    ) );
    ?>
  </div><!-- .entry-content -->
<?php endif; ?>
<?php if ( get_edit_post_link() ) : ?>
  <footer class="entry-footer">
    <?php
    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Edit <span class="screen-reader-text">%s</span>', '_s' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ),
      '<span class="edit-link">',
      '</span>'
    );
    ?>
  </footer><!-- .entry-footer -->
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->