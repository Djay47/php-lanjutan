<?php
	$idkategori = (int)( isset($_GET["id"]) ? $_GET["id"] : 1 );

	// Konfigurasi Pagination
	$jmlDataPerHal = 4;
	$jmlData = $database->num_row("SELECT * FROM menu WHERE idkategori = $idkategori");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

	if ( $idkategori !== 1 )
	{
		$kategori = $_GET["kategori"];
		$querySelect = "SELECT * FROM menu WHERE idkategori = $idkategori LIMIT $awalData, $jmlDataPerHal";
	}
	else
	{
		$kategori = "Minuman";
		$querySelect = "SELECT * FROM menu WHERE idkategori = 1 LIMIT $awalData, $jmlDataPerHal";
	}

	$menu = $database->query_select($querySelect);
?>

<h2>Daftar Menu | <?= $kategori ?></h2>
<hr class="m-1 mb-2">

<!-- Daftar Menu -->
<div class="clearfix">
	<?php foreach ($menu as $mn) : ?>
		<div class="card me-2 float-start" style="width:200px">
			<img src="images/<?= $mn["gambar"] ?>" class="card-img-top" style="height:153px">
			<div class="card-body">
				<h4 class="card-title"><?= $mn["menu"]; ?></h4>
				<p class="card-text">Rp <?= $mn["harga"] ?></p>
				<a href="?dir=home&file=keranjang&id=<?= $mn["idmenu"] ?>" class="btn btn-primary py-0">Beli</a>
			</div>
		</div>
	<?php endforeach; ?>	
</div>

<!-- Navigasi Halaman -->
<table border="0" cellpadding="5" cellspacing="0">
	<tr>
		<th>Page:</th>
		<?php for ( $i = 1; $i <= $jmlHal; ++$i ) : ?>
			<td><a href="?dir=home&file=menu&hal=<?= $i ?>&id=<?= $idkategori ?>&kategori=<?= $kategori ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>