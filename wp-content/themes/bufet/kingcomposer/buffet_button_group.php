<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="button-group store-buttons">
			<?php
                foreach($buttons as $button ) :

                    $link = kc_parse_link( $button->link );


	                printf(
                        '<a href="%s" %s class="btn-style-2 "><span class="%s"></span><p class="dsp-tc">%s</p> </a>',
                        esc_url($link['url']),
                        ($link['target']) ? 'target="'. esc_attr( $link['target'] ) .'"' : '',
                        esc_attr( $button->icon ),
                        $button->text
                    );

                endforeach;
            ?>
	</div>
</div>
