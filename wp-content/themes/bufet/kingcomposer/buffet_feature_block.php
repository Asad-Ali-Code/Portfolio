<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

    $img = wp_get_attachment_image_src($image, 'full');

?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <?php
        printf(
            '<div class="single-feature wow">'
        );

        echo '<span class="counter-number">'. esc_html( $counter_number ) .'</span>';
    ?>

        <?php
            if( $image ) :
                echo '<div class="feature-img">';
                printf(
                    '<i class="%s"></i>',
                    esc_attr( $image ),
                    esc_attr( $title )
                );
                echo '</div>';
            endif;
        ?>

        <?php
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
