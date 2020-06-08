<div class="alm_blog">
	<div class="alm_blogimage">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('alm-thumbnail');} ?>
	</div>
	<div class="alm_bloginfo">
	<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
	<p id="postdate" class="entry-meta">Posted on <strong><?php the_time("F d, Y"); ?></strong></p>
	<?php the_excerpt(); ?>
	</div>
</div>
