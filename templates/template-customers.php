<?php 
/*
Template Name: Customers
*/
get_header(); ?>
<section id="content" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="users">
      <?php 
      $args = array(
        'posts_per_page' => -1,
        'cat' => $queryinfo->term_id  
      );
      $user_query = new WP_User_Query( $args );
      $users = $user_query->get_results();
      if (!empty($users)) {
        $people .= '<ul>';
      foreach ($users as $user) { // loop through each user
        $user_info = get_userdata($user->ID);  // get all the user's data
        $people .= '<hr><li><span class="title"><h3 style="color: #FF6D6D;"><a href="../wp-admin/user-edit.php?$user_info">' . $user_info->first_name . ' ' . $user_info->last_name . '</a></h3></span>';
        $people .= '<a href=../wp-admin/user-edit.php?user_id=' . $user_info->id . '>link to profile</a>';
        if( !empty($user_info->description) ) {
          $people .= '<span>' . $user_info->description . '</span>';
        }
        if( get_field('birthday', 'user_' .$user_info->ID) ) {
          $people .= '<h3>Birthday:</h3>' . get_field('birthday', 'user_' .$user_info->ID) . '</span></div>';
        }
        if( get_field('anniversary', 'user_' .$user_info->ID) ) {
          $people .= '<h3>Anniversary:</h3>' . get_field('anniversary', 'user_' .$user_info->ID) . '</span></div>';
        }
        if( get_field('family', 'user_' .$user_info->ID) ) {
          $family_id = get_the_author_meta('ID');
          $families = get_field('family', 'user_'. $family_id );
          foreach ($families as $family) {
            $people .= '<h3>Family Member:</h3><div><strong>Name: </strong><span>' . $family['name'] . '</span></div>
            <div><strong>Birthday: </strong><span>' . $family['birthday'] . '</span></div>';
          }
        }
        if( get_field('dessert_preferences', 'user_' .$user_info->ID) ) {
          $people .= '<h3>Dessert Preferences:</h3>' . get_field('dessert_preferences', 'user_' .$user_info->ID) . '</span></div>';
        }
        if( get_field('notes', 'user_' .$user_info->ID) ) {
          $people .= '<h3>Notes:</h3>' . get_field('notes', 'user_' .$user_info->ID) . '</span></div>';
        }
        $posts = get_field('user_organisation', 'user_' .$user_info->ID);
        // Note that field 'user_organisation' is connected to the post object 'organisation' which is a custom post type
        if( $posts ) {
          foreach( $posts as $post) { // IMPORTANT variable must be called $post
            $people .= '<span><a href="' . the_permalink() . '">' . the_title() . '</a></span>';
          }
        wp_reset_postdata();  // IMPORTANT - reset the $post object so the rest of the page works correctly 
      }
      $people .= '</li>';
       } // end for each loop
       $people .= '</ul>';
  } // end initial if statement
  else{
    $people .= '<p>Sorry, we don\'t currently have any people in this category.</p>';
  }
  echo $people;
  ?>
</div>
<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>