<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

    <div class="slider-wrapper-2">
        <?php

                foreach($screenshots as $screenshot ) :
                    $slider_img = wp_get_attachment_image_src($screenshot->slider_image, 'full');


                    echo '<div class="slide one">';
                        echo '<div class="slider-image">';

                            printf(
                                '<img src="%s" alt="%s">',
                                esc_url($slider_img[0]),
                                esc_attr('Text')
                            );

                            if( $screenshot->use_popup == 'yes' ) :

                                $popup_img = wp_get_attachment_image_src($screenshot->popup_image, 'full');

                                $popup_image = ( $screenshot->select_popup_image == 'use_same_image' ) ? $slider_img[0] : $popup_img[0];


                                echo '<div class="preview-icon">';
                                    printf('<a  href="%s" class="venobox" data-gall="gallery-1"><span class="ti-fullscreen"></span></a>', esc_url( $popup_image ));
                                echo '</div>';

                            endif;

                        echo '</div>';
                    echo '</div>';
                endforeach;

        ?>






    </div>

</div>
