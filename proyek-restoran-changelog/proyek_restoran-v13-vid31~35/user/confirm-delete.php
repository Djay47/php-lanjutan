<?php
	$iduser = $_GET["id"];
?>

<h2>Konfirmasi Hapus Data</h2>
<hr>
<table class="table-sm">
	<tr>
		<td>
			<a href="?dir=user&file=select" type="button" class="btn btn-danger btn-sm py-0">
				Batal
			</a>
		</td>
		<td>
			<a href="?dir=user&file=delete&id=<?= $iduser ?>" type="button" class="btn btn-success btn-sm py-0">
				Lanjut
			</a>
		</td>
	</tr>
</table>