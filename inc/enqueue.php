<?php 



function suf_plugin_enqueue(){
  wp_register_style( 'register_style', smartup_plugin_dir_url().'/css/register.css', array(), '1.0.0', 'all' );
  wp_register_script( 'register_script', smartup_plugin_dir_url().'/js/register.js' , array('jquery'), true );  
}
add_action( 'wp_enqueue_scripts', 'suf_plugin_enqueue' );