<?php
/**
 * Plugin Name: Styles Plugin
 * Plugin URI: https://scottsaunders.design
 * Description: Alternative to using styles as a plugin instead of using a theme.
 * Version: 1.0
 * Author: Scott Saunders
 * Author URI: https://scottsaunders.design
 * License: GPL2
 */

 // Enqueue main CSS
  	wp_enqueue_style( 'custom-styles', plugin_dir_url( __FILE__ ) . 'custom-style.css', array(), wp_get_theme()->get( 'Version' ) );
  
  // Adds preview stuff for the backend.
  function preview_stuff()
  {
  	wp_enqueue_style( 'admin-css', plugin_dir_url( __FILE__ ) . 'admin.css', array(), wp_get_theme()->get( 'Version' ) );
  }
  add_action('admin_footer', 'preview_stuff');
 