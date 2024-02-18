<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define the DHRUBOK Folder
if( ! defined( 'BUFET_DIR' ) ) {
	define('BUFET_DIR', get_template_directory() );
}

// Define the DHRUBOK Partials Folder
if( ! defined( 'BUFET_PARTIALS_DIR' ) ) {
	define('BUFET_PARTIALS_DIR', trailingslashit( BUFET_DIR ) . 'partials' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_ASSETS_DIR' ) ) {
	define('BUFET_ASSETS_DIR', trailingslashit( BUFET_DIR ) . 'assets' );
}


// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_INC_DIR' ) ) {
	define('BUFET_INC_DIR', trailingslashit( BUFET_DIR ) . 'inc' );
}

// Define the Inc Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_FRAMEWORK_DIR' ) ) {
	define('BUFET_FRAMEWORK_DIR', trailingslashit( BUFET_INC_DIR ) . 'framework' );
}

// Define the Libs Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_LIBS_DIR' ) ) {
	define('BUFET_LIBS_DIR', trailingslashit( BUFET_DIR ) . 'libs' );
}

// Define the Shortcodes Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_SHORTCODES_DIR' ) ) {
	define('BUFET_SHORTCODES_DIR', trailingslashit( BUFET_INC_DIR ) . 'shortcodes' );
}

// Define the Classes Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_CLASSES_DIR' ) ) {
	define('BUFET_CLASSES_DIR', trailingslashit( BUFET_INC_DIR ) . 'classes' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_WIDGETS_DIR' ) ) {
	define('BUFET_WIDGETS_DIR', trailingslashit( BUFET_INC_DIR ) . 'widgets' );
}

// Define the Widgets Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_INC_VC_DIR' ) ) {
	define('BUFET_INC_VC_DIR', trailingslashit( BUFET_INC_DIR ) . 'visual_composer' );
}

// Define the PLUGINS Folder of the DHRUBOK Directory
if( ! defined( 'BUFET_INC_PLUGINS_DIR' ) ) {
	define('BUFET_INC_PLUGINS_DIR', trailingslashit( BUFET_INC_DIR ) . 'plugins' );
}
