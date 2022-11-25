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

		// saat sebuah object di-instance maka nilai dari property $conn akan dinisialisasi dengan nilai kembalian dari method connect
		public function __construct()
		{
			$this->conn = $this->connect();
		}

		// melakukan query ke database
		public function run_query($query)
		{
			$result = mysqli_query($this->conn, $query);
			// echo "Query OK!";
		}

		// method query_select secara spesifik digunakan untuk mengambil data dari database 
		public function query_select($query)
		{
			// melakukan query pada database
			$result = mysqli_query($this->conn, $query);
			
			// digunakan untuk menampung dat
			$rows = [];

			while ( $row = mysqli_fetch_assoc($result) )
			{
				$rows[] = $row;
			}

			return $rows;
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

	$database = new Database();
?>