<?php
/*
/ @Template : Coming Soon
/ @Theme : Bufet
*/



get_template_part('header-clean');

    $bufet = get_option('bufet');

    if( isset( $bufet["coming_soon_page"] ) ) {

        $post_id = $bufet['coming_soon_page'];

        $args = array(
			'post_type' => 'page',
			'posts_per_page'   => 1,
			'p' => $post_id
		);

		$posts = new WP_Query( $args );

		if( $posts->have_posts() ) :
			while( $posts->have_posts() ) :
				    $posts->the_post();

					the_content();

			endwhile;
		endif;
    }


get_footer();

?>
