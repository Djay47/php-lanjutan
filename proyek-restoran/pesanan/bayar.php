<h3>Pembayaran Pesanan</h3>
<hr class="m-1 mb-2">

<!-- tombol Kembali ke Daftar Pesanan -->
<a href="?dir=pesanan&file=select" class="btn btn-outline-dark btn-sm py-0 m-1">Kembali</a>

<hr class="my-2">

<?php
	$idpesanan = $_GET['id'];
	$query = "SELECT * FROM pesanan WHERE idpesanan = $idpesanan";
	$pesanan = $database->query_select($query);
	$pesanan = $pesanan[0];
?>

<form action="" method="post">
	<input type="hidden" name="idpesanan" value="<?= $pesanan["idpesanan"] ?>">
	<table class="table-sm">
		<tr><th><label>Total</label></th></tr>
		<tr><td>Rp: <input type="text" name="total" value="<?= $pesanan["total"] ?>" readonly></td></tr>
		<tr><th><label class="mt-2">Dibayar</label></th></tr>
		<tr><td>Rp: <input type="text" name="bayar" value="<?= $pesanan["bayar"] ?>"></td></tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary btn-sm py-0 mt-3 mb-3">Simpan</button></td></tr>
	</table>
</form>

<?php
	if ( isset( $_POST["simpan"] ) )
	{
		$idpesanan = $_POST["idpesanan"];
		$total = htmlspecialchars($_POST["total"]);
		$bayar = htmlspecialchars($_POST["bayar"]);
		$kembali = $bayar - $total;

		if ( $kembali < 0 )
		{
			echo "Pembayaran Belum Lunas!<br>";
			echo "Silahkan Kembali ke daftar Pesanan!";
		}
		else
		{
			$query = "UPDATE pesanan set bayar = $bayar, kembali = $kembali, state = 1 WHERE idpesanan = $idpesanan";	
			$database->query_update($query);
			header("Location: ?dir=pesanan&file=select");
		}
	}
?>
