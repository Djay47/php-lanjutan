<!-- Update Posisi -->
<?php
	$iduser = (int)$_GET["id"];
	$chgStatus = ($_GET["status"] == 1) ? 0 : 1;
	$queryUpdateStatus= "UPDATE user SET status = $chgStatus WHERE iduser = $iduser";
	$database->run_query($queryUpdateStatus);
	header("Location: ?dir=user&file=select");
?>