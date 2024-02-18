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
        foreach($faqs as $faq) :

            $faq_open = ($faq->open_toggle == 'yes') ? 'is-open' : '';

            printf(
                '<article class="beefup example-opensingle %s " >',
                esc_attr( $faq_open )
            );
    ?>

            <h4 class="beefup__head">
              <?php echo esc_html( $faq->question ); ?>
               <span class="ti-angle-down"></span>
            </h4>

            <div class="beefup__body" >
                <p><?php echo esc_html( $faq->answer ); ?>
                </p>
            </div>
        </article>
    <?php endforeach; ?>
</div>
