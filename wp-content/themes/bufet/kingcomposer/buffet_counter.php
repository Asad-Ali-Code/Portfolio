<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="single-items">

        <?php
            // Print the counter number
            printf('<h2><span class="counter">%s</span>%s</h2>', esc_html( $number ), esc_html( $after_number_text ));

            // Print the icon
            printf('<div class="icon-bg"><span class="%s"></span></div>', esc_attr( $icon ) );

            // Print the title
            printf('<h4>%s</h4>', esc_html( $title ) );
        ?>

    </div>
</div>
