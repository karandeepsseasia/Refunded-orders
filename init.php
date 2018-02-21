<?php
/*
Plugin Name: Refunded orders
Description: It is used to display listing of refunded orders
Version:0.0.1
Author: karandeep
Author URI: test.com
*/

function refunded_orders_list() {
	
	//this is the main item for the menu
	add_menu_page('Refunded orders feedback', //page title
	'Refunded orders feedback', //menu title
	'manage_options', //capabilities
	'refund_list', //menu slug
	'refund_list'); //function 

	
	add_submenu_page('list of Vendors for food Store', //parent slug
	'list of Vendors for food Store', //page title
	'list of Vendors for food Store', //menu title
	'manage_options', //capability
	'refund_list', //menu slug
	'refund_list'); //function 
	
}
add_action('network_admin_menu','refunded_orders_list');

define('ROOTDIR1', plugin_dir_path(__FILE__));
//echo plugin_dir_path(__FILE__);
require_once(ROOTDIR1 . 'refund-list.php');

