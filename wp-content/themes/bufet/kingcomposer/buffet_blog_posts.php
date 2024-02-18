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

		global $bufetObj;

        // Query for blog posts
        $args = array(
            'post_type' => 'post',
            'posts_per_page'   => $limit,
	        'orderby'   => $orderby,
	        'order'   => $order,
        );

        $posts = new WP_Query( $args );

        if( $posts->have_posts() ) :

            $animation_delay = 0.2;


        	while( $posts->have_posts() ) :
        		$posts->the_post();

        		$post_permalink = get_the_permalink();

	?>
        <div class="<?php echo esc_attr( $grid ); ?>">
            <?php
                if( has_post_format() ) :

                    if( file_exists( get_template_directory() . '/templates/contents/post-format-'. get_post_format() .'.php' ) ) {
                        get_template_part('templates/contents/post-format', get_post_format());
                    } else {
                        get_template_part('templates/contents/post-format', 'default');
                    }

                else:

                    get_template_part('templates/contents/post-format', 'default');

                endif;
            ?>
        </div>

    <?php

                $animation_delay = $animation_delay + 0.1;
            endwhile;

        endif;
    ?>
</div>
