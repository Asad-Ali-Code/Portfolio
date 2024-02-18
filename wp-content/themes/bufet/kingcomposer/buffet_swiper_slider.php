<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <!-- Swiper -->
  <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php foreach( $slides as $slide ) :
            $popup_img = wp_get_attachment_image_src($slide->image, 'full');
            printf('<div class="swiper-slide" style="background-image:url(%s)"></div>', $popup_img[0]);
        endforeach; ?>
      </div>

      <!--  navigation buttons -->
      <div class="swper-btn">
          <button class="icon-prev "><span class="ti-angle-left"></span></button>
          <button class="icon-next "><span class="ti-angle-right"></span></button>
      </div>
  </div>
</div>
