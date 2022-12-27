<?php
/*
Plugin Name: CB Policies
Plugin URI: 
Version: 3.0
Description: Policies
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'helper/the_loop_functions.php';
require 'class/cb_policies.php';

global $cb_policies;
$cb_policies = new CB_Policies(__FILE__);


?>