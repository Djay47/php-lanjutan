<?php
	$id = $_GET["id"];
?>
<h2>Konfirmasi Hapus Data</h2>
<hr>
<table class="table-sm">
	<tr>
		<td>
			<a type="button" class="btn btn-danger btn-sm py-0" href="?dir=kategori&file=select">
				Batal
			</a>
		</td>
		<td>
			<a type="button" class="btn btn-success btn-sm py-0" href="?dir=kategori&file=delete&id=<?= $id ?>">
				Lanjut
			</a>
		</td>
	</tr>
</table>