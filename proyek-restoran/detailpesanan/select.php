<h3>Detail Pesanan</h3>
<hr class="m-1 mb-2">

<form action="" method="post">
	<table border="0" cellpadding="0" cellspacing="0" class="ms-1 my-2">
		<tr>
			<td>
				<input type="date" name="tglAwal" id="tglAwal" required>
			</td>
			<td class="px-2"> - </td>
			<td>
				<input type="date" name="tglAkhir" id="tglAkhir" required>
			</td>
			<td class="ps-3"><button type="submit" name="cari" class="btn btn-outline-primary btn-sm py-0">Cari</button></td>
		</tr>
	</table>
</form>

<hr class="m-1 my-2">

<?php

	// query SELECT ke view vdetailpesanan
	$query = "SELECT * FROM vdetailpesanan ORDER BY idpesanan ASC";

	if ( isset( $_POST["cari"] ) )
	{
		$tglAwal = $_POST["tglAwal"];
		$tglAkhir = $_POST["tglAkhir"];

		$query = "SELECT * FROM vdetailpesanan WHERE tglpesanan BETWEEN '$tglAwal' AND '$tglAkhir'";
	}

	$vdetailpesanan = $database->query_select($query);
?>

<table class="table table-bordered w-75 m-1 mt-0">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Pelanggan</th>
			<th class="text-center">Alamat</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Pesanan</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Jumlah</th>
			<th class="text-center">Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			$total = 0;
		?>
		<?php foreach ( $vdetailpesanan as $vdpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "." ?></td>
				<td class="text-capitalize"><?= $vdpsn["pelanggan"] ?></td>
				<td><?= $vdpsn["alamat"] ?></td>
				<td><?= $vdpsn["tglpesanan"] ?></td>
				<td><?= $vdpsn["menu"] ?></td>
				<td><?= $vdpsn["harga"] ?></td>
				<td><?= $vdpsn["jumlah"] ?></td>
				<td><?= $vdpsn["harga"] * $vdpsn["jumlah"] ?></td>
			</tr>
			<?php $total += $vdpsn["harga"] * $vdpsn["jumlah"] ?>
		<?php endforeach; ?>
		<tr>
			<th colspan="7">Total Keseluruhan</th>
			<td><?= $total ?></td>
		</tr>
	</tbody>
</table>
