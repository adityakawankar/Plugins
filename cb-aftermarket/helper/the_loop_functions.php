<?php

function get_the_cb_aftermarket($field){
	global $post;
	$output = '';
	$output = isset($post->cb_aftermarket[$field]) ? $post->cb_aftermarket[$field] : '';
	return apply_filters('the_cb_aftermarket', $output, $field);
}

function the_cb_aftermarket($field){
	echo get_the_cb_aftermarket($field);
}

?>