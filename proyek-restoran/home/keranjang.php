<h3>Keranjang Belanja</h3>
<hr class="m-1 mb-2">

<!-- Cek apakah user sudah login atau tidak (mencegah agar user tidak dapat mengakses halaman keranjang jika belum login) -->
<?php if ( !isset($_SESSION["loginPlgn"]) ) : ?>
	<!-- Jika belum login alihkan ke halaman login.php -->
	<?php header("Location: home/login.php"); ?>
<?php else : ?>
	<?php
		// Jika user sudah login, cek apakah user telah menekan tombol beli atau belum
		if ( !isset($_SESSION["keranjang"]) )
		{
			// Jika belum alihkan ke halaman index.php
			header("Location: index.php");
		}
	
		// Hapus Item dari Keranjang Belanja
		if ( isset($_GET["hps"]) )
		{
			$pesanan = $_GET["hps"];
			unset($_SESSION["keranjang"]["$pesanan"]);
			header("Location: ?dir=home&file=keranjang");
		}

		// Menambah Jumlah Pesanan
		if ( isset( $_GET["kurang"] ) )
		{ 
			$pesanan = $_GET["kurang"];
			--$_SESSION["keranjang"]["$pesanan"];
			if ( $_SESSION["keranjang"]["$pesanan"] == 0 )
			{
				unset($_SESSION["keranjang"]["$pesanan"]);
			}
		}

		// Mengurangi Jumlah Pesanan
		if ( isset( $_GET["tambah"] ) )
		{ 
			$pesanan = $_GET["tambah"];
			++$_SESSION["keranjang"]["$pesanan"];
		}
	?>

	<!-- Cek apakah user sudah menekan tombol beli atau belum -->
	<?php if ( isset($_GET["id"]) ) : ?>
		<?php
			$idmenu = $_GET["id"];	// dikirim saat tombol beli pada halaman menu ditekan mengirimkan idmenu dari menu yang dipilih
			
			// query SELECT ke table menu dari kolom menu yang memiliki idmenu sesuai dengan menu yang dipilih user dari halaman menu
			$querySelect = "SELECT menu FROM menu WHERE idmenu = $idmenu ";
			$pesanan = $database->query_select($querySelect)[0]["menu"];	// menyimpan nama menu, yang selanjutnya digunakan sebagai key untuk $_SESSION["keranjang"]

			// cek apakah $_SESSION["keranjang"]["$pesanan"] kosong atau tidak 
			if ( !isset($_SESSION["keranjang"]["$pesanan"] ) )
			{
				$_SESSION["keranjang"]["$pesanan"] = 1;	// Jika belum pernah diinisialisasi atau nilainya kosong maka inisialisasikan nilainya dengan 1
			}
			else
			{
				++$_SESSION["keranjang"]["$pesanan"];	// Jika sudah pernah diinisialisasi maka tambah nilainya dengan 1
			}

			// pindah ke halaman index.php?dir=home&file=keranjang dengan $_SESSION["keranjang"] telah dibuat dan dinisialisasi. dengan kata lain, memsuki halaman keranjang tanpa menekan tombol beli (tanpa mengirim id dan $_GET["id"] tidak diinisialisasi), jika tidak dinisialisasi maka masuk ke-blok pengkondisian else 
			header("Location: ?dir=home&file=keranjang");
		?>
	<?php else : ?>
		<!-- Table Data Menu -->
		<table class="table table-bordered w-75 m-1 mt-0">
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">Pesanan</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Total</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nomor = 1;	// untuk penomoran table
					$totalAkhir = 0;	// total dari pembelian dinisialisasi dengan nol, variable ini nantinya digunakan untuk mencantumkan harga total keseluruhan pembelian
				?>
				
				<?php foreach ($_SESSION["keranjang"] as $pesanan => $jmlh) : ?>
					<?php
						// query SELECT ke table menu
						$querySelect = "SELECT * FROM menu WHERE menu = '$pesanan'";
						$menu = $database->query_select($querySelect);
					?>
					
					<?php foreach ($menu as $mn) : ?>
						<tr>
							<td class="text-center">
								<?= $nomor++ . "."; ?>
							</td>
							<td><?= $mn["menu"]; ?></td>
							<td>Rp <?= $mn["harga"] ?></td>
							<td>
								<a href="?dir=home&file=keranjang&kurang=<?= $pesanan ?>" class="btn btn-sm btn-secondary py-0 me-2">-</a> <!-- Tombol '-' -->
								<?= $jmlh ?>
								<a href="?dir=home&file=keranjang&tambah=<?= $pesanan ?>" class="btn btn-sm btn-secondary py-0 ms-2">+</a>	<!-- Tombol '+' -->
							</td>
							<td>Rp <?= $mn["harga"] * $jmlh ?></td>
							<td class="text-center">
								<a href="?dir=home&file=keranjang&hps=<?= $mn["menu"]; ?>" class="btn btn-sm btn-outline-danger py-0">Hapus</a>	<!-- Tombol 'Hapus' -->
							</td>
							
							<!-- pada setiap pengulangan, tambah isi dari variable $totalAkhir dengan total dari setiap menu yang dibeli -->
							<?php $totalAkhir += ($mn["harga"] * $jmlh) ?>
						</tr>
					<?php endforeach; ?>
				<?php endforeach; ?>
				<tr>
					<th colspan="4" class="text-left">
						Total Keseluruhan
					</th>
					<td>Rp <?= $totalAkhir ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<!-- Tombol 'Checkout' | mengirimkan nilai dari $totalKseluruhan ke halaman checkout.php -->
		<?php if ( $totalAkhir > 0 ) : ?>
			<a href="?dir=home&file=checkout&total=<?= $totalAkhir ?>" class="btn btn-primary py-0 ms-1 mt-2">Checkout</a><br>	<!-- Tombol akan tampil jika keranjang kosong -->
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ( isset( $_GET["msg"] ) ) : ?>
	<p class="fst-italic ms-1 mt-2">Checkout Sukses!</p>
<?php endif; ?>