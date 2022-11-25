<!-- Update Posisi -->
<?php
	$iduser = (int)$_GET["id"];
	$chgPosisi = ($_GET["status"] == 1) ? 0 : 1;
	$queryUpdatePosisi= "UPDATE user SET status = $chgPosisi WHERE iduser = $iduser";
	$database->run_query($queryUpdatePosisi);
	header("Location: ?dir=user&file=select");
?>