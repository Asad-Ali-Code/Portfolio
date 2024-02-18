<?php
/*
Template name: Template: Page builder

*/
get_header();
?>

    <div class="page_builder_wrapper">

            <?php
                if( have_posts() ) :
                    while( have_posts() ) :

                        the_post();

                        the_content();

                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
    </div>


<?php
get_footer();
?>
