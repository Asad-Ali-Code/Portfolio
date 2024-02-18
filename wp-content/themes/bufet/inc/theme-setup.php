<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! function_exists( 'bufet_theme_setup' ) ) :

	function bufet_theme_setup() {

		global $bufet;

		// Load the theme text domain
		load_theme_textdomain( 'bufet', get_template_directory() . '/lang' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add title tag
		add_theme_support( 'title-tag' );

		// Add post-thumbnails
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'post-formats', array(
			'quote',
			'video',
			'image',
			'audio',
		) );

		// Add theme support for gutenberg
		add_theme_support(
		    'gutenberg',
		    array( 'wide-images' => true )
		);

		add_theme_support( 'align-wide' );

	    add_image_size( 'bufet-post-img-small', 370, 235, true );
	    add_image_size( 'bufet-post-img-medium', 555, 350, true );
	    add_image_size( 'bufet-post-img-large', 1140, 600, true );
	    add_image_size( 'bufet-service-img-large', 1140, 600, true );
	    add_image_size( 'bufet-blog-thumb', 110, 69, true );

	    // Set content width
	    if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}

		$defaults = array(
			'default-color'          => '#f8f8f8',
		);
		add_theme_support( 'custom-background', $defaults );

		if( function_exists('register_nav_menus') ) {
			register_nav_menus( array(
				'primary-menu' => esc_html__('Primany Menu', 'bufet'),
			) );
		}


	}

endif;

add_action( 'after_setup_theme', 'bufet_theme_setup' );


function bufet_dd($var){
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
}


/**
 * Detect Homepage
 *
 * @return boolean value
 */
function bufet_detect_homepage() {
    // If front page is set to display a static page, get the URL of the posts page.
    $homepage_id = get_option( 'page_on_front' );

    // current page id
    $current_page_id = ( is_page( get_the_ID() ) ) ? get_the_ID() : '';

    if( $homepage_id == $current_page_id ) {
        return true;
    } else {
        return false;
    }

}




/**
 *
 * Scorn Hide Footer Top
 *
 */

function bufet_hide_footer_top() {

	global $bufet;

	$output = 'show';

	if ( isset( $bufet['footer_top_switch'] ) ) {

		if( $bufet['footer_top_switch'] == true ) {

			$output = 'show';

		} else {

			$output = 'hide';

		}

	}

	if( function_exists( 'get_field') ) {

		if( get_field( 'hide_footer_top' ) ) {

			$output = 'hide';

		}

	}

	return $output;

}


/**
 *
 * Scorn Hide Footer Top
 *
 */

function bufet_hide_footer_btm() {

	global $bufet;

	$output = 'show';

	if ( isset( $bufet['footer_bottom_switch'] ) ) {

		if( $bufet['footer_bottom_switch'] == true ) {

			$output = 'show';

		} else {

			$output = 'hide';

		}

	}

	if( function_exists( 'get_field') ) {

		if( get_field( 'hide_footer_bottom' ) ) {

			$output = 'hide';

		}

	}

	return $output;
}


add_filter( 'template_include', 'bufet_coming_soon', 99 );

function bufet_coming_soon( $template ) {

	global $bufet;

	if( isset( $bufet['coming_soon_mode'] ) ) {
		if( $bufet['coming_soon_mode'] == true ) {

			if( current_user_can('manage_options') ) {
				return $template;

			} else {
				$new_template = locate_template( array( 'templates/coming-soon.php' ) );
				if ( !empty( $new_template ) ) {
					return $new_template;
				}
			}
		}
	}

	return $template;

}


/**
 *
 * The posts loop pagination
 *
 */
function bufet_page_posts_loop( $template )
{
    if( have_posts() ) :

        while( have_posts() ) : the_post();

            get_template_part('templates/content', $template );

        endwhile;

    else:
        get_template_part('templates/no-post');
    endif;
}


/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function bufet_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_attr( $before ) . esc_attr__('Create a menu', 'bufet') . esc_attr($after) . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>" . $link ."</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<". esc_attr($container) ." class='". esc_attr($container_class) ."' id='". esc_attr($container_id) ."'>$output</". esc_attr($container) .">";
    }

    if ( $echo )
    {
        echo  $output;
    }

    return $output;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'bufet_loop_columns');

if (!function_exists('bufet_loop_columns')) {
	function bufet_loop_columns() {
		return 3; // 3 products per row
	}
}



/**
 *
 * WordPress link pages
 *
 */
function bufet_wp_link_pages() {

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bufet' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );

}


function bufet_get_pulled_sidebar($pull_class) {

	echo '<aside class="col-md-4 '. $pull_class .' widget_col">';

				if( is_active_sidebar('bufet_sidebar') ) :
					dynamic_sidebar( 'bufet_sidebar' );
				endif;

	echo '</aside>';
}

/**
 *
 * Add classes to post class by filting
 * @return $classes
 */

add_filter('post_class', 'bufet_post_class');

function bufet_post_class( $classes ) {

	global $bufet;

	$classes[] = 'single-blog-box';


	if( isset($bufet['blog_grid']))
		if( ! is_single() )
			$classes[] = $bufet['blog_grid'];

	return $classes;
}



/**
 *
 * Registering Google Fonts
 *
 */


 function bufet_google_fonts_url() {

    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'bufet' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;

}



/**
 *
 * Enqueuing Google Maps Script with  API key
 *
 */
function bufet_google_maps_js_script() {

	global $bufet;

	if( isset( $bufet['google-map-api-key'] ) ) {

		$api_key = $bufet['google-map-api-key'];
		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=' . $api_key, array('jquery'), null, true );

	}
}


/**
 * Registers an editor stylesheet for the theme.
 */
function bufet_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'bufet_theme_add_editor_styles' );


/**
 *
 * Building Comments Lists
 *
 */
function bufet_comments_list( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'tracback' :
        case 'pingback' : ?>

        <li <?php esc_attr( comment_class() ); ?> id="comment-<?php esc_attr( comment_ID() ); ?>">
		<p><span class="title"><?php esc_html_e( 'Pingback:', 'bufet' ); ?></span> <?php esc_url( comment_author_link() ); ?> <?php esc_url ( edit_comment_link( esc_html__( '(Edit)', 'bufet' ), '<span class="edit-link">', '</span>' ) ); ?></p>

        <?php break;
        default : ?>
		<li <?php esc_attr( comment_class() ); ?>  id="comment-<?php esc_attr(comment_ID() ); ?>">

			<div class="bufet-media clearfix">
				<div class="bufet-media-left">
					<a href="#">
					 	<?php echo get_avatar( $comment, 80 ); ?>
					</a>
				</div>
				<div class="bufet-media-body">
					<h4 class="media-heading"><?php esc_html( comment_author() ); ?></h4>

					<span class="time"><?php echo esc_html( the_time( get_option('date_format') ) );?> <?php  esc_html( comment_time() ); ?> </span>
					<div class="comments-body-text">
						<?php
							if( $comment->comment_approved  == 0 ) {
								esc_html_e('Your comment is awating for moderation.', 'bufet');
							} else {
								comment_text();
							}
						?>

					</div>

					<ul class="action-btns">

						<?php
							if( get_edit_comment_link() ) :
								echo '<li>';
									esc_url( edit_comment_link( esc_html__('Edit', 'bufet') ) );
								echo '</li>';
							endif;
						?>

						<li>
							<?php
								comment_reply_link( array_merge( $args, array(
									'reply_text' => esc_html__('Reply', 'bufet'),
									'after' => ' <span> </span>',
									'depth' => $depth,
									'max_depth' => $args['max_depth']
								) ) );
							?>
						</li>
					</ul>
				</div>
			</div>
		</li>

        <?php // End the default styling of comment
        break;
    endswitch;
}



function bufet_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];

	unset( $fields['comment'] );

	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'bufet_move_comment_field_to_bottom' );



function bufet_custom_comment_form_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('required_name_email');
	$aria_req = ($req ? " aria-required='true'" : ' ');

	$yourNamePlaceholder  = $aria_req ? esc_attr__('Name *', 'bufet') : esc_attr__('Name ', 'bufet');
	$yourEmailPlaceholder = $aria_req ? esc_attr__('Email *', 'bufet') : esc_attr__('Email ', 'bufet');
	$yourWebsitePlaceholder = $aria_req ? esc_attr__('Website *', 'bufet') : esc_attr__('Website ', 'bufet');

	$fields = array(
		'author' => '<div class="row"><div class="col-md-4"><div class="form-group">
					<label for="author">'. $yourNamePlaceholder .'</label>
					<input
						type="text"
						id="author"
						name="author"
						value="'. esc_attr( $commenter['comment_author'] ) .'"
						'. $aria_req .'
					></div></div>',

		'email' => '<div class="col-md-4"><div class="form-group">
					<label for="email">'. $yourEmailPlaceholder .'</label>
					<input
						type="email"
						id="email"
						name="email"
						value="'. esc_attr( $commenter['comment_author_email'] ) .'"
						'. $aria_req .'
					></div></div>',

		'url' => '<div class="col-md-4"><div class="form-group">
					<label for="website">'. $yourWebsitePlaceholder .'</label>
					<input
						type="url"
						id="url"
						name="url"
						value="'. esc_attr( $commenter['comment_author_url'] ) .'"
						'. $aria_req .'
					></div></div></div>',



	);

	return $fields;
}

add_filter('comment_form_default_fields', 'bufet_custom_comment_form_fields');

/**
 *
 * Shape Tag Cloud font size
 *
 */
function bufet_tag_cloud_widget($args) {
    $args['largest'] = 15; //largest tag
    $args['smallest'] = 15; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'bufet_tag_cloud_widget' );







/**
 * Get blog posts page URL.
 *
 * @return string The blog posts page URL.
 */
function bufet_get_blog_posts_page_url() {
	// If front page is set to display a static page, get the URL of the posts page.
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return esc_url(get_permalink( get_option( 'page_for_posts' ) ));
	}
	// The front page IS the posts page. Get its URL.
	return esc_url(get_home_url('/'));
}




// Apply filter
add_filter('body_class', 'bufet_set_body_class');

function bufet_set_body_class($classes) {

	global $bufet;

	if( isset( $bufet['back_to_top_btn'] ) && $bufet['back_to_top_btn'] == true ) {

		$classes[] = 'back-to-top';
	}

	if( isset( $bufet['preloader'] ) && $bufet['preloader'] == true ) {

		$classes[] = 'preloader-on';
	}

	if( isset( $bufet['google-map-api-key'] ) && $bufet['google-map-api-key'] == true ) {

		$classes[] = 'has-google-map-key';
	}

	return $classes;
}


/**
 * Set header class dynamically
 *
 */
function bufet_set_header_class() {

	// Globalizing theme options variables
	global $bufet;

    // Get the homepage ID
    $homepage_id = get_option( 'page_on_front' );

    // current page id
    $current_page_id = ( is_page( get_the_ID() ) ) ? get_the_ID() : '';



    $output_class = array();
    $output_class[] = 'header-area';



    //
    // If get_field function is exsits
    // This functions active when ACF is active
    //
    if( function_exists('get_field') ) {

    	/*----------  Header Positions for specific page  ----------*/
    	if( get_field('header_color_scheme') ) {

		    if( ($key = array_search($bufet['header_layout'], $output_class)) !== false) {
		        unset($output_class[$key]);
		    }


			$output_class[] = get_field('header_color_scheme');


    	}


    }

    return $output_class;

}
/**
 * Set footer class dynamically
 *
 */
function bufet_set_sidemenu_clas() {

	// Globalizing theme options variables
	global $bufet;


    $output_class = array();
    $output_class[] = 'mainmenu-expand';

	$header_layout = ( isset( $bufet['header_layout'] ) ) ?  $bufet['header_layout'] : 'header_white';


    //
    // If get_field function is exsits
    // This functions active when ACF is active
    //
    if( function_exists('get_field') ) {

    	/*----------  Header Positions for specific page  ----------*/
    	if( get_field('header_color_scheme') ) {

		    if( ($key = array_search($bufet['header_layout'], $output_class)) !== false) {
		        unset($output_class[$key]);
		    }

			$output_class[] = get_field('header_color_scheme');


    	}


    }

    return $output_class;

}


/**
 * Set footer class dynamically
 *
 */
function bufet_set_footer_class() {

	// Globalizing theme options variables
	global $bufet;


    $output_class = array();
    $output_class[] = 'footer-area';



    //
    // If get_field function is exsits
    // This functions active when ACF is active
    //
    if( function_exists('get_field') ) {

    	/*----------  Header Positions for specific page  ----------*/
    	if( get_field('footer_color_scheme') ) {

		    if( ($key = array_search($bufet['footer_color_schema'], $output_class)) !== false) {
		        unset($output_class[$key]);
		    }

			$output_class[] = get_field('footer_color_scheme');

    	}


    }

    return $output_class;

}




//
// Get the site logo for Bufet
//
function bufet_get_site_logo() {

    global $bufet;

    $logo = '';
    $logo_url = '';

    $custom_logo = get_post_meta( get_the_ID(), 'use_custom_logo', true );
    $page_logo = get_post_meta( get_the_ID(), 'select_logo', true );

    if( $custom_logo ) {
		$img_url = wp_get_attachment_image_src( $page_logo );
        $logo_url = esc_url( $img_url[0] );
    } else if( isset( $bufet['logo'] ) ) {
        $logo_url = esc_url( $bufet['logo']['url'] );
    } else {
        $logo_url = get_template_directory_uri() .'/assets/img/logo/logo.png';
    }


    $logo .= '<img src="'. $logo_url .'" alt="'. get_bloginfo('title') .'">';

    return $logo;
}



function bufet_footer_settings() {

	$bufet = get_option('bufet');


	if( isset( $bufet['use_custom_footer_template'] ) ) {
		if( $bufet['use_custom_footer_template'] == true ) {

			$post_id = $bufet['footer_section'];

			// Query for blog posts
			$args = array(
				'post_type' => 'kc-section',
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

	} else {

		echo '<section class="footer-area">
	          <div class="container">
	            <div class="row">';

					if( is_active_sidebar('footer_widget') ) {
						dynamic_sidebar('footer_widget');
					}

	    echo   '</div>
	          </div>
	        </section>';
	}

}


function bufet_header_classes() {
	global $post, $bufet;

	$class_attr_start = 'class="';

	$output_class = array('header-top', 'headroom');
	$output_class_str = '';

	if ( $post ) {

		$use_custom_header = get_post_meta( $post->ID, 'use_custom_header', true);
		$choose_header_color_style = get_post_meta( $post->ID, 'choose_header_color_style', true);

		if( $use_custom_header == true ) {
			$output_class[] = $choose_header_color_style;
		} else {
			if( isset( $bufet['menu_scheme']  ) ) {
				$output_class[] = $bufet['menu_scheme'];
			}
		}
	}

	if( isset( $bufet['header_stay_up'] ) && $bufet['header_stay_up'] == true ) {
		$output_class[] = 'headroom-remove-unpinned';
	}


	$output_class_str = implode(' ', $output_class);

	$class_attr_end = '"';


	return $class_attr_start . $output_class_str . $class_attr_end;

}


/**
 *
 * One click demo Installation for Buffet theme
 *
 */

function bufet_import_files() {
  return array(
    array(
      'import_file_name'           => 'Buffet',
      'local_import_file'            => BUFET_INC_DIR . '/demo-contents/bufet_content.xml',
      'import_preview_image_url'   => 'http://themes.dhrubok.website/wp-demos/bufet-demo/screenshot.png',
      'import_notice'              => esc_html__( 'After importing the demo, you need set your preferred homepage layout from ', 'bufet') .
      		'<a href="'. trailingslashit( esc_url( home_url('/') ) ) .'wp-admin/options-reading.php">'. esc_html__('here', 'bufet') .'</a>',
    ),
    array(
      'import_file_name'           => 'Buffet (RTL)',
      'local_import_file'            => BUFET_INC_DIR . '/demo-contents/bufet_content_rtl.xml',
      'import_preview_image_url'   => 'http://themes.dhrubok.website/wp-demos/bufet-demo/screenshot_rtl.png',
      'import_notice'              => esc_html__( 'After importing the demo, you need set your preferred homepage layout from ', 'bufet') .
      		'<a href="'. trailingslashit( esc_url( home_url('/') ) ) .'wp-admin/options-reading.php">'. esc_html__('here', 'bufet') .'</a>',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'bufet_import_files' );
