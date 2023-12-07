<?php

function my_custom_plugin_uninstall() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cofebook';
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
  }
?>