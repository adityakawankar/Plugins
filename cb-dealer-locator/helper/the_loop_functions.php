<?php

function get_the_cb_dealerlocator($field){
	global $post;
	$output = '';
	$output = isset($post->cb_dealerlocator[$field]) ? $post->cb_dealerlocator[$field] : '';
	return apply_filters('the_cb_dealerlocator', $output, $field);
}

function the_cb_dealerlocator($field){
	echo get_the_cb_dealerlocator($field);
}

?>