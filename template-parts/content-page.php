<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package twelveoaksbakery
 */
?>
<?php 
if (have_rows('content')) : 
  while (have_rows('content')) : the_row();
    if (get_row_layout() == 'full_width_image'):
      $image = get_sub_field('full_width_image');
      echo '<div class="full_width_image"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '" /></div>';  
      elseif( get_row_layout() == 'text_block' ): ?>
        <div class="text_block row">
          <div class="content">
            <?php the_sub_field('content');?>
          </div>
        </div>
        <?php
      elseif( get_row_layout() == 'three_equal_columns' ): 
        $counter = get_sub_field('columns');
        if ( have_rows('columns') ) :
          echo '<div class="flexible_columns">';
          while ( have_rows('columns') ) : the_row();
            $count = count( $counter );
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
            $image = get_sub_field('center_image');
            $product_name = get_sub_field('column');
            $link = get_sub_field('link');
            if( !empty($image) ):
              echo '<div>' . $product_name .'</div></div>';
            else:
              echo '<div>' . $product_name .'</div></div>';
            endif;
          endwhile;
          echo '</div>';
        endif;
                      // endif; 
                      // check current row layout
      elseif( get_row_layout() == 'forms' ):
                      // check if the nested repeater field has rows of data
        if( have_rows('form') ):
          echo '<div>';
                          // loop through the rows of data
          while ( have_rows('form') ) : the_row();
            $form_object = get_sub_field('form');
            echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
          endwhile;
          echo '</div>';
        endif;
      elseif (get_row_layout() == 'gallery'):
        $header = get_sub_field('heading'); ?>
        <div class="block-text-centered">
          <h2 class="upper grey"><?php echo $header;?></h2>
        </div>
        <?php $rows = get_sub_field('gallery');
        if ($rows) : ?>
          <section class="gallery" data-featherlight-gallery data-featherlight-filter="a">
            <?php foreach ($rows as $row) : $img = wp_get_attachment_image_src($row['ID'], 'full'); ?>
              <div class="galleryimage">
                <a href="<?php echo $img[0]; ?>" alt="<?php echo $row['alt']; ?>">
                  <img src="<?php echo $img[0]; ?>" alt="<?php echo $row['alt']; ?>">
                </a>
              </div>
            <?php endforeach; ?>
          </section>
        <?php endif;
      elseif (get_row_layout() == 'new_gallery'):
       ?>
       <?php $rows = get_sub_field('new_gallery');
       if ($rows) : ?>
        <div class="gallery-centered">
          <div id="fixed-size">
            <?php foreach ($rows as $row) : 
              $thumb = wp_get_attachment_image_src($row['ID'], 'thumbnail');
              $img = wp_get_attachment_image_src($row['ID'], 'full'); 
              ?>
              <!-- <div class="galleryimage"> -->
                <a href="<?php echo $img[0]; ?>" alt="<?php echo $row['alt']; ?>">
                  <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $row['alt']; ?>">
                </a>
                <!-- </div> -->
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif;
      endif;
    endwhile;
  else :
    the_content();
  endif; 
  ?>
  <?php the_field( 'tracking_scripts' ); ?>
  <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Edit <span class="screen-reader-text">%s</span>', 'cope' ),
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
  <?php //get_footer(); ?>
