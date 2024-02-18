<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

    $button = kc_parse_link($button);

?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <?php
        printf('<div class="single-pricing-table">' );
    ?>
		<div class="pricing-heading">
			<h2><?php echo esc_html($title); ?></h2>
		</div>

		<?php
            // Don't need to use esc_html here
            // Because HTML markup will be used here
            printf('<div class="pricing-content">%s</div>', $content_table);
        ?>

       	<div class="pricing-amount">
          <sup><span class="currency"><?php echo esc_html($currency); ?></span></sup>
          <span class="price">
              <?php echo esc_html($price); ?>
          </span>
          <span class="subscription">
              <?php echo esc_html($duration); ?>
          </span>
       </div>
       <?php printf('<a class="pricing-btn blue-btn" href="%s" target="%s">%s</a>', $button['url'], $button['target'], $button['title']) ?>
	</div>
</div>
