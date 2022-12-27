<?php
/*
Plugin Name: CB Investor Relations
Plugin URI: 
Version: 3.0
Description: Investor Relations
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'helper/the_loop_functions.php';
require 'class/cb_investorrelations.php';

global $cb_investorrelations;
$cb_investorrelations = new CB_Investorrelations(__FILE__);


?>