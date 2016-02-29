<?php

/*
Plugin name: Firepress
Version: 1.0
Description: View Firepress data based on the given URL
Author: Michael Auer
Author URI: http://michaelauer.io
Plugin URI: https://github.com/auermi/firepress
*/

add_action('admin_menu', 'init');

function init() {
  $app_name = "Firepress";
  $app_id = "firepress";
  add_menu_page($app_name, $app_name, 'administrator', $app_id . 'top-level', 'renderPlugin');
}

function renderPlugin() {
  echo "<h1>Firepress</h1>";
  echo "<p>A plugin for viewing your Firebase plugins in Wordpress</p>";
}

?>
