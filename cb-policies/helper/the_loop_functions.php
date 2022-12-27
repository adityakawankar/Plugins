<?php

function get_the_cb_policies($field){
	global $post;
	$output = '';
	$output = isset($post->cb_policies[$field]) ? $post->cb_policies[$field] : '';
	return apply_filters('the_cb_policies', $output, $field);
}

function the_cb_policies($field){
	echo get_the_cb_policies($field);
}

?>