
    <?php

        // Including Header
        get_template_part('header-clean');


        if( function_exists( 'get_field' )  ) :

            if( get_field('hide_global_header') !== true ) :

                echo get_template_part('templates/headers/default');

            endif;

        else:

            echo get_template_part('templates/headers/default');

        endif;
    ?>
 
