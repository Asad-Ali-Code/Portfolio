<?php

    $list_before = '<span class="meta-info-list">';
    $list_after = '</span>';

?>

<div class="posted-by pull-left">
    <?php
         // If the post is sticky
        if( is_sticky() ) {
            echo  '<span class="meta-info-list featured-post">';
                echo '<span class="ti-pin icon"></span> '. esc_html__('Sticky', 'bufet');
            echo  $list_after;
        }


        echo  $list_before;

            echo '<a href="'. get_the_permalink() .'"><span class="ti-user icon"></span>';
            echo esc_html( the_time( get_option('date_format') ) ) ;
            echo '</a>';

        echo  $list_after;

        // Get the tag list
        $tag_list = get_the_tag_list( '', esc_html__( ', ', 'bufet' ) );
        if ( $tag_list ) {

            echo  $list_before;
                echo '<span class="ti-tag icon"></span>'. esc_html__('Tags: ', 'bufet');
                echo  $tag_list;
            echo  $list_after;
        }

?>
</div>
<div class="post-date pull-right">
    <p>
        <?php
        if( comments_open() ) :
            echo '<span class="ti-comment"></span>';
            comments_popup_link(
                esc_html__('0', 'bufet'),
                esc_html__('1', 'bufet'),
                esc_html__('%', 'bufet')
            );
        endif;
        ?>
    </p>
</div>
