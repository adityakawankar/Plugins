<?php
/*
Plugin Name: CB Plant Location
Plugin URI: 
Version: 1.1
Description: Plant Location
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_plantlocation.php';

global $cb_plantlocation;
$cb_plantlocation = new CB_PlantLocation(__FILE__);


?>