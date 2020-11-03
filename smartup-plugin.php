<?php
/**
 * Plugin Name:Smartup Manger
 * Plugin URI: https://www.linearc.biz/profile/
 * Description: This creates suscribe, unsuscribe and email verification compatibility for linearc site.
 * Version: 1.3.5
 * GitHub Plugin URI: https://github.com/Linearc-Inc/wp-smartup-plugin
 * Author: Isakiye Afasha
 * Author URI: http://www.iamafasha.com
 */
// Make sure we don't expose any info if called directly

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

function smartup_plugin_dir_path(){
  return plugin_dir_path(__FILE__);
}

function smartup_plugin_dir_url(){
  return plugin_dir_url( __FILE__ );
}

require_once plugin_dir_path( __FILE__ ).'/classes/Updater.php';
require_once plugin_dir_path( __FILE__ ).'/inc/users.php';
require_once plugin_dir_path( __FILE__ ).'/inc/shortcodes.php';
require_once plugin_dir_path( __FILE__ ).'/inc/enqueue.php';
require_once plugin_dir_path( __FILE__ ).'/inc/ajax.php';

if ( is_admin() ) {
    new Smartup\Plugin\Updater( __FILE__, 'Linearc-Inc', "wp-smartup-plugin");
}

register_activation_hook( __FILE__, 'add_user_types' );
register_deactivation_hook(__FILE__, 'remove_user_types' );