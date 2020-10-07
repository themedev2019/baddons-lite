<?php
defined( 'ABSPATH' ) || exit;
/**
 * Plugin Name: bAddons for Beaver Builder - Lite
 * Description: bAddons for Beaver page Builder Plugins.
 * Plugin URI: http://baddons.themedev.net/
 * Author: ThemeDev
 * Version: 1.0.0
 * Author URI: https://ddesks.com
 *
 * Text Domain: nbaddons
 *
 * @package NbAdds
 * @category free
 *
 * bAddons is a flexible drag and drop page builder that works on the front end of your WordPress website. Whether you're a beginner or a professional, you're going to love taking control of your website. Stop writing HTML or wrestling with confusing shortcodes. With Beaver Builder, building beautiful, professional WordPress pages is as easy as dragging and dropping.
 *
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

define( 'NBADDONS_FILE_', __FILE__ );

include 'loader.php'; 
include 'plugin.php';

// load plugin
add_action( 'plugins_loaded', function(){
	// load text domain
	load_plugin_textdomain( 'nbaddons',  false, basename( dirname( __FILE__ ) ) . '/languages' );

	// load plugin instance
	\NbAdds\Nbaddons_Plugin::instance()->init();
}, 110); 


	

