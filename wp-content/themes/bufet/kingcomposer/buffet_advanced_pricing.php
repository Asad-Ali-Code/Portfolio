<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}


?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="row">
        <div class="col-md-12">
            <nav class="pricing-tab">

                <span class="monthly_tab_title">
                    <?php echo esc_html($monthly_tab_title); ?>
                </span>
                <span class="pricing-tab-switcher"></span>
                <span class="annual_tab_title">
                    <?php echo esc_html($annual_tab_title); ?>
                </span>

            </nav>
            <!-- section tab end -->
        </div>
    </div>

    <div class="row advanced-pricing-table">
        <?php
            foreach( $pricing_tables as $table ) :

            $button = kc_parse_link($table->button);

        ?>
            <div class="<?php echo esc_attr($pricing_layout); ?>">

                <?php
                    printf(
                        '<div class="single-pricing-table wow %s" data-wow-delay="%s" data-wow-duration="%s">',
                        $table->animation_name,
                        $table->animation_delay,
                        $table->animation_duration
                    );
                ?>
                    <div class="pricing-heading">
                        <h2><?php echo esc_html($table->title); ?></h2>
                    </div>

                    <?php
                        // Don't need to use esc_html here
                        // Because HTML markup will be used here
                        printf('<div class="pricing-content">%s</div>', $table->content_table);
                    ?>

                    <div class="pricing-amount ">
                        <div class="monthly_price">
                            <sup><span class="currency"><?php echo esc_html($table->currency); ?></span></sup>
                            <span class="price">
                                <?php echo esc_html($table->monthly_price); ?>
                            </span>
                            <span class="subscription">
                                <?php echo esc_html($table->monthly_duration_text); ?>
                            </span>
                        </div>
                        <div class="annual_price">
                            <sup><span class="currency"><?php echo esc_html($table->currency); ?></span></sup>
                            <span class="price">
                                <?php echo esc_html($table->annual_price); ?>
                            </span>
                            <span class="subscription">
                                <?php echo esc_html($table->annual_duration_text); ?>
                            </span>
                        </div>
                   </div>

                   <?php printf('<a class="pricing-btn blue-btn" href="%s" target="%s">%s</a>', $button['url'], $button['target'], $button['title']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
