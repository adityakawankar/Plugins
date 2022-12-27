<?php
/*
Plugin Name: CB News & Event
Plugin URI: 
Version: 3.0
Description: News & Events
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'helper/the_loop_functions.php';
require 'class/cb_newsevent.php';

global $cb_newsevent;
$cb_newsevent = new CB_Newsevent(__FILE__);


?>