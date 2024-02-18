<?php


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once BUFET_WIDGETS_DIR . '/bufet-recent-posts.php';


// Requireing the custom widget

function bufet_theme_sidebar() {

	// globalizing theme options framework
	global $scorn;

	// Registering widgets for sidebar
	$args = array(
		'id'            => 'bufet_sidebar',
		'name'   		=> esc_html__('Blog Sidebar', 'bufet'),
		'description'   => esc_html__('Add your widgets here to show on blog sidebar', 'bufet'),
	    'class'         => '',
		'before_widget' => '<div class="widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="wdgt_title"><h2>',
		'after_title'   => '</h2></div>'
	);

	register_sidebar($args);

	// Registering widgets for sidebar
	$args = array(
		'id'            => 'footer_widget',
		'name'   		=> esc_html__('Footer widget', 'bufet'),
		'description'   => esc_html__('Add your widgets here to show on the footer of your site.', 'bufet'),
	    'class'         => '',
		'before_widget' => '<div class="col-xs-12"><div class="footer-widget %2$s ">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="wdgt_title"><h2>',
		'after_title'   => '</h2></div>'
	);

	register_sidebar($args);


	register_widget('Bufet_Recent_Posts_Widget');

}
add_action('widgets_init', 'bufet_theme_sidebar');
