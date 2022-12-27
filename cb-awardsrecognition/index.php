<?php
/*
Plugin Name: CB Awards & Recognition
Plugin URI: 
Version: 1.1
Description: Awards & Recognition
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_awardsrecognition.php';

global $cb_awardsrecognition;
$cb_awardsrecognition = new CB_Awardsrecognition(__FILE__);


?>