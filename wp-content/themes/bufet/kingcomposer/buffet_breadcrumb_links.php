<?php
    global $bufetObj;

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

    <div class="buffet-breadcrumb-links breadcrumb-two">
          <?php
              echo $bufetObj->bufet_breadcrumbs();
          ?>
    </div>

</div>
