<?php

function get_the_cb_empjourneys($field){
	global $post;
	$output = '';
	$output = isset($post->cb_empjourneys[$field]) ? $post->cb_empjourneys[$field] : '';
	return apply_filters('the_cb_empjourneys', $output, $field);
}

function the_cb_empjourneys($field){
	echo get_the_cb_empjourneys($field);
}

?>