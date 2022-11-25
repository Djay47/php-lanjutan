<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "restoran";

	// menghubungkan ke database
	$conn = mysqli_connect($servername, $username, $password, $database);

	// digunakan untuk mengambil data
	function query_select($query)
	{
		global $conn;

		// melakukan query pada database
		$result = mysqli_query($conn, $query);

		// digunakan untuk menampung data
		$rows = [];

		// mengambil data (fetch) dari object mysqli_result
		while($row = mysqli_fetch_assoc($result))
		{
			$rows[] = $row;
		}
		
		return $rows;
	}

	function query_insert($data)
	{
		global $conn;
		
		$kategori = htmlspecialchars($data['kategori']);

		$query = "INSERT INTO kategori VALUES ( '', '$kategori' )";
		mysqli_query($conn, $query);	// melakukan query ke database 

		return mysqli_affected_rows($conn);	// mengembalikan nilai 1 jika berhasil, mengembalikan nilai -1 jika gagal
	}
?>