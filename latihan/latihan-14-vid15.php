<?php
	$cookie_name = "user";
	$cookie_value = "Djay";
	setcookie($cookie_name, $cookie_value);

	// $cookie_value = "Adi Jaya";
	// setcookie($cookie_name, $cookie_value);

	setcookie($cookie_name, $cookie_value, time() + 60);
	
	// echo $_COOKIE[$cookie_name];

	// var_dump($_COOKIE);
	// print_r($_COOKIE);

?>