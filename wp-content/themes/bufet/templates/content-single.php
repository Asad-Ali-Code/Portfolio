<div <?php echo post_class(); ?>>
    <?php
        if( has_post_thumbnail() ) :
            the_post_thumbnail();
        endif;
    ?>
    <div class="post-meta clearfix">

        <?php get_template_part('templates/content', 'post-meta'); ?>

    </div>

    <div class="blog-heading">
        <?php
            printf('<h2>%s</h2>', esc_html( get_the_title() ) );
        ?>
    </div>
    <div class="blog-box-content clearfix">

        <?php

            echo the_content();

            // Show pagination if split the post into pages
            esc_url( bufet_wp_link_pages() );

        ?>

    </div>

    <div class="blog-social-links clearfix">
        <div class="pull-left">
            <div class="blog-tag-cloud-list">
                <?php
                    // Get the category list
                    $categories_list = get_the_category_list( esc_html__( ' ', 'bufet' ) );
                    if ( $categories_list ) {
                        echo '<ul>';
                        echo  $categories_list;
                        echo '</ul>';
                    }
                ?>

            </div>
        </div>

        <div class="pull-right">

            <?php do_action('single_blog_right_down'); ?>

        </div>

  </div>


</div>

<?php

    $user_description = get_the_author_meta( 'user_description', $post->post_author );

    if( $user_description ) :
        get_template_part('templates/about-author');
    endif;


    // If comments is open
    comments_template();
?>
