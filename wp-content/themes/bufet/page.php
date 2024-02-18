<?php
get_header();

// Globalizing theme class
global $bufetObj;

echo  $bufetObj->bufet_breadcrumb_bridge();
?>


<!-- blog AREA  -->

<section class="latest-blog-area">
        <div class="container">
            <div class="row">

                    <?php
                        if( have_posts() ) :
                            while( have_posts() ) :
                                the_post();

                    ?>
                    <div <?php echo post_class(); ?>>
                        <?php
                            if( has_post_thumbnail() ) :
                                the_post_thumbnail();
                            endif;
                        ?>

                        <div class="blog-box-content clearfix">

                            <?php

                                echo the_content();

                                // Show pagination if split the post into pages

                            ?>

                        </div>

                    </div>

                    <?php

                        // If has inner pages link
                        esc_url( bufet_wp_link_pages() );

                        // If comments is open
                        comments_template();
                    ?>


                <?php endwhile; endif; ?>


            </div>
        </div>



    </section>

<?php
get_footer();
?>
