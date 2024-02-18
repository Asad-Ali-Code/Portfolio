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
            '<a href="%s" class="bufet-btn wow %s" data-wow-duration="%s" data-wow-delay="%s" target="%s">%s</a>',
            esc_url($btn_url),
            esc_attr($animation_name),
            esc_attr($animation_duration),
            esc_attr($animation_delay),
            esc_attr($btn_target),
            esc_html($btn_text)
        );
    ?>
</div>
