


    <?php


        if( function_exists( 'get_field' )  ) :

            if( get_field('hide_global_footer') !== true ) :
                bufet_footer_settings();
            endif;

        else:

            bufet_footer_settings();

        endif;




        // Including Footer 
        get_template_part('footer-clean');

    ?>
