<?php
	if ( isset( $_GET["total"] ) )
	{
		$total = $_GET["total"];
		$idpesanan = idpesanan_increment();
		var_dump($idpesanan);
		$idpelanggan = (int)$_SESSION["idpelanggan"];	// variable $_SESSION["idpelanggan"] didapatkan setelah login
		$tgl = date("Y-m-d");

		// query SELECT ke table pesanan 
		$querySelect = "SELECT * FROM pesanan WHERE idpesanan = $idpesanan";
		$numRows = $database->num_row($querySelect);
		
		// cek apakah didalam table pesanan terdapat idpesanan yang sama dengan $idpesanan 
		if ( $numRows == 0 )
		{
			// Jika tidak ada maka tambahkan baris data baru ke table pesanan dengan idpesanan sesuai dengan nilai dari $idpesanan
			insert_pesanan($idpesanan, $idpelanggan, $tgl, $total);
			
			// dan tambahkan baris data baru ke table detailpesanan dengan idpesanan sesuai dengan nilai dari $idpesanan
			insert_detailpesanan($idpesanan);
		}
		else
		{
			// Jika ada maka cukup tambahkan baris data (record) ke table detailpesanan dengan idpesanan = $idpesanan
			insert_detailpesanan($idpesanan);
		}

		// Hapus Pesanan dari Daftar Keranjang Belanja
		delete_keranjang();
		
		header("Location: ?dir=home&file=keranjang&msg=true");
	}

	// Auto Increment field idpesanan
	function idpesanan_increment()
	{
		global $database;

		$query = "SELECT idpesanan FROM pesanan ORDER BY idpesanan DESC";
		$numRows = $database->num_row($query);
		
		// Cek apakah sudah ada pesanan atau belum
		if ( $numRows == 0 )
		{
			$idpesanan = 1;	// Jika belum ada pesanan inisialisai variable $idpesanan dengan 1
		}
		else
		{
			// JIka sudah ada pesanan, 
				// lakukan query SELECT: SELECT idpesanan FROM pesanan ORDER BY idpesanan DESC
			$pesanan = $database->query_select($query)[0];
			$idpesanan = (int)$pesanan["idpesanan"];
			++$idpesanan;
		}

		return $idpesanan;
	}

	// INSERT data ke table pesanan
	function insert_pesanan($idpesanan, $idpelanggan, $tglpesanan, $total)
	{
		global $database;
		
		// queryInsert ke table idpesanan
		$query = "INSERT INTO pesanan VALUES ($idpesanan, $idpelanggan, '$tglpesanan', $total, 0, 0, 0)";
		$database->query_insert($query);
	}

	// INSERT data ke table idpesanan
	function insert_detailpesanan($idpesanan)
	{
		global $database;
		
		foreach ( $_SESSION["keranjang"] as $pesanan => $jmlh )
		{
			// query SELECT ke table menu dengan menu = $key
			$querySelect = "SELECT * FROM menu WHERE menu = '$pesanan'";
			$menu = $database->query_select($querySelect);

			foreach ( $menu as $mn )
			{
				$idmenu = $mn["idmenu"];
				$harga = $mn["harga"];

				// query INSERT ke table detailpesanan
				$query = "INSERT INTO detailpesanan VALUES ('', $idpesanan, $idmenu, $jmlh, $harga)";
				$database->query_insert($query);
			}
		}
	}

	// Hapus Pesanan dari Daftar Keranjang Belanja
	function delete_keranjang()
	{
		foreach( $_SESSION["keranjang"] as $pesanan => $jmlh )
		{
			unset( $_SESSION["keranjang"]["$pesanan"] );
		}
	}
?>