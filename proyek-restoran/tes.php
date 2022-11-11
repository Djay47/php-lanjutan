<?php
	// $pwInput = "1234567";
	// echo "Before: $pwInput<br>";

	// $pwEnkripsi = password_hash( $pwInput, PASSWORD_DEFAULT );
	// echo "After: $pwEnkripsi<br>";

	// echo "<br>";

	$pwInput = "2342341";
	echo "Before: $pwInput<br>";

	$pwEnkripsi = hash( 'sha256', $pwInput);
	echo "After: $pwEnkripsi<br>";
?>