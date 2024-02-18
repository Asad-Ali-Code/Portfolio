<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="single-address">
        <div class="address-icon-bg">
            <span class="<?php echo esc_attr( $icon ); ?>"></span>
        </div>
        <?php printf('%s', $address ); ?>
    </div>
</div>
