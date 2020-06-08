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



    <a href="<?php the_permalink(); ?>">
    <?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      ?>
    </a>
    <a href="<?php the_permalink(); ?>">
<?php       // the_post_thumbnail( 'single-post-thumbnail' ); ?>
<?php

$blog_image = get_field('blog_image');

if( !empty($blog_image) ): 
echo '<div class="blogpost_image">';
  // vars
  $url = $blog_image['url'];
  $title = $blog_image['title'];
  $alt = $blog_image['alt'];
  $caption = $blog_image['caption'];

  // thumbnail
  $size = 'single-blog';
  $thumb = $blog_image['sizes'][ $size ];
  $width = $blog_image['sizes'][ $size . '-width' ];
  $height = $blog_image['sizes'][ $size . '-height' ];

  if( $caption ): ?>

    <div class="wp-caption">

  <?php endif; ?>

  <!-- <a href="<?php echo $url; ?>" title="<?php echo $title; ?>"> -->

    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

        <!-- <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" /> -->


  <!-- </a> -->

</div>


    <?php endif; ?>
    </a>
    <div class="postexcerpt">
      <?php
      the_field('blog_excerpt');
      ?>
    </div>
      <div class="readmore">
          <a href="<?php the_permalink(); ?>">
Read More
    </a>
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
