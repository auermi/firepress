<?php

/*
Plugin name: Firepress
Version: 1.0
Description: View Firepress data based on the given URL
Author: Michael Auer
Author URI: http://michaelauer.io
Plugin URI: https://github.com/auermi/firepress
*/

function fp_init() {
  $app_name = "Firepress";
  $app_id = "firepress";
  add_menu_page($app_name, $app_name, 'administrator', $app_id . 'top-level', 'fp_renderPlugin');
}

function fp_renderPlugin() {
  echo "<h1>Firepress</h1>";
  echo "<p>A plugin for viewing your Firebase data in Wordpress</p>";
  echo "<label>Firebase URL</label><br><input id=\"FPURLInput\"><button id=\"FPURLSubmit\">Generate</button>";
  echo "<table id=\"fp_table\"></table>";
}

function fp_register_files() {
  wp_enqueue_script('fp_firebase_js', 'https://cdn.firebase.com/js/client/2.4.1/firebase.js');
  wp_enqueue_script('fp_app_js', plugins_url('/js/app.js', __FILE__));
  wp_enqueue_style('fp_style_css', plugins_url('/css/style.css', __FILE__));
}

add_action('admin_menu', 'fp_register_files');
add_action('admin_menu', 'fp_init');

?>
