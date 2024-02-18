<div <?php echo post_class(); ?>>
    <?php


		$content = apply_filters( 'the_content', get_the_content() );
		$audio   = false;

    		// Only get audio from the content if a playlist isn't present.
    		$audio = get_media_embedded_in_content( $content, array( 'iframe', 'object', 'embed', 'audio') );

        if ( ! is_single() ) {

            // If not a single post, highlight the audio file.
			if ( ! empty( $audio ) ) {
				foreach ( $audio as $audio_html ) {
					echo '<div class="embed-content">';
						echo  $audio_html;
					echo '</div><!-- .entry-audio -->';
				}
			};
        } else if( has_post_thumbnail() ) :
            echo '<div class="single-blog-image">';
                echo '<a href="'. esc_url( get_the_permalink() ) .'">';
                    the_post_thumbnail();
                echo '</a>';
            echo '</div>';
        endif;

    ?>



    <div class="post-meta clearfix">

        <?php get_template_part('templates/content', 'post-meta'); ?>

    </div>
    <div class="blog-heading">
        <?php
            printf('<a href="%s"><h2>%s</h2></a>', esc_url( get_the_permalink() ), esc_html( get_the_title() ) );
        ?>
    </div>
    <?php
        if( has_excerpt() ) :
        echo '<div class="blog-excerpt">';
            the_excerpt();
        echo '</div>';
        endif;
    ?>
</div>
