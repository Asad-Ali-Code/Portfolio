<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="social-links">
        <?php foreach ($icons as $icon) {
            $link = kc_parse_link($icon->link);

            printf(
                '<a href="%s" %s><span class="%s"></span></a>',
                esc_url( $link['url'] ),
                ($link['target']) ? 'target="'.esc_attr( $link['target'] ).'"' : '',
                esc_attr( $icon->icon )
            );
        } ?>

    </div>
</div>
