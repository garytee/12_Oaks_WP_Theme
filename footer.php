<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Twelve_Oaks_Desserts
 */
?>
</div><!-- #content -->
<div class="animated fadeIn" id="footer">
  <footer id="footer" class="site-footer animated slideInUp" role="contentinfo">
    <div class="footer">
      <div class="footer_content">
        <div class="row">
          <div class="col">
            <div class="col_content">
              <div class="footer_title">
              </div>
              <div class="footer_menu">
                <?php
     // check if the flexible content field has rows of data
                if( have_rows('column_1', 'option') ):
        // loop through the rows of data
                 while ( have_rows('column_1', 'option') ) : the_row();
        // check current row layout
                   if( get_row_layout() == 'title' ):
              // check if the nested repeater field has rows of data
                    echo '<div class="footer_title">';
                    the_sub_field('footer_title_1');
                    echo '</div>';
                  elseif( get_row_layout() == 'menu' ):
              // check if the nested repeater field has rows of data
                   if( have_rows('repeater', 'option') ):
                     echo '<ul>';
            // loop through the rows of data
                     while ( have_rows('repeater', 'option') ) : the_row();
                      $menu_title = get_sub_field('menu_title', 'option');
                      $link = get_sub_field('link', 'option');
                      echo '<a href="' . $link . '"><li class="footermenuitem">' . $menu_title . '</li></a>';
                    endwhile;
                    echo '</ul>';
                  endif;
                 // check current row layout
                elseif( get_row_layout() == 'forms' ):
               // check if the nested repeater field has rows of data
                 if( have_rows('forms', 'option') ):
                   echo '<ul>';
             // loop through the rows of data
                   while ( have_rows('forms', 'option') ) : the_row();
                     $form_object = get_sub_field('form');
                     echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
                   endwhile;
                   echo '</ul>';
                 endif;
               endif;
             endwhile;
           else :
         // no layouts found
           endif;   
           ?>
         </div>
       </div>
     </div>
     <div class="col">
      <div class="col_content">
       <div class="footer_form">
         <?php
     // check if the flexible content field has rows of data
         if( have_rows('column_2', 'option') ):
        // loop through the rows of data
           while ( have_rows('column_2', 'option') ) : the_row();
        // check current row layout
             if( get_row_layout() == 'title' ):
              // check if the nested repeater field has rows of data
              echo '<div class="footer_title">';
              the_sub_field('footer_title_2');
              echo '</div>';
            elseif( get_row_layout() == 'social_media' ):
              // check if the nested repeater field has rows of data
              if( have_rows('icons', 'option') ):
               echo '<ul class="socialicons">';
               // loop through the rows of data
               while ( have_rows('icons', 'option') ) : the_row();
                $image = get_sub_field('icon', 'option');
                $link = get_sub_field('link_to_page', 'option');
                echo '<a href="' . $link . '"><li class="social">' . $image . '</li></a>';
              endwhile;
              echo '</ul>';
            endif;
                 // check current row layout
          elseif( get_row_layout() == 'forms' ):
               // check if the nested repeater field has rows of data
           if( have_rows('forms', 'option') ):
             echo '<ul>';
             // loop through the rows of data
             while ( have_rows('forms', 'option') ) : the_row();
               $form_object = get_sub_field('form');
             // echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
               gravity_form(get_sub_field('form'), false, true, false, '', true, 1); 
             endwhile;
             echo '</ul>';
           endif;
         endif;
       endwhile;
     else :
         // no layouts found
     endif;   
     ?>
   </div>
 </div>
</div>
<div class="col">
  <div class="col_content">
    <?php
     // check if the flexible content field has rows of data
    if( have_rows('column_3', 'option') ):
        // loop through the rows of data
     while ( have_rows('column_3', 'option') ) : the_row();
        // check current row layout
       if( get_row_layout() == 'title' ):
              // check if the nested repeater field has rows of data
        echo '<div class="footer_title">';
        the_sub_field('footer_title_3');
        echo '</div>';
      elseif( get_row_layout() == 'wysiwyg' ):
              // check if the nested repeater field has rows of data
        echo '<div class="wysiwyg">';
        the_sub_field('wysiwyg');
        echo '</div>';
                 // check current row layout
      elseif( get_row_layout() == 'forms' ):
               // check if the nested repeater field has rows of data
       if( have_rows('forms', 'option') ):
         echo '<ul>';
             // loop through the rows of data
         while ( have_rows('forms', 'option') ) : the_row();
           $form_object = get_sub_field('form');
           echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
         endwhile;
         echo '</ul>';
       endif;
     endif;
   endwhile;
 else :
         // no layouts found
 endif;   
 ?>
</div>
</div>
</div>
</div>
</div>

<?php // echo the_content(); ?>
</footer>
<!-- #colophon -->
</div>
</div><!-- #page -->
<?php wp_footer(); ?>

    <!-- Mailchimp tracking -->
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us9.list-manage.com","uuid":"d36170bbaad68bebc2f83c811","lid":"9e99e8ba05","uniqueMethods":true}) })</script>
<!-- Mailchimp tracking -->


</body>
</html>
