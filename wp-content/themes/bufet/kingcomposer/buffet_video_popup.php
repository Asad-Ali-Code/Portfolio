<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

    $img = wp_get_attachment_image_src($bg_image, 'full');

?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="video-demo-image">
        <div class="overlay-grad-one">
            <img src="<?php echo esc_url($img[0]) ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-responsive center-block">
        </div>
        <div class="mfp-iframe video-play-icon "  >
            <a class="venobox" href="<?php echo esc_url( $video_url ); ?>"
            target="_blank" data-vbtype="video" data-autoplay="true"><span></span>
            </a>
            <p><?php echo esc_html( $title ); ?></p>
        </div>
    </div>
</div>
