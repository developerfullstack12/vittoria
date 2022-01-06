<?php
/**
 * Plugin Name: Rhye Core
 * Description: Core Plugin for Rhye WordPress Theme
 * Plugin URI:  https://artemsemkin.com/
 * Version:     2.4.0
 * Author:      Artem Semkin
 * Author URI:  https://artemsemkin.com/
 * Text Domain: rhye
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ARTS_RHYE_CORE_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'ARTS_RHYE_CORE_PLUGIN_VERSION', '2.4.0' );

/**
 * Theme Constants
 */
require_once __DIR__ . '/inc/constants.php';

/**
 * Register Custom Elementor Widgets
 */
require_once __DIR__ . '/elementor/rhye_elementor_extension.php';

/**
 * Extra Panels: Document Settings
 */
require_once __DIR__ . '/elementor/document/page_header.php';
require_once __DIR__ . '/elementor/document/page_masthead.php';
require_once __DIR__ . '/elementor/document/page_portfolio_nav.php';
require_once __DIR__ . '/elementor/document/page_footer.php';
require_once __DIR__ . '/elementor/document/page_ajax.php';
/**
 * Extra Panels: Elementor Section
 */
require_once __DIR__ . '/elementor/extensions/section_settings.php';

/**
 * Extra Panels: Elementor Column
 */
require_once __DIR__ . '/elementor/extensions/column_settings.php';

/**
 * Register Custom Post Types
 */
require_once __DIR__ . '/inc/cpt.php';

/**
 * Elementor Helper Functions
 */
require_once __DIR__ . '/inc/helper_functions.php';

/**
 * Plugin Frontend
 */
require_once __DIR__ . '/inc/frontend.php';

/**
 * Theme Options Panel
 */
require_once __DIR__ . '/inc/options.php';

/**
 * Taxonomies
 */
require_once __DIR__ . '/inc/taxonomies.php';

/**
 * WordPress Custom Widgets
 */
require_once __DIR__ . '/inc/widgets.php';

add_action( 'init', 'arts_load_textdomain' );
function arts_load_textdomain() {
	load_plugin_textdomain( 'rhye' );
}
