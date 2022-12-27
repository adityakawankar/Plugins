<?php
/*
Plugin Name: CB CaseStudies
Plugin URI: 
Version: 1.1
Description: Case Studies
License: GPL2 or later
License URI: https://www.ikf.co.in/
*/


//http://www.gnu.org/licenses/gpl-2.0.html
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_casestudies.php';

global $cb_casestudies;
$cb_casestudies = new CB_Casestudies(__FILE__);
?>