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

    <section class="blog-full-page-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="blog-page-content-table">
              <div class="blog-table-cell">


                  <?php

                      if( $select_title_type == 'post_page_title' ) {
                          echo '<h2 class="breadcrumb_title">' . get_the_title() . '</h2>';
                      } else if( $select_title_type == 'custom_title' ) {
                          echo '<h2 class="breadcrumb_title">' . esc_html( $title ) . '</h2>';
                      }


                      echo  $bufetObj->bufet_breadcrumbs();

                  ?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
