<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <?php
        printf(
            '<div class="video-area-bg wow %s" data-wow-duration="%s" data-wow-delay="%s">',
            esc_attr($animation_name),
            esc_attr($animation_duration),
            esc_attr($animation_delay)
        );

        printf('<a class="mfp-iframe video-play-btn venobox" href="%s" data-vbtype="video" data-autoplay="true"></a>', esc_attr( $vid_url ));
        printf('<h4>%s</h4>', esc_html( $watch_vid_btn_label ));

        echo '</div>';
    ?>


</div>
