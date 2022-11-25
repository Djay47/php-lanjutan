<h3>Keranjang Belanja</h3>

<?php
	// Hapus Item dari Keranjang Belanja
	if ( isset($_GET["hps"]) )
	{
		$colMenu = $_GET["hps"];
		unset($_SESSION["keranjang"]["$colMenu"]);
	}

	// Menambah dan Mengurangi Jumlah
	if ( isset( $_GET["kurang"] ) )
	{ 
		$key = $_GET["kurang"];
		--$_SESSION["keranjang"]["$key"];
		if ( $_SESSION["keranjang"]["$key"] == 0 )
		{
			unset($_SESSION["keranjang"]["$key"]);
		}
	}
	
	if ( isset( $_GET["tambah"] ) )
	{ 
		$key = $_GET["tambah"];
		++$_SESSION["keranjang"]["$key"];
	}
?>

<?php if ( !isset($_SESSION["loginPlgn"]) ) : ?>
	<?php header("Location: home/login.php"); ?>
<?php else : ?>
	<?php if ( isset($_GET["id"]) ) : ?>
		<?php
			$idmenu = $_GET["id"];
			$qrySlctColMenu = "SELECT menu FROM menu WHERE idmenu = $idmenu ";
			$colMenu = $database->query_select($qrySlctColMenu)[0]["menu"];

			if ( isset($_SESSION["keranjang"]["$colMenu"] ) )
			{
				++$_SESSION["keranjang"]["$colMenu"];
			}
			else
			{
				$_SESSION["keranjang"]["$colMenu"] = 1;
			}

			// $keranjang = $_SESSION["keranjang"];

			header("Location: ?dir=home&file=keranjang")
		?>
	<?php else : ?>
		<!-- Table Data Menu -->
		<table class="table table-bordered w-50 m-1">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Menu</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Jumlah</th>
				<th class="text-center">Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$nomor = 1;
				$total = 0;
			?>
			
			<?php foreach ($_SESSION["keranjang"] as $key => $krjg) : ?>
				<?php
					$qrySlctTblMenu = "SELECT * FROM menu WHERE menu = '$key'";
					$menu = $database->query_select($qrySlctTblMenu);
				?>
				
				<?php foreach ($menu as $mn) : ?>
					<tr>
						<td class="text-center"><?= $nomor++ . "."; ?></td>
						<td><?= $mn["menu"]; ?></td>
						<td><?= $mn["harga"] ?></td>
						<td>
							<a href="?dir=home&file=keranjang&kurang=<?= $key ?>" class="btn btn-sm btn-secondary py-0 me-2">-</a>
							<?= $krjg ?>
							<a href="?dir=home&file=keranjang&tambah=<?= $key ?>" class="btn btn-sm btn-secondary py-0 ms-2">+</a>
						</td>
						<td><?= $mn["harga"] * $krjg ?></td>
						<td class="text-center"><a href="?dir=home&file=keranjang&hps=<?= $mn["menu"]; ?>" class="btn btn-sm btn-outline-danger py-0">Hapus</a></td>
						<?php $total += ($mn["harga"] * $krjg) ?>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
			<tr>
				<td colspan="4">Total keseluruhan</td>
				<td><?= $total ?></td>
				<td></td>
			</tr>
		</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>