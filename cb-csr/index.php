<?php
/*
Plugin Name: CB CSR
Plugin URI: 
Version: 3.0
Description: CSR
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'helper/the_loop_functions.php';
require 'class/cb_csr.php';

global $cb_csr;
$cb_csr = new CB_CSR(__FILE__);


?>