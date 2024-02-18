<?php
class Bufet_Recent_Posts_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
      $widget_options = array(
        'classname' => 'bufet_recent_posts_Widget',
        'description' => 'This widget will show latest post with thumbnail.',
      );
      parent::__construct( 'bufet_recent_posts_Widget', 'Buffet Recent Posts', $widget_options );
    }


    public function widget( $args, $instance ) {
      $title = apply_filters( 'widget_title', $instance[ 'title' ] );
      $show_post_date = apply_filters( 'widget_show_post_date', $instance[ 'show_post_date' ] );
      $ppp = ( ! empty( $instance[ 'ppp' ] ) ? $instance[ 'ppp' ] : -1 );

      echo  $args['before_widget'] . $args['before_title'] . esc_html( $title ) . $args['after_title'];

            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $ppp,
            );

            $query = new WP_Query( $query_args );

            if ( $query->have_posts() ) {

                while ( $query->have_posts() ) {
                    $query->the_post(); ?>


                        <div class="row">
                            <div class="col-xs-5">
                                <div class="blog-recent-post-image-1">
                                    <?php
                                        $thumb_id = get_post_thumbnail_id(get_the_ID());
                                        $img = wp_get_attachment_image_src($thumb_id, 'blog-thumb');

                                        if( has_post_thumbnail() ) :
                                            printf('<a href="%s"><img src="%s" alt="%s" /></a>', get_the_permalink(), $img[0], get_the_title());
                                        else :
                                            printf('<a href="%s"><img src="%s" class="blog-widget-post-thumb" alt="%s" /></a>', get_the_permalink(), get_template_directory_uri() . '/assets/img/blog-thumb-placeholder.png', get_the_title());
                                        endif;

                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-7 blog-widget-content">
                                <div class="blog-recent-post-content">
                                    <p>
                                        <?php
                                            if( $show_post_date == 'on' ) :
                                                echo esc_html( the_time( get_option('date_format') ) ) ;
                                            endif;
                                        ?>
                                    </p>
                                    <a href="<?php the_permalink() ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            </div>
                        </div>


                    <?php

                }
            }

      echo  $args['after_widget'];
    }

    public function form( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
      $show_post_date = ! empty( $instance['show_post_date'] ) ? $instance['show_post_date'] : '';
      $ppp = ! empty( $instance['$ppp'] ) ? $instance['$ppp'] : 5;

      ?>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'bufet'); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </p>

      <p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'show_post_date' ) ); ?>"><?php esc_html_e('Display Post Date?', 'bufet'); ?></label>
          <input
                type="checkbox"
                id="<?php echo esc_attr( $this->get_field_id('show_post_date') ) ?>"
                name="<?php echo esc_attr( $this->get_field_name('show_post_date') ) ?>"
                <?php  if( $show_post_date == 'on' ) { echo ' checked'; } ?>
            >
      </p>

      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'ppp' ) ); ?>"><?php esc_html_e('Post per page:', 'bufet'); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ppp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ppp' ) ); ?>" value="<?php echo esc_attr( $ppp ); ?>" />
      </p>

      <?php
    }
    public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'ppp' ] = strip_tags( $new_instance[ 'ppp' ] );
      $instance[ 'show_post_date' ] = strip_tags( $new_instance[ 'show_post_date' ] );
      return $instance;
    }

}

?>
