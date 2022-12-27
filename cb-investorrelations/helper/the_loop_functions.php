<?php

function get_the_cb_investorrelations($field){
	global $post;
	$output = '';
	$output = isset($post->cb_investorrelations[$field]) ? $post->cb_investorrelations[$field] : '';
	return apply_filters('the_cb_investorrelations', $output, $field);
}

function the_cb_investorrelations($field){
	echo get_the_cb_investorrelations($field);
}

?>