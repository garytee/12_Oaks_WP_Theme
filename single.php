<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Twelve_Oaks_Desserts
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			            <div class="blogpage">
                <div class="row">
                    <div class="col">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// the_post_navigation();

						// get_template_part( 'template-parts/content', 'blogpost' );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


	</div>



	                            <div class="col">
                                <div class="tnp tnp-subscription">
                                    <div class="subscribe_text">
                                        <h1 style="font-family: 'HaloHandletter'; font-weight: normal; font-size: 42px; text-align: center; color: #EB7288; line-height: 50px; ">Never miss a post!</h1>    </div>
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
                                                    accessToken: '15207770.8dd1611.472da477ed1c40abb9be5714b8edb0c5',
                                                    target: 'bloginstafeed',
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
                                                    template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
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
get_sidebar();
get_footer();
