<?php
/*
  Plugin Name:  Wpfox InfoBox rotator.
  Version: 1.0.3
  Description: By using Woocommerce infobox rotator, it allows you to add simple info box in wooocommerce Single product page under add to cart , no need to edit theme and woocommerce plugin!
  Author: THE WP FOX
  Author URI: http://thewpfox.com/
  
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WPFOX_PLUGIN_FILE', __FILE__ );
define( 'WPFOX_PLUGIN_PATH', untrailingslashit( realpath( plugin_dir_path( WPFOX_PLUGIN_FILE ) ) ) );
define( 'WPFOX_PLUGIN_URL',esc_url( trailingslashit( plugins_url('/',__FILE__) ) ));
define( 'WPFOX_PLUGIN_LIB',esc_url( trailingslashit( plugins_url('/assests/lib/',__FILE__) ) ));
define( 'WPFOX_PLUGIN_CSS',esc_url( trailingslashit( plugins_url('/assests/css/',__FILE__) ) ));
define( 'WPFOX_PLUGIN_IMG',esc_url( trailingslashit( plugins_url('/assests/img/',__FILE__) ) ));
define( 'WPFOX_PLUGIN_JS',esc_url( trailingslashit( plugins_url('/assests/js/',__FILE__) ) ));
define( 'WPFOX_BASENAME', plugin_basename( __FILE__ ) );
require_once 'classes/wpfox-infobox-rotator-class.php';
