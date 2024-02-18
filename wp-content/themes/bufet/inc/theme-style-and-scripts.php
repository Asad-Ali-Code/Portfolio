<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Enqueue style and scripts
 *
 */
function bufet_style_scripts() {


	//
	// Enqueueing  Stylesheet files
	//
	wp_enqueue_style( 'bufet-google-fonts', bufet_google_fonts_url(), array(), null );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'elements', get_template_directory_uri() . '/assets/css/elements.css', array('kc-animate') );

	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css' );

	wp_enqueue_style( 'preloader', get_template_directory_uri() . '/assets/css/preloader.css' );

	wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/venobox.css' );

	wp_enqueue_style( 'bufet-stylesheet', get_stylesheet_uri() );

	wp_register_style( 'mailchimp-style', '//cdn-images.mailchimp.com/embedcode/classic-10_7.css' );

	wp_enqueue_style( 'bufet-main', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_style( 'bufet-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

	wp_enqueue_style( 'bufet-blog', get_template_directory_uri() . '/assets/css/blog.css' );

	wp_dequeue_style( 'kc-animate' );



	//
	// Enqueueing JavaScript files
	//
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );

	bufet_google_maps_js_script();

	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/assets/js/headroom.js', array('jquery'), null, true );

	wp_enqueue_script( 'bufet-map-1', get_template_directory_uri() . '/assets/js/map.js', array('jquery'), null, true );

	wp_register_script( 'mailchimp-validate', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array('jquery'), null, true );

	wp_enqueue_script( 'date-countdown', get_template_directory_uri() . '/assets/js/date-countdown.js', array('jquery'), null, true );

	wp_enqueue_script( 'prettysocial', get_template_directory_uri() . '/assets/js/prettysocial.js', array('jquery'), null, true );

	wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/js/venobox.js', array('jquery'), null, true );

	wp_enqueue_script( 'beefup', get_template_directory_uri() . '/assets/js/beefup.js', array('jquery'), null, true );

	wp_enqueue_script( 'swiper-slider', get_template_directory_uri() . '/assets/js/swiper-slider.js', array('jquery'), null, true );

	wp_enqueue_script( 'mousemove', get_template_directory_uri() . '/assets/js/mousemove.js', array('jquery'), null, true );

	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/meanmenu.js', array('jquery'), null, true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array('jquery'), null, true );

	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/counterup.js', array('jquery'), null, true );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.js', array('jquery'), null, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'jparticle', get_template_directory_uri() . '/assets/js/jparticle.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), null, true );

	wp_enqueue_script( 'bufet-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true );

	if( is_singular() && comments_open() && get_option( 'thread_comment' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$rtl_mode = false;

	if( is_rtl() ) {
		$rtl_mode = true;
	}

	wp_localize_script('bufet-main', 'buffetjs', array(
		'is_rtl' => $rtl_mode
	));


}
add_action( 'wp_enqueue_scripts', 'bufet_style_scripts' );
