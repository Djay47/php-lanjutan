<!-- Update Status -->
<?php
	$idpelanggan = (int)$_GET["id"];
	$chgStatus = ($_GET["status"] == 1) ? 0 : 1;
	$queryUpdateStatus = "UPDATE pelanggan SET status = $chgStatus WHERE idpelanggan = $idpelanggan";
	$database->run_query($queryUpdateStatus);
	header("Location: ?dir=pelanggan&file=select");
?>