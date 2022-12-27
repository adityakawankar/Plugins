<?php
/*
Plugin Name: CB Aftermarket products
Plugin URI: 
Version: 3.0
Description: Aftermarket products
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'helper/the_loop_functions.php';
require 'class/cb_aftermarket.php';

global $cb_aftermarket;
$cb_aftermarket = new CB_AfterMarket(__FILE__);


?>