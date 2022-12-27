<?php

function get_the_cb_plantlocation($field){
	global $post;
	$output = '';
	$output = isset($post->cb_plantlocation[$field]) ? $post->cb_plantlocation[$field] : '';
	return apply_filters('the_cb_plantlocation', $output, $field);
}

function the_cb_plantlocation($field){
	echo get_the_cb_plantlocation($field);
}

?>