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
    $this->styles();
    $this->scripts();
    $this->actions();
    $this->filters();
  }

  private function define() {
  
  }

  private function includes() {

  }

  private function actions() {
    add_action( 'init', array( $this, 'register_post_type' ) );
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
      'labels'              => array( 'name' => __('Ume','onigiri') )
    ));
  }




}
