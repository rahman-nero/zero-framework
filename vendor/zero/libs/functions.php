<?php
// Debuging
function dd($arr) {
	echo '<pre>';
		var_dump($arr,1);
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
