<?php

function get_the_cb_csr($field){
	global $post;
	$output = '';
	$output = isset($post->cb_csr[$field]) ? $post->cb_csr[$field] : '';
	return apply_filters('the_cb_csr', $output, $field);
}

function the_cb_csr($field){
	echo get_the_cb_csr($field);
}

?>