<?php
/*
Plugin Name: CB Employee Journeys
Plugin URI: 
Version: 3.0
Description: Employee Journeys
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'helper/the_loop_functions.php';
require 'class/cb_empjourneys.php';

global $cb_empjourneys;
$cb_empjourneys = new CB_empjourneys(__FILE__);


?>