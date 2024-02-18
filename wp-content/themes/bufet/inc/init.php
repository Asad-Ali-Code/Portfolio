<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme Constants
require_once trailingslashit( get_template_directory() ) . 'inc/constants.php' ;

// Bufet Main Class
require_once BUFET_CLASSES_DIR . '/BufetMain.php';

// Theme Setup
require_once BUFET_INC_DIR . '/theme-setup.php';

// Theme Style and Scripts Enqueye
require_once BUFET_INC_DIR . '/theme-style-and-scripts.php';

// Custom Theme Options Styles
require_once BUFET_INC_DIR . '/custom-theme-options-styles.php';

// Theme Shortcodes
require_once BUFET_INC_DIR . '/nav-menu-walker.php';

// Theme Widgets
require_once BUFET_INC_DIR . '/widgets.php';

// Theme Options
require_once BUFET_INC_DIR . '/theme-options.php';

// Theme Options
require_once BUFET_INC_PLUGINS_DIR . '/install-plugin.php';
