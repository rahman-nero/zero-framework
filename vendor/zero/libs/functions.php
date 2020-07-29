<?php
// Debuging
function dd($arr) {
	echo '<pre>';
		print_r($arr);
	echo '</pre>';
}

function h($str) {
	return htmlspecialchars($str, ENT_QUOTES);
}


//  Generator
function f($arr) {
	foreach ($arr as $key => $value) {
		yield $key => $value;
	}
}


function is_assoc($var)
{
  return is_array($var) && array_diff_key($var,array_keys(array_keys($var)));
}
