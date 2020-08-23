<?php
  /**
  * @package frankieplugin
  */
  /*
  Plugin Name: Frankie Plugin
  Plugin URI: http://localhost/wordpress/plugin
  Description: My first plugin
  Version: 1.0.0
  Author: Frankie West
  Author URI: http://localhost/wordpress
  License: GPLv2 or later
  */

defined('ABSPATH') or die("What are you doing???<br>");

class FrankiePlugin {
  // methods

  function __construct() {
    add_action( 'init', array($this, 'custom_post_type') );
  }

  function activate() {
    // generated a CPT
    $this->custom_post_type();
    // flush rewrite rules
    flush_rewrite_rules();
  }

  function deactivate(){
    // flush rewrite rules
    flush_rewrite_rules();
  }

  function custom_post_type(){
    register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
  }

}

if(class_exists('FrankiePlugin')){
  $frankiePlugin = new FrankiePlugin();
}

// activation
register_activation_hook( __FILE__, array( $frankiePlugin, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $frankiePlugin, 'deactivate' ) );

 ?>
