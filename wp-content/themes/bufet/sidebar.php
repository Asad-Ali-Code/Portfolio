<?php
    echo '<div class="blog-sidebar">';
        if( is_active_sidebar('bufet_sidebar') ) :
            dynamic_sidebar('bufet_sidebar');
        endif;
    echo '</div>';
?>
