<?php 

add_action('wp_enqueue_scripts', 'mw_enqueue_scripts');

function mw_enqueue_scripts() {

  $version = '1.0.0';

  if ( defined('WP_DEBUG') && WP_DEBUG === true ){
    $version = time();
  }

  wp_enqueue_script('mw', get_stylesheet_directory_uri() . '/dist/js/bundle.js', array('jquery'), $version, true);
  wp_enqueue_style('mw', get_stylesheet_directory_uri() . '/dist/css/style.bundle.css', array(), $version);

  // add access to php data from js files
  $config = array(
    'rest_url' => rest_url(),
  );

  wp_localize_script('mw', 'mw_config', $config);

}

// Hide admin bar
show_admin_bar(false);

?>