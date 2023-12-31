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
 function my_enqueue_styles() {
    if ( ! is_admin() ) {
        wp_enqueue_style( 'custom-styles', plugin_dir_url( __FILE__ ) . 'custom-style.css', array(), '1.1', 'all' );
    }
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );

/* For a Specific Template - Reduces chances of style collisions 
function my_enqueue_styles() {
     if ( ! is_admin() ) {
         // Check if the current page is using a specific template
         if ( is_page_template( 'full-width.php' ) ) {
             wp_enqueue_style( 'custom-styles', plugin_dir_url( __FILE__ ) . 'custom-style.css', array(), '1.1', 'all' );
         }
     }
 }
 add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );
*/ 
  
  // Adds preview stuff for the backend.
  function preview_stuff()
  {
  	wp_enqueue_style( 'admin-css', plugin_dir_url( __FILE__ ) . 'admin.css', array(), wp_get_theme()->get( 'Version' ) );
  }
  add_action('admin_footer', 'preview_stuff');
 
