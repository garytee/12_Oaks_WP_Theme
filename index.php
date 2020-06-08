<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Twelve_Oaks_Desserts
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			                            <?php the_field( 'top_of_blog_page', 'option' ); ?>



			            <div class="blogpage">
                <div class="row">
                    <div class="col">

                    	<?php
// echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="5" button_loading_label="Loading"]');
                    	?>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			// the_posts_navigation();
            wpbeginner_numeric_posts_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>


	</div>








            <div class="col">
            <?php
            //echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" button_loading_label="Loading"]');
            // echo '</div>';

            ?>

<!-- <div class="catercow">

<div data-ccc-widget="https://www.catercow.com/cares/12-oaks-desserts-covid/widget" width="500"></div>
<script type="text/javascript" charset="utf-8" src="https://catercow.s3.amazonaws.com/scripts/catercow-widget.umd.min.js"></script>

</div> -->


<div class="tnp tnp-subscription">
    <div class="subscribe_text">
<h1 style="font-family: 'HaloHandletter'; font-weight: normal; font-size: 42px; text-align: center; color: #EB7288; line-height: 50px; ">Never miss a post!</h1>    </div>


<!-- <form method="post" action="https://www.copepsychiatry.com/subscribe-thank-you/?na=s" onsubmit="return newsletter_check(this)">

<div class="tnp-field tnp-field-email"><input class="tnp-email" type="email" name="ne" required><label>Email Address</label></div>
<div class="tnp-field tnp-field-button"><input class="tnp-submit" type="submit" value="Submit">
</div>
</form> -->

<?php
echo do_shortcode( '[gravityform id="9" title="false" description="false"]' );
?>

</div>


<div class="topics">

    <div class="topicstitle"><h2>CATEGORIES</h2></div>

<?php
$categories = get_categories();
foreach($categories as $category) {
   echo '<div class="category"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
}
?>

</div>



<div class="recent_posts">

<div class="recent_post_title"><h2>RECENT POSTS</h2></div>

<?php
$args = array( 'numberposts' => 5 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
    <div class="single_recent_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <?php //the_content(); ?>
<?php endforeach; ?>


</div>

<div class="blog_insta">

<div class="recent_post_title"><h2>INSTAGRAM</h2></div>

<div id="bloginstafeed" class="wow fadeInUp bloginstafeed" data-wow-offset="50" data-wow-duration="0.5s" data-wow-delay="0.5s"></div>




  <script type="text/javascript">
    
jQuery(document).ready(function($) {
        var sortby = scriptjs.sortby;

    if ($("#bloginstafeed").length) {
        var feed = new Instafeed({
            resolution: 'low_resolution',
            get: 'user',
            userId: 15207770,
            // accessToken: '15207770.d226df6.59f73e3503284b83b0eb0c43d9769b21',
            // accessToken: '15207770.8dd1611.d32706a5c9894d208c59c2c048251a9c',
            accessToken: '15207770.8dd1611.472da477ed1c40abb9be5714b8edb0c5',
            // template: '<div><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></div>',
            template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
            target: 'bloginstafeed',
            // sortBy: sortby,
            // sortBy: 'most-liked',
            // sortBy: '<?php // the_sub_field('sort_by');  ?>',
            //limit: 8, 
            // after: function () {
            //   var instagrams = $("#instagram > a");
            //   for (var i = 11; i < instagrams.length; i += 1) {
            //     instagrams[i].remove();
            //   }
            // }
            //     after: function() {

            //         $('#instafeed').slick({
            //         // speed: 0,
            //         // autoplay: false,
            //         // autoplaySpeed: 0,
            //         // cssEase: 'linear',
            //         // slidesToShow: 5,
            //         //   centerMode: false,
            //   infinite: false,

            //         // slidesToScroll: 1,
            //         // variableWidth: true,
            //         // arrows: false,
            //         });

            //     }

            after: function() {
                var images = $("#bloginstafeed").find('a');
                for (var i = 4; i < images.length; i += 1) {
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
        });
        feed.run();
    }
});

  </script>


</div>

            </div>










</div>
</div>






		</main><!-- #main -->
	</div><!-- #primary -->


<?php



                if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php
      $url = site_url( '/wp-admin/edit.php', 'https' );
      $url2 = site_url( '/wp-admin/edit.php' );
      ?>
      <span class="no-smoothstate edit-link animated fadeInUp"><a href="<?php echo $url2 ?>">Edit Blogs</a></span>
    </footer>

    <!-- .entry-footer -->
  <?php endif; ?>





<?php
get_sidebar();
get_footer();
