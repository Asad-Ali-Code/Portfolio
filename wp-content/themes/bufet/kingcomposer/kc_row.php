<?php

$output = $css_data = $css = '';

$cont_class = array( 'kc-row-container' );
$element_attributes = array();

extract($atts);

$css_classes = apply_filters( 'kc-el-class', $atts );

$css_classes[] = 'kc_row';

if( $row_pseudo_switch == 'yes' )  {
	$css_classes[] = 'kc_row_psedue';
}
if( $row_s_parallax == 'yes' )  {
	$css_classes[] = 'appai_row_parallax';
}

if( $css != '' )
	$css_classes[] = $css;

if( !empty( $atts['row_class'] ) )
	$css_classes[] = $atts['row_class'];

if( !empty( $atts['full_height'] ) )
{
	if( $atts['content_placement'] == 'middle' )
		$element_attributes[] = 'data-kc-fullheight="middle-content"';
	else $element_attributes[] = 'data-kc-fullheight="true"';

}

if( !empty( $row_id ) ) {
	$element_attributes[] = "id='$row_id'";
}

if( empty($atts['column_align']) )
    $atts['column_align'] = 'center';

if( !empty( $atts['equal_height'] ) ){
    $element_attributes[] = 'data-kc-equalheight="true"';
    $element_attributes[] = 'data-kc-equalheight-align="'. $atts['column_align'] .'"';
}



if( isset( $atts['use_container'] ) && $atts['use_container'] == 'yes' )
	$cont_class[] = ' kc-container';

if( !empty( $atts['container_class'] ) )
	$cont_class[] = ' '.$atts['container_class'];

if( !empty( $atts['css'] ) )
	$css_classes[] = $atts['css'];


if( $primary_moving_bg == 'yes' ) {
	$css_classes[] = 'moving-background';
}

if( $secondary_moving_bg == 'yes' ) {
	$css_classes[] = 'moving-background2';
}
/**
*Check video background
*/

if( $atts['video_bg'] === 'yes' )
{
	$video_bg_url = $atts['video_bg_url'];

	if( empty($video_bg_url)) $video_bg_url = 'https://www.youtube.com/watch?v=dOWFVKb2JqM';

	$has_video_bg = kc_youtube_id_from_url( $video_bg_url );

	if( !empty( $has_video_bg ) )
	{
		$css_classes[] = 'kc-video-bg';
		$element_attributes[] = 'data-kc-video-bg="' . esc_attr( $video_bg_url ) . '"';
		$css_data .= 'position: relative;';

		if( isset( $atts['video_options'] ) && !empty( $video_options ) ){
			$element_attributes[] = 'data-kc-video-options="' . esc_attr( trim( $video_options )) . '"';
		}
	}
}




if( isset( $atts['force'] ) && $atts['force'] == 'yes'  ){
	if( isset( $atts['use_container'] ) && $atts['use_container'] == 'yes' )
		$element_attributes[] = 'data-kc-fullwidth="row"';
	else
		$element_attributes[] = 'data-kc-fullwidth="content"';
}



if( empty( $has_video_bg ) )
{
	if( !empty( $atts['parallax'] ) )
	{

		$element_attributes[] = 'data-kc-parallax="true"';

		if( $atts['parallax'] == 'yes-new' )
		{
			$bg_image_id = $atts['parallax_image'];
			$bg_image = wp_get_attachment_image_src( $bg_image_id, 'full' );
			$css_data .= "background-image:url('".$bg_image[0]."');";
		}

	}
}


$css_class = implode(' ', $css_classes);
$element_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if( !empty( $css_data ) )
	$element_attributes[] = 'style="' . esc_attr( trim( $css_data ) ) . '"';

$output .= '<section ' . implode( ' ', $element_attributes ) . '>';

// Check that if we are using any patterns in background
if( $primary_moving_bg == 'yes') :
	$output .= '<div id="background-1" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-2" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-3" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-4" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-5" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-6" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-7" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-8" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-9" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-10" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-11" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-12" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-13" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-14" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-15" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-16" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-17" class="mouse-bg hidden-xs hidden-sm"></div>
	        <div id="background-18" class="mouse-bg hidden-xs hidden-sm"></div>';

endif;
// Check that if we are using any patterns in background
if( $secondary_moving_bg == 'yes') :
	$output .= '<div id="background-19" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-20" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-21" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-22" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-23" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-24" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-25" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-26" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-27" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-28" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-29" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-30" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-31" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-32" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-33" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-34" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-35" class="mouse-bg hidden-xs hidden-sm"></div>
		        <div id="background-36" class="mouse-bg hidden-xs hidden-sm"></div>';

endif;


// Check that if we are using any patterns in background
if( $use_pattern_bg == 'yes' ) :

	if( $pattern_styles == 'style_1' ) :

		$output .= '<div class="particle-canvas particle-canvas-style"></div>';

	elseif( $pattern_styles == 'style_2' ) :

		$output .= '<div class="particle-canvas-2 particle-canvas-style"></div>';

	elseif( $pattern_styles == 'style_3' ) :

		$output .= '<div class="particle-canvas-3 particle-canvas-style"></div>';

	elseif( $pattern_styles == 'style_4' ) :

		$output .= '<div class="particle-canvas-4 particle-canvas-style"></div>';

	elseif( $pattern_styles == 'style_5' ) :

		$output .= '<div class="particle-canvas-5 particle-canvas-style"></div>';

	endif;

endif;


$output .= '<div class="' . esc_attr(implode( ' ', $cont_class)) . '">';

$output .= '<div class="kc-wrap-columns">'.do_shortcode( str_replace( 'kc_row#', 'kc_row', $content ) ).'</div>';

$output .= '</div>';

$output .= '</section>';

echo  $output;
