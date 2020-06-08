<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Twelve_Oaks_Desserts
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

    <script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-62140808-1', 'auto');

// Replace the following lines with the plugins you want to use.
ga('require', 'eventTracker');
ga('require', 'outboundLinkTracker');
ga('require', 'urlChangeTracker');

ga('send', 'pageview');
</script>
<script async src="https://www.google-analytics.com/analytics.js"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/autotrack/2.3.2/autotrack.js">
</script>







<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5XVDM77');</script>
<!-- End Google Tag Manager -->


<!-- Global site tag (gtag.js) - Google Ads: 765714866 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-765714866"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-765714866'); </script>
<!-- Global site tag (gtag.js) - Google Ads: 765714866 --> 

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XVDM77"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


  <div id="page" class="site">
    <div class="delay">
      <div class="loading2"></div>
    </div>

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
    <header id="masthead" class="v2_site-header">
      <?php date_default_timezone_set('America/Los_Angeles'); ?>
      <?php 
      $post_date = strtotime(get_field('v2_remove_date', 'option'));
      if( ((time() - $post_date) < (0 * 24 * 60 * 60)) ): ?>
        <div class="v2_alert">
          <?php the_field('v2_alert', 'option'); ?>
        </div>
        <?php else: ?>
          <?php // my stuff ?>
        <?php endif; ?>
        <div class="wrap">
          <div class="v2_utility_menu">
            <div class="row">
              <div class="col">
                <?php if ( have_rows( 'left_column', 'option' ) ): ?>
                  <?php while ( have_rows( 'left_column', 'option' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'v2_social_media' ) : ?>
                      <?php if ( have_rows( 'v2_icons' ) ) : ?>
                        <ul class="v2_socialicons">
                          <?php while ( have_rows( 'v2_icons' ) ) : the_row(); ?>
                            <li class="social">
                              <a target="_blank" href="<?php the_sub_field( 'v2_link' ); ?>"><?php the_sub_field( 'v2_icon' ); ?>
                            </a>
                          </li>
                        <?php endwhile; ?>
                      </ul>
                      <?php else : ?>
                        <?php // no rows found ?>
                      <?php endif; ?>
                      <?php elseif ( get_row_layout() == 'wysiwyg' ) : ?>
                        <?php the_sub_field( 'wysiwyg' ); ?>
                      <?php endif; ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                      <?php // no layouts found ?>
                    <?php endif; ?>
                  </div>
                  <div class="col">
                    <?php if ( have_rows( 'right_column', 'option' ) ) : ?>
                      <?php while ( have_rows( 'right_column', 'option' ) ) : the_row(); ?>
                        <div class="col_content">
                          <span class="searchicon">
                            <i class="fas fa-search"></i>
                          </span>
                          <div class="search">
                            <form role="search" method="get" class="search-form" action="/">
                              <label>
                                <input type="search" class="search-field" placeholder="Search" value="<?php the_search_query(); ?>" name="s" title="Search:">
                              </label>
                              <input type="submit" class="search-submit" value="Search">
                            </form>
                          </div>
                          <div class="account">
                            <nav>
                              <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><i class="fas fa-user"></i> &#x25BE;</a>
                                <nav>
                                  <?php
                                  if ( is_user_logged_in() ) {
                                    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Account Dropdown') ) : ?>
                                  <?php endif;
                              } else {
                                ?>
                                <li>
                                  <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>">
                                    <?php _e('Login / Register','woothemes'); ?>
                                  </a>
                                </li>
                                <?php
                              }
                              ?>
                            </nav>
                          </li>
                        </nav>
                      </div>
                      <div class="shopping_cart">
                       <nav>
                        <li><a class="no-smoothstate" href="<?php echo WC()->cart->get_cart_url(); ?>"><span class="">Cart</span>&nbsp;(<span class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</a>
                          <nav>
                            <?php
                            if ( is_user_logged_in() ) {
                             if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Cart Dropdown') ) : ?>
                           <?php endif;
                       } else {
                        ?>
<!--                           <li>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>">
                              <?php _e('Login / Register','woothemes'); ?>
                            </a>
                          </li> -->
                          <?php
                        }
                        ?>
                      </nav>
                    </li>
                  </nav>
                </div>
              </div>
              <!-- col_content -->
            <?php endwhile; ?>
            <?php else : ?>
              <?php // no rows found ?>
            <?php endif; ?>
          </div>

<div class="headerbutton_wrap">
          <div class="headerbutton"><?php echo do_shortcode('[btnsx id="18623"]') ?></div>

</div>

        </div>
      </div>
      <div class="mobile_menu">
        <div class="row">
          <div class="col">
            <div class="menu">
                <input type="checkbox" id="menu-open">
                <nav class="menu-list">
                  <div id="main-nav_responsive">
                    <div class="mobilemenu">
                      <?php
                      wp_nav_menu( array(
                        'theme_location' => 'left-main-menu',
                        'menu_id'        => 'primary-menu',
                      ) );
                      wp_nav_menu( array(
                        'theme_location' => 'right-main-menu',
                        'menu_id'        => 'primary-menu',
                      ) );
                      ?>
                    </div>
                  </div>
                </nav>
                <label for="menu-open" class="nav-btn">
                  <span></span>
                  <span></span>
                  <span></span>
                </label>
                <a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home">
                </a>
              </div>
            <a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home">
              <?php if ( get_field( 'mobile_logo', 'option' ) ) { ?>
                <?php
                $physician_banner_image = get_field('mobile_logo', 'option');
                if( !empty($physician_banner_image) ): 
  // vars
                  $url = $physician_banner_image['url'];
                  $title = $physician_banner_image['title'];
                  $alt = $physician_banner_image['alt'];
                  $caption = $physician_banner_image['caption'];
  // thumbnail
                  $size = 'logo';
                  $thumb = $physician_banner_image['sizes'][ $size ];
                  $width = $physician_banner_image['sizes'][ $size . '-width' ];
                  $height = $physician_banner_image['sizes'][ $size . '-height' ];
                endif; ?>
                <a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home">
                  <img class="mobilelogo" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                <?php } ?>
              </a>
            </div>
            <!-- .col -->
            <div class="col">
              <div class="col_content">
                <div class="account">
                  <nav>
                    <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><i class="fas fa-user"></i></a>
                      <nav>
                        <?php
                        if ( is_user_logged_in() ) {
                        } else {
                          ?>
                          <?php
                        }
                        ?>
                      </nav>
                    </li>
                  </nav>
                </div>
                <div class="shopping_cart">
                 <nav>
                  <li><a href="<?php echo WC()->cart->get_cart_url(); ?>"><i class="fal fa-shopping-cart"></i>(<span class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</a>
                    <nav>
                      <?php
                      if ( is_user_logged_in() ) {
                      } else {
                      }
                      ?>
                    </nav>
                  </li>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- .row -->
      </div>
      <!-- .wrap -->
      <!-- #site-navigation -->
    </div>
    <!-- .mobile_menu -->
    <div class="desktop_menu">
      <div class="row">
        <div class="col">
          <!-- <div id="desktopmenu" role="banner"> -->
            <nav id="site-navigation" class="main-navigation">
              <?php
              wp_nav_menu( array(
                'theme_location' => 'left-main-menu',
                'menu_id'        => 'primary-menu',
              ) );
              ?>
            </nav><!-- #site-navigation -->
          </div>
          <div class="col">
            <div class="banner-image">
              <?php
              $physician_banner_image = get_field('v2_logo', 'option');
              if( !empty($physician_banner_image) ): 
  // vars
                $url = $physician_banner_image['url'];
                $title = $physician_banner_image['title'];
                $alt = $physician_banner_image['alt'];
                $caption = $physician_banner_image['caption'];
  // thumbnail
                $size = 'logo';
                $thumb = $physician_banner_image['sizes'][ $size ];
                $width = $physician_banner_image['sizes'][ $size . '-width' ];
                $height = $physician_banner_image['sizes'][ $size . '-height' ];
              endif; ?>
              <a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home">
                <img class="notlazy" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
              </a>
            </div>
          </div>
          <div class="col">
            <div id="desktopmenu" role="banner">
              <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu( array(
                  'theme_location' => 'right-main-menu',
                  'menu_id'        => 'primary-menu',
                ) );
                ?>
              </nav><!-- #site-navigation -->
            </div>
          </div>
        </div>
      </header><!-- #masthead -->
      <div id="content" class="site-content">