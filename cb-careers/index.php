<?php
/*
Plugin Name: CB Careers
Plugin URI: 
Version: 1.1
Description: Our Current Openings
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_careers.php';

global $cb_careers;
$cb_careers = new CB_CAREERS(__FILE__);


?>