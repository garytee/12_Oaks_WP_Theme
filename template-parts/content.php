<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package twelveoaksbakery
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_single() ) :
            ?>

                        <h1 class="singleblogtitle"><?php the_title();?></h1>
                        <p id="postdate" class="entry-meta">
                            Posted on <strong><i><?php the_time("F d, Y"); ?></i></strong>
                            by <strong><?php
                            $fname = get_the_author_meta('first_name');
                            $lname = get_the_author_meta('last_name');
                            $full_name = '';
                            if( empty($fname)){
                                $full_name = $lname;
                            } elseif( empty( $lname )){
                                $full_name = $fname;
                            } else {
    //both first name and last name are present
                                $full_name = "{$fname} {$lname}";
                            }
                            echo $full_name;
                            ?></strong>
                        </p>
                        <?php if ( have_rows( 'flexible_content' ) ): ?>
                            <?php while ( have_rows( 'flexible_content' ) ) : the_row(); ?>
                                <?php if ( get_row_layout() == 'columns' ) : ?>
                                    <?php if ( have_rows( 'columns' ) ) : ?>
                                        <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                                            <?php the_sub_field( 'column' ); ?>
                                        <?php endwhile; ?>
                                        <?php else : ?>
                                            <?php // no rows found ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                <?php else: ?>
                                    <?php // no layouts found ?>
                                <?php endif; ?>



        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
              <?php
              edit_post_link(
                  sprintf(
                    wp_kses(
                      /* translators: %s: Name of current post. Only visible to screen readers */
                      __( 'Edit <span class="screen-reader-text">%s</span>', 'twelveoaksbakery' ),
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
      <?php endif; ?>

      
                    <?php
                else :
                    ?>

<!--                                         <div class="alm_blog">
    <div class="alm_blogimage">
        <div class="blogimagewrap">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('mobile-homepage-slide');} ?>
    </div>
    </div>
    <div class="alm_bloginfo">
    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <p id="postdate" class="entry-meta">Posted on <strong><?php the_time("F d, Y"); ?></strong></p>
    <?php the_excerpt(); ?>
    </div>
</div> -->

<div class="blog">
    <div class="blogcontent">
    <div class="blogimagewrap">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('mobile-homepage-slide');} ?>
    </div>
    <div class="bloginfo">
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <p id="postdate" class="entry-meta">Posted on <strong><?php the_time("F d, Y"); ?></strong></p>
            <div class="blogexcerpt">
        <?php the_excerpt(); ?>
        ... <a href="<?php echo the_permalink(); ?>">Read More</a>
    </div><!-- .entry-summary -->
    </div>
</div>
</div>


                    <?php
                endif;
                if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php //twelveoaksbakery_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                endif; ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'twelveoaksbakery' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer">
                <?php //twelveoaksbakery_entry_footer(); ?>
            </footer><!-- .entry-footer -->



              
        </article><!-- #post-## -->

