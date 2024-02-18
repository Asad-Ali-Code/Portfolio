<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}

    $site_url = get_site_url();
    $theme_dir = get_template_directory_uri();

    $map_icon = '';

    if( $map_icon_mark ) {
        $img = wp_get_attachment_image_src( $map_icon_mark, 'full' );
        $map_icon = $img[0];
    } else {
        $map_icon =  $theme_dir . '/assets/img/map-icon/map-marker-icon.png';
    }

    $map_options = array(
        'latitude'	=> $latitude,
        'longitude'	=> $longitude,
        'map_icon_mark'	=> $map_icon,
        'zoomLevel'	=> $zoom_level,
    );

    $map_options = json_encode($map_options);
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">
    <div class="google-map">
        <div id="map" data-map-options='<?php echo esc_attr( $map_options ); ?>'></div>
    </div>
</div>
