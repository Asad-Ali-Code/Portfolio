
<?php

global $post;

// Get author's display name
$display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );

$avatar = get_avatar( get_the_author_meta('user_email') , 90 );


// Get author's biographical information or description
$user_designation = get_the_author_meta( 'user_designation', $post->post_author );

$user_description = get_the_author_meta( 'user_description', $post->post_author );


// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

$user_profiles = get_the_author_meta( 'social_profiles', $post->post_author );


$author_id = get_the_author_meta('ID');

?>



          <div class="about-author ">
              <h3 class="about-author-title"><?php esc_html_e('About the author', 'bufet'); ?></h3>
              <div class="clearfix">
                  <div class="author-img">
                      <?php printf('<a href="%s">%s</a>', esc_url( $user_posts ), $avatar); ?>
                  </div>
                  <div class="author-detail">
                      <h3><?php printf('<a href="%s">%s</a>', esc_url( $user_posts ), $display_name); ?></h3>
                      <span class="author-designation"><?php echo esc_html( $user_designation ); ?></span>
                      <p class="author-desc"><?php echo esc_html( $user_description ); ?></p>


                      <?php

                        if( function_exists('have_rows') ) :

                            if( have_rows('social_profiles', 'user_' . $author_id) ): ?>

                            <ul class="social-links">

                            <?php while( have_rows('social_profiles', 'user_' . $author_id) ): the_row(); ?>

                              <?php printf('<a href="%s" target="_blank"><span class="ti-%s"></span></a>', esc_url(get_sub_field('profile_url')) , esc_attr( get_sub_field('add_social_profile') ) ); ?>

                            <?php endwhile; ?>

                            </ul>

                    <?php
                            endif;
                        endif;
                     ?>

                  </div>
              </div>
          </div>
