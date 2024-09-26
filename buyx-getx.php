<?php
/*
Plugin Name: BUY X GET X
Description: Offers a buy one get extra one discount on products.
Version: 1.0.0
Author:Devadharshini
Text-Domain: buyx-getx
*/
 if(!defined('ABSPATH')){
    exit;
 }

 require_once plugin_dir_path(__FILE__). 'vendor/autoload.php';

 function buyx_getx_init(){
    $plugin = new BuyXGetX\BuyXGetX();
    $plugin->init();
 }
 add_action('plugins_loaded','buyx_getx_init');