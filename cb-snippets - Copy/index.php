<?php
/*
Plugin Name: CB Snippets
Plugin URI: 
Version: 1.0
Description: Snippets is very useful plug-in for the theme developer’s who need to inject their code by editing the default theme. This give’s dynamics for the developers to easily create short code’s and use theme where ever need by specifying the business logic in a folder outside.
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

require 'classes/cb_snippet.php';

global $cb_snippet;
$cb_snippet = new CB_Snippet( __FILE__ );

?>