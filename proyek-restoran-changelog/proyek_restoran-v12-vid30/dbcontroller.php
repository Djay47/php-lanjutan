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

		// method query_select secara spesifik digunakan untuk mengambil data dari database 
		public function query_select($query)
		{
			// melakukan query pada database
			$result = mysqli_query($this->conn, $query);
			
			// digunakan untuk menampung data
			$rows = [];

			while ( $row = mysqli_fetch_assoc($result) )
			{
				$rows[] = $row;
			}

			return $rows;
		}

		// method query_insert untuk menambah data
		public function query_insert($data)
		{
			$kategori = htmlspecialchars($data['kategori']);

			$query = "INSERT INTO kategori VALUES ( '', '$kategori' )";
			mysqli_query($this->conn, $query);	// melakukan query ke database 

			return mysqli_affected_rows($this->conn);
		}

		public function query_update($data)
		{
			$id = $data["id"];
			$kategori = htmlspecialchars($data["kategori"]);
			
			$query = "UPDATE kategori SET kategori = '$kategori' WHERE idkategori = $id";

			mysqli_query($this->conn, $query);

			return mysqli_affected_rows($this->conn);
		}

		public function query_delete($id)
		{
			$query = "DELETE FROM kategori WHERE idkategori = '$id'";
			mysqli_query($this->conn, $query);

			return mysqli_affected_rows($this->conn);
		}

		// method get_item digunakan untuk mengambil satu baris data (tidak dianjurkan)
		/*
		public function get_item($query)
		{
			$result = mysqli_query($this->conn, $query);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
		*/

		// melakukan query ke database
		public function run_query($query)
		{
			$result = mysqli_query($this->conn, $query);
			// echo "Query OK!";
		}

		// method untuk mengembalikan banyaknya baris data pada suatu database
		public function num_row($query)
		{
			$result = mysqli_query($this->conn, $query);
			$numRows = mysqli_num_rows($result);
			return $numRows;
		}

		public function message($text = "")
		{
			echo $text;
		}
	}
?>