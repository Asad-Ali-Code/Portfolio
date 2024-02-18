<div <?php echo post_class(); ?>>
    <?php
        if( has_post_thumbnail() ) :
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

        echo '<div class="blog-excerpt">';
            the_excerpt();
        echo '</div>';
    ?>
</div>
