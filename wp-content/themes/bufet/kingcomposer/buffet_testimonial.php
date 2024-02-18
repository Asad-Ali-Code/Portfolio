<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="testi-carousel">

        <?php foreach( $testimonials as $testimonial ) : ?>
            <div class="testi-single-item">
                <div class="item-inner">
                    <div class="testimonial-meta">
                      <?php
                        $img = wp_get_attachment_image_src($testimonial->image, 'full');
                        printf('<img src="%s" alt="%s">', $img[0], $testimonial->name);
                      ?>
                      <h4><?php echo esc_html( $testimonial->name ); ?></h4>
                      <span><?php echo esc_html( $testimonial->designatoin ); ?></span>

                    </div>
                    <p>“<?php echo esc_html( $testimonial->testimonial ); ?>”</p>


                      <div class="testimonial-rating">
                          <?php for($i=1; $i <= $testimonial->rating_star; $i++) : ?>
                              <i class="fa fa-star"></i>
                          <?php endfor; ?>
                      </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="slider-btns">
        <button class="testi-nav-left"><span class="ti-angle-left"></span></button>
        <button class="testi-nav-right"><span class="ti-angle-right"></span></button>
    </div>
</div>
