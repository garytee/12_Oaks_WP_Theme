<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package twelveoaksdesserts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
    
		else :

      ?>



    <div class="alm_blog">
  <div class="alm_blogimage">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('home-category-thumbnail');} ?>
  </div>
  <div class="alm_bloginfo">
  <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
  <p id="postdate" class="entry-meta">Posted on <strong><?php the_time("F d, Y"); ?></strong></p>
  <?php the_excerpt(); ?>
  </div>
</div>

    <?php
		endif;


    ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			// the_content( sprintf(
			// 	wp_kses(
			// 		/* translators: %s: Name of current post. Only visible to screen readers */
			// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cope' ),
			// 		array(
			// 			'span' => array(
			// 				'class' => array(),
			// 			),
			// 		)
			// 	),
			// 	get_the_title()
			// ) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'twelveoaksdesserts' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->








  <!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
