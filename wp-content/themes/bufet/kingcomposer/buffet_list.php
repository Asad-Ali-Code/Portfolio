<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="about-list">
		<ul>
			<?php
                foreach($lists as $list ) :
                    printf(
                        '<li>%s</li>',
                        esc_attr($list->text)
                    );
                endforeach;
            ?>
		</ul>
	</div>
</div>
