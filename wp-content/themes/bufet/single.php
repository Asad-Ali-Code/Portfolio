<?php
get_header();

// Globalizing theme class
global $bufetObj;

echo  $bufetObj->bufet_breadcrumb_bridge();

$bufet = get_option('bufet');
$grid = 'content-single';

$theme_page_layout = 'right-sidebar';

// Get page meta options
$use_custom_page_layout = get_post_meta(get_the_ID(), 'use_custom_page_layout', true);
$custom_page_layout = get_post_meta(get_the_ID(), 'select_custom_layout', true);

// If the single page layout set from theme options
if ( isset($bufet['single_page_layout'] ) ) {
    $theme_page_layout = $bufet['single_page_layout'];
}

// If the custom page layout is true
if(  $use_custom_page_layout == true ) {
    $theme_page_layout = $custom_page_layout;
}


?>


<!-- blog AREA  -->

<section class="latest-blog-area">
        <div class="container">
            <div class="row">

                <?php

                    if( isset( $bufet['single_page_layout'] ) ) :
                        if( $theme_page_layout == 'fullpage' ) :

                            $bufetObj->thePostLoop('col-md-12', $grid, true);

                        elseif(  $theme_page_layout == 'right-sidebar' ) :

                            $bufetObj->thePostLoop('col-md-8', $grid);

                            $bufetObj->getPulledSidebar('col-md-4');

                        elseif(  $theme_page_layout == 'left-sidebar' ) :

                            $bufetObj->thePostLoop('col-md-8 col-md-push-4', $grid);

                            $bufetObj->getPulledSidebar('col-md-4 col-md-pull-8');

                        endif;

                    else:
                        $bufetObj->thePostLoop('col-md-8', $grid);

                        $bufetObj->getPulledSidebar('col-md-4');
                    endif;

                ?>


            </div>
        </div>
</section>

<?php
get_footer();
?>
