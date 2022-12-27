<?php
/*
Plugin Name: CB Dealer Locator
Plugin URI: 
Version: 1.1
Description: Dealer Locator
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_dealerlocator.php';

global $cb_dealerlocator;
$cb_dealerlocator = new CB_DEALERLOCATOR(__FILE__);


?>