<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

    <section class="homepage-slider-area homepage-6">
        <div class="slider-wreapper">
            <?php foreach( $sliders as $slide ) : ?>
                <div class="slider-single-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content-table">
                                    <div class="slider-content-table-cell">
                                        <div class="slider-content">
                                            <?php
                                                // Print title
                                                printf(
                                                    '<h1 class="wow %s" data-wow-duration="1s" data-wow-delay=".50s">%s</h1>',
                                                    esc_attr( $slide->title_animation_name ),
                                                    esc_html( $slide->title )
                                                );

                                                // Print subtitle
                                                printf(
                                                    '<p class="wow %s" data-wow-duration="1s" data-wow-delay=".3s">%s</p>',
                                                    esc_attr( $slide->subtitle_animation_name ),
                                                    esc_html( $slide->subtitle )
                                                );


                                                $target = ($slide->btn_target == 'yes') ? '_blank' : '';

                                                // Print button
                                                if( $slide->btn_text ) {
                                                    printf(
                                                        '<a class="slider-button all-btn wow %s" data-wow-duration="1s" data-wow-delay=".10s" href="%s" target="%s">%s</a>',
                                                        esc_attr( $slide->btn_animation_name ),
                                                        esc_attr( $slide->btn_url ),
                                                        esc_attr( $target ),
                                                        esc_html( $slide->btn_text )
                                                    );
                                                }

                                            ?>

                                        </div>
                                        <div class="video-area-bg wow fadeInUp" data-wow-duration="1s" data-wow-delay=".45s" >
                                            <a class="mfp-iframe video-play-btn venobox vbox-item" data-vbtype="video" data-autoplay="true" href="<?php echo esc_attr( $slide->vid_url ); ?>"></a>
                                            <h4><?php echo esc_html( $slide->watch_vid_btn_label ); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-screen-8">
                                <?php
                                    $slider_img = wp_get_attachment_image_src($slide->image, 'full');

                                    printf(
                                        '<img src="%s" alt="%s" class="wow %s" data-wow-duration="1s" data-wow-delay=".75s">',
                                        esc_url( $slider_img[0] ),
                                        esc_attr( $slide->title ),
                                        esc_attr( $img_animation_name )
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </section>
</div>
