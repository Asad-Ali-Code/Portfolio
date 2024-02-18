<?php
        if( has_post_format() ) :

            if( file_exists( get_template_directory() . '/templates/contents/post-format-'. get_post_format() .'.php' ) ) {
                get_template_part('templates/contents/post-format', get_post_format());
            } else {
                get_template_part('templates/contents/post-format', 'default');
            }

        else:

            get_template_part('templates/contents/post-format', 'default');

        endif;
?>
