<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="single-advance <?php if( $hove_style == 'yes' ) echo 'hover_active'; ?>">
        <?php
            // Print icon
            printf(
                '<span class="%s"></span>',
                esc_attr( $icon )
            );

            // Print title
            printf(
                '<h2>%s</h2>',
                esc_html( $title )
            );

            // Print description
            printf(
                '<p>%s</p>',
                esc_html( $desc )
            );

        ?>
	</div>
</div>
