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
 
 // Remove ponyfill.css
 function custom_remove_ponyfill_css() {
     wp_dequeue_style('blockbase-ponyfill');
     wp_deregister_style('blockbase-ponyfill');
 }
 add_action('wp_enqueue_scripts', 'custom_remove_ponyfill_css', 100);

 // Enqueue main CSS
 function my_enqueue_styles() {
    if ( ! is_admin() ) {
        wp_enqueue_style( 'custom-styles', plugin_dir_url( __FILE__ ) . 'css/main.css', array(), '1.1', 'all' );
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
  	wp_enqueue_style( 'admin-css', plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'acf-blocks-css', plugin_dir_url( __FILE__ ) . 'css/acf_blocks.css', array(), wp_get_theme()->get( 'Version' ) );
  }
  add_action('admin_footer', 'preview_stuff');
  
  function smh_enqueue_script() {
      ?>
      <script>
      function applyMaxHeightFromClassName() {
          const elements = document.querySelectorAll('[class*="cover_"]');
          elements.forEach(element => {
              const classNames = element.className.split(/\s+/);
              const coverClass = classNames.find(className => className.startsWith('cover_'));
              if (coverClass) {
                  const maxHeight = coverClass.split('_')[1];
                  element.style.setProperty('max-height', maxHeight + 'vh', 'important');
                  element.style.setProperty('min-height', maxHeight + 'vh', 'important');
                  element.style.setProperty('height', maxHeight + 'vh', 'important');
              }
          });
      }
  
      document.addEventListener('DOMContentLoaded', applyMaxHeightFromClassName);
      </script>
      <?php
  }
  
  add_action('wp_footer', 'smh_enqueue_script');