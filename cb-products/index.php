<?php
/*
Plugin Name: CB Products
Plugin URI: 
Version: 1.1
Description: Products Listing
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_products.php';

global $cb_products;
$cb_products = new CB_Products(__FILE__);


?>