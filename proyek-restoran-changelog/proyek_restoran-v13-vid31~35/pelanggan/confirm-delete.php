<?php
	$idpelanggan = $_GET["id"];
?>

<h2>Konfirmasi Hapus Data</h2>
<hr>
<table class="table-sm">
	<tr>
		<td>
			<a href="?dir=pelanggan&file=select" type="button" class="btn btn-danger btn-sm py-0">
				Batal
			</a>
		</td>
		<td>
			<a href="?dir=pelanggan&file=delete&id=<?= $idpelanggan ?>" type="button" class="btn btn-success btn-sm py-0">
				Lanjut
			</a>
		</td>
	</tr>
</table>