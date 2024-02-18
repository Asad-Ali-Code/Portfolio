<?php
get_header();

// Globalizing theme class
global $bufetObj;

echo  $bufetObj->bufet_breadcrumb_bridge();

$bufet = get_option('bufet');

$grid = ($bufet['blog_grid']) ? $bufet['blog_grid'] : 'one-column';

?>


<!-- blog AREA  -->

<section class="latest-blog-area" >
        <div class="container">
            <div class="row">

                <?php

                    if( isset( $bufet['blog_layout'] ) ) :
                        if( $bufet['blog_layout'] == 'fullpage' ) :

                            $bufetObj->thePostLoop('col-md-12', $grid, true);

                        elseif(  $bufet['blog_layout'] == 'right-sidebar' ) :

                            $bufetObj->thePostLoop('col-md-8', $grid);

                            $bufetObj->getPulledSidebar('col-md-4');

                        elseif(  $bufet['blog_layout'] == 'left-sidebar' ) :

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
