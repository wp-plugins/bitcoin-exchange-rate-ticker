<?php
	/*
	Plugin Name: Bitcoin Price Ticker
	Plugin URI: http://www.richardmacarthy.com/
	Description: A plugin which creates a sidebar widget to show rates for the most popular Bitcoin exchanges.
	Author: Richard Macarthy
	Version: 1.0
	Author URI: http://www.richardmacarthy.com/
	*/
	
	/************************************************
	* Global Variables
	/************************************************/
	
	global $wp_roles;
	
	register_activation_hook(__FILE__, 'plugin_install');
	register_deactivation_hook( __FILE__, 'plugin_unininstall' );
	
	/************************************************
	* Includes
	/************************************************/
	
	include('lib/classes/ticker-class.php'); 
	include('lib/install.php'); 
	include('lib/admin-page.php'); 
	include('lib/ticker-widget.php'); 
	
?>