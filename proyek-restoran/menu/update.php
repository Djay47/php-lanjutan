<h2>Perbarui Data</h2>
<hr class="my-1">

<!-- Tombol Kembali ke Daftar Kategori -->
<a type="button" class="btn btn-outline-dark btn-sm py-0 m-1" href="?dir=menu&file=select">Kembali</a>

<hr class="my-1">

<?php
	$idmenu = $_GET["id"];
	$menu = $database->query_select("SELECT * FROM menu WHERE idmenu = $idmenu");
?>

<form action="" method="post" class="mt-3" enctype="multipart/form-data">
	<!-- idmenu -->
	<input type="hidden" name="idmenu" value="<?= $idmenu ?>">
	<!-- gambar -->
	<input type="hidden" name="gambarLama" value="<?= $menu[0]["gambar"] ?>">
	
	<table class="table-sm">
		<!-- Menu -->
		<tr>
			<td><label for="menu">Menu</label></td>
			<td>
				: <input type="text" name="menu" id="menu" value="<?= $menu[0]["menu"] ?>" placeholder="<?= $menu[0]["menu"] ?>" required>
			</td>
		</tr>

		<!-- Harga -->
		<tr>
			<td><label for="harga">Harga</label></td>
			<td>
				: <input type="text" name="harga" id="harga" value="<?= $menu[0]["harga"] ?>" placeholder="<?= $menu[0]["harga"] ?>" required>
			</td>
		</tr>

		<!-- Gambar -->
		<tr>
			<td></td>
			<td><img class="" src="../images/<?= $menu[0]["gambar"] ?>"></td>
		</tr>

		<tr>
			<td><label for="gambar">Gambar</label></td>
			<td>: <input type="file" name="gambar" id="gambar"></td>
		</tr>

		<tr>
			<td colspan="2"><button type="submit" name="simpan" class="btn btn-outline-primary btn-sm py-0">Simpan</buton></td>
		</tr>
	</table>
</form>

<?php
	if ( isset($_POST["simpan"]) )
	{
		$idmenu = (int)$_POST["idmenu"];
		$menu = htmlspecialchars($_POST["menu"]);
		$harga = htmlspecialchars($_POST["harga"]);
		
		/*
			Cek apakah terjadi perubahan/pembaruan pada gambar diperbarui.
			$_FILES["gambar"]["error"] = 4 menandakan bahwa tidak ada file (gambar) yang diupload atau tidak terisi atau kosong
		*/
		if ( $_FILES["gambar"]["error"] === 4 )
		{
			$gambar = $_POST["gambarLama"];
		}
		else
		{
			$gambar = upload();
		}

		$queryUpdate = "UPDATE menu SET menu = '$menu', harga = '$harga', gambar = '$gambar' WHERE idmenu = $idmenu";

		if ( $database->query_update($queryUpdate) >= 0 )
		{
			echo "<br>Query Ok!<br>"; 
		}
		else
		{
			echo "Query Failed<br>";
			echo mysqli_error($database->conn);
			echo '<hr><a type="button" class="btn btn-outline-dark btn-sm mx-1 my-2" href="?dir=menu&file=update">Refresh</a><hr>';
		}
	}
?>