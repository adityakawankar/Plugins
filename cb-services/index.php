<?php
/*
Plugin Name: CB Services
Plugin URI: 
Version: 1.2
Description: Services
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_services.php';

global $cb_services;
$cb_services = new CB_Services(__FILE__);
?>