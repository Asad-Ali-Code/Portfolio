<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">

        <div class="team-carosule-single-item">
            <?php
              $img = wp_get_attachment_image_src($image, 'full');
              printf('<img src="%s" alt="%s">', $img[0], $name);
            ?>
            <div class="team-meta">
                <h4><?php echo esc_html($name); ?></h4>
                <p><?php echo esc_html($job_title); ?></p>
            </div>
            <div class="team-overlay">
                <h5><?php echo esc_html($name); ?></h5>
                <p class="meta-p"><?php echo esc_html($job_title); ?></p>
                <div class="team-social-links">
                    <div class="social-links">
                        <?php
                            foreach( $socials as $social ) {
                                printf('<a href="%s" target="_blank"><span class="%s"></span></a>', esc_url($social->link), esc_attr($social->icon));
                            }
                        ?>


                    </div>
                </div>
            </div>
        </div>
</div>
