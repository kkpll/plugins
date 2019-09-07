<?php
/*
 * Plugin Name: Onigiri
 * Description: Plugins
 * Version:     1.0.0.0
 * Author:      Daisuke Izutsu
 * Text Domain: onigiri
 * Domain Path: /languages/
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
 }

class Onigiri{

  public $version = '1.0.0.0';

  public static function init() {
    $onigiri = new self();
  }

  public function __construct() {
    $this->define();
    $this->actions();
    $this->filters();
  }

  private function define() {
    define( 'PLUGIN_DIR', plugins_url('onigiri') );
  }

  private function includes() {

  }

  private function actions() {
    add_action( 'admin_menu', array( $this, 'register_admin_menu') );
    add_action( 'init', array( $this, 'register_post_type' ) );
    add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
  }

  private function filters() {

  }

  public function register_post_type() {
    register_post_type( 'ume', array(
      'query_var'           => false,
      'rewrite'             => false,
      'public'              => true,
      'exclude_from_search' => true,
      'publicly_queryable'  => false,
      'show_in_nav_menus'   => false,
      'show_ui'             => false,
      'labels'              => array( 'name' => __( 'Ume', 'onigiri' ) )
    ));
  }

  public function register_admin_menu() {
    $page = add_menu_page( __( 'Onigiri', 'onigiri' ), __( 'Onigiri', 'onigiri' ), 'manage_options', 'onigiri', array( $this, 'render_admin_page' ), PLUGIN_DIR.'/images/icon.png', 80 );
    add_action( 'admin_print_scripts-'.$page, array( $this, 'register_admin_scripts' ) );
    add_action( 'admin_print_scripts-'.$page, array( $this, 'register_admin_styles' ) );
  }

  public function load_plugin_textdomain() {
    load_plugin_textdomain( 'onigiri', PLUGIN_DIR.'/languages/' ) );
  }

  public function register_admin_scripts() {

  }

  public function register_admin_styles() {

  }

}


add_action( 'plugins_loaded', array( 'Onigiri', 'init' ), 10 );
