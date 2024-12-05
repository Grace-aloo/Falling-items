<?php
/**
 * Plugin Name: Falling Items Overlay
 * Description: Adds an overlay with falling items animation.
 * Version: 1.0
 * Author: Liz and Grace
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles and scripts
function falling_items_enqueue_assets() {
    // Enqueue CSS
    wp_enqueue_style('falling-items-style', plugin_dir_url(__FILE__) . 'falling-items.css');
    
    // Enqueue JavaScript
    wp_enqueue_script('falling-items-script', plugin_dir_url(__FILE__) . 'falling-items.js', [], null, true);
}

// Hook the assets to WordPress
add_action('wp_enqueue_scripts', 'falling_items_enqueue_assets');

// Add the HTML structure
function falling_items_add_overlay() {
    ?>
    <div class="falling-items-overlay">
  <!-- Create 14 items -->
  <div class="falling-item twelve">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-10.png">
  </div>
  <div class="falling-item ten">
        <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-14.png">
  </div>
  <div class="falling-item one">
        <img style="width: 98.5px; height: 112px"src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-15.png">
  </div>
  <div class="falling-item fourteen">
        <img style="width: 96px; height: 112.75px" src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-16.png">
  </div>
  <div class="falling-item thirteen" style="display:none">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-13.png">
  </div>
  <div class="falling-item six">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-12.png">
  </div>
  <div class="falling-item three">
    <img  src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-11.png">
  </div>
  <div class="falling-item five" style="display:none;">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-9.png">
  </div>
  <div class="falling-item eleven">
    <img style="max-width: 20px; max-height: 20px" src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-8.png">
  </div>
  <div class="falling-item seven">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-7.png">
  </div>
  <div class="falling-item nine">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-6.png">
  </div>
  <div class="falling-item eight">
    <img style="max-width: 56.75px; max-height: 91.5px"src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-5.png">
  </div>
  <div class="falling-item two">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-4.png">
  </div>
  <div class="falling-item four">
    <img src="https://pascalsatori.com/wp-content/uploads/2024/11/Asset-3.png">
  </div>
</div>

    <?php
}

// Hook the HTML to WordPress footer
add_action('wp_footer', 'falling_items_add_overlay');
