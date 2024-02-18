<?php


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bufet_theme_options_style() {

	// Globalizing theme options values
	global $bufet;

	//
	// Enqueueing StyleSheet file
	//
    wp_enqueue_style( 'bufet-theme-custom-style', get_template_directory_uri() . '/assets/css/theme_options_style.css'  );

	$css_output = '';


	/*=============================================
	=            CUSTOM FOOTER STYLES             =
	=============================================*/

	if( isset( $bufet['accent_gradient'] ) ) {

		$color_from = $bufet['accent_gradient']['from'];
		$color_to = $bufet['accent_gradient']['to'];

		$css_output .= "
			.social a:after{
				background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}

			.comments-form-area form#commentform input[type='submit']{
				background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}

			.comming-soon-wrapper .grad-bg-hover li a:after{
				background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}
    	";
	}



	// Before Scroll header custom colors


	if( isset( $bufet['header_nav_background_before_scroll'] ) ) {

		$color_from = $bufet['header_nav_background_before_scroll']['from'];
		$color_to = $bufet['header_nav_background_before_scroll']['to'];

		$css_output .= "
			header.custom-header.headroom--not-bottom.headroom--top{
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				-webkit-background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}
		";
	}


	if( isset( $bufet['menu_item_dropdown_bg_color'] ) ) {

		$color = $bufet['menu_item_dropdown_bg_color'];

		$css_output .= "
			header.custom-header.headroom--top .sub-menu{
				background: {$color};
			}

		";
	}



	// After Scroll header custom colors



	if( isset( $bufet['header_nav_background_after_scroll'] ) ) {

		$color_from = $bufet['header_nav_background_after_scroll']['from'];
		$color_to = $bufet['header_nav_background_after_scroll']['to'];

		$css_output .= "
			header.custom-header.headroom--not-top{
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				-webkit-background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}
		";
	}


	if( isset( $bufet['after_scroll_menu_item_dropdown_bg_color'] ) ) {

		$color = $bufet['after_scroll_menu_item_dropdown_bg_color'];

		$css_output .= "
			header.custom-header.headroom--not-top .sub-menu{
				background: {$color};
			}

		";
	}



	wp_add_inline_style( 'bufet-theme-custom-style', $css_output );

}
add_action('wp_enqueue_scripts', 'bufet_theme_options_style');
