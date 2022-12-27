<?php

function get_the_cb_newsevent($field){
	global $post;
	$output = '';
	$output = isset($post->cb_newsevent[$field]) ? $post->cb_newsevent[$field] : '';
	return apply_filters('the_cb_newsevent', $output, $field);
}

function the_cb_newsevent($field){
	echo get_the_cb_newsevent($field);
}

?>