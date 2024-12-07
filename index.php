<?php
/**
 * Plugin Name: Falling Items Overlay
 * Description: Adds an overlay with falling items animation.
 * Version: 1.1
 * Author: Liz and Grace
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles and scripts
function falling_items_enqueue_assets() {
    // Check if the plugin is enabled
    $is_enabled = get_option('falling_items_enabled', 1); // Default to enabled
    if ($is_enabled && is_front_page()) {
        // Enqueue CSS
        wp_enqueue_style('falling-items-style', plugin_dir_url(__FILE__) . 'falling-items.css');
        
        // Enqueue JavaScript
        wp_enqueue_script('falling-items-script', plugin_dir_url(__FILE__) . 'falling-items.js', [], null, true);
    }
}

// Hook the assets to WordPress
add_action('wp_enqueue_scripts', 'falling_items_enqueue_assets');

// Add the HTML structure
function falling_items_add_overlay() {
    // Check if the plugin is enabled
    $is_enabled = get_option('falling_items_enabled', 1); // Default to enabled
    if ($is_enabled && is_front_page()) {
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
}

// Hook the HTML to WordPress footer
add_action('wp_footer', 'falling_items_add_overlay');

// Register the setting
function falling_items_register_setting() {
  register_setting('falling_items_settings_group', 'falling_items_enabled');
}
add_action('admin_init', 'falling_items_register_setting');

// Add admin settings menu
function falling_items_admin_menu() {
  add_options_page(
      'Falling Items Settings', // Page title
      'Falling Items',          // Menu title
      'manage_options',         // Capability
      'falling-items',          // Menu slug
      'falling_items_settings_page' // Callback function
  );
}
add_action('admin_menu', 'falling_items_admin_menu');

// Render the settings page
function falling_items_settings_page() {
  // Check user capabilities
  if (!current_user_can('manage_options')) {
      return;
  }

  // Get the current value
  $is_enabled = get_option('falling_items_enabled', 1); // Default to enabled

  ?>
  <div class="wrap">
      <h1>Falling Items Settings</h1>
      <form method="POST" action="options.php">
          <?php
          // Output security fields for the registered setting
          settings_fields('falling_items_settings_group');

          // Output the setting section fields
          do_settings_sections('falling-items');
          ?>
          <table class="form-table">
              <tr>
                  <th scope="row"><label for="falling_items_enabled_checkbox">Enable Falling Items</label></th>
                  <td>
                      <input type="checkbox" name="falling_items_enabled" id="falling_items_enabled_checkbox" value="1" <?php checked($is_enabled, 1); ?>>
                  </td>
              </tr>
          </table>
          <?php submit_button(); ?>
      </form>
  </div>
  <?php
}

// Add default option on plugin activation
function falling_items_activate() {
    add_option('falling_items_enabled', 1); // Default to enabled
}
register_activation_hook(__FILE__, 'falling_items_activate');

// Clean up option on plugin deactivation
function falling_items_deactivate() {
    delete_option('falling_items_enabled');
}
register_deactivation_hook(__FILE__, 'falling_items_deactivate');
