<?php

    wp_enqueue_script('mailchimp-validate');

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

    <?php if( $form_style == 'style-1' ) : ?>

        <div class="subscribe-box">
            <form action="<?php echo esc_attr( $form_url ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                <div class="mc-field-group">
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="<?php echo esc_attr($input_field_text); ?>">
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div aria-hidden="true" class="make-hidden"><input type="text" name="b_2a518b6246cfa8394d6942a1f_b3eb93b902" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="<?php echo esc_attr($submit_btn_value); ?>" name="subscribe" id="mcs-embedded-subscribe" class="button"></div>
                </div>
            </form>
        </div>

    <?php else: ?>

        <form action="<?php echo esc_attr( $form_url ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate subscribe-form-style-2" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
            <div class="mc-field-group">
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="<?php echo esc_attr($input_field_text); ?>">
            </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div aria-hidden="true"  class="make-hidden"><input type="text" name="b_2a518b6246cfa8394d6942a1f_b3eb93b902" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="<?php echo esc_attr($submit_btn_value); ?>" name="subscribe" id="mcs-embedded-subscribe" class="button"></div>
            </div>
        </form>

    <?php endif; ?>
</div>

<?php wp_enqueue_script( 'mailchimp-validate'); ?>
