<?php
	class Database
	{
		public $servername = "localhost";
		public $username = "root";
		public $password = "";
		public $database = "restoran";
		public $conn;

		// method yang mengembalikan nilai dari variable $conn
		public function connect()
		{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
			return $conn;
		}

		// saat sebuah object di-instance property $conn akan dinisialisasi dengan nilai kembalian dari method connect
		public function __construct()
		{
			$this->conn = $this->connect();
		}

		// Method untuk menjalankan SQL query SELECT
		public function query_select($query)
		{
			$result = mysqli_query($this->conn, $query);	// melakukan query dan kemudian disimpan ke variable $result
			$rows = [];	// digunakan untuk menampung data
			while ( $row = mysqli_fetch_assoc($result) )
			{
				$rows[] = $row;
			}
			return $rows;
		}

		// Method untuk menjalankan SQL query INSERT
		public function query_insert($query)
		{
			mysqli_query($this->conn, $query);
			return mysqli_affected_rows($this->conn);
		}
		
		// Method untuk menjalankan SQL query UPDATE
		public function query_update($query)
		{
			mysqli_query($this->conn, $query);
			return mysqli_affected_rows($this->conn);
		}

		// Method untuk menjalankan SQL query DELETE
		public function query_delete($query)
		{
			mysqli_query($this->conn, $query);
			return mysqli_affected_rows($this->conn);
		}

		// Method untuk upload gambar
		public function upload()
		{
			$namaFile = $_FILES["gambar"]["name"];
			$tipeFile = $_FILES["gambar"]["type"];
			$tmpName = $_FILES["gambar"]["tmp_name"];
			$tipeValid = ["image/jpg", "image/jpeg", "image/png"];

			// Cek pakah yang diupload adalah gambar
			if ( !( in_array( $tipeFile, $tipeValid ) ) )
			{
				echo "Upload Error!<br>";
				echo "Ekstensi File Salah!<br>";
				return false;
			}

			// Membuat nama gambar baru agar tidak terjadi masalah duplikat file
				// memecah nama file menjadi sebuah array
			$ekstensiFile = explode( '.', $namaFile );
			$ekstensiFile = end( $ekstensiFile );
				// merangkai nama file baru menggunakan function uniqid yang mengembalikan angka random
			$namaFileBaru = uniqid() . '.' . $ekstensiFile;

			// melakukan upload gambar (dari penyimpanan sementara ke penyimpanan tertentu relatif terhadap file ini)
			move_uploaded_file($tmpName, '../images/' . $namaFileBaru);

			// method ini mengembalikan nil
			return $namaFileBaru;
		}

		// melakukan query ke database
		public function run_query($query)
		{
			mysqli_query($this->conn, $query);
			// echo "Query OK!";
		}

		// method untuk mengembalikan banyaknya baris data pada suatu database
		public function num_row($query)
		{
			$result = mysqli_query($this->conn, $query);
			$numRows = mysqli_num_rows($result);
			return $numRows;
		}
	}
?>