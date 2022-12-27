<?php
/*
Plugin Name: CB Clients
Plugin URI: 
Version: 1.1
Description: Our Clients
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'class/cb_clients.php';

global $cb_clients;
$cb_clients = new CB_CLIENTS(__FILE__);


?>