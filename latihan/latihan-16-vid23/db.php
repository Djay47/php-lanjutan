<?php
	class Database {
		public $servername = "localhost";
		private $username = "root";
		public $password = "";
		private $database = "restoran";

		public function __construct()
		{
			echo "Lorep ipsum...<br>";
		}

		public function select_data()
		{
			return "Hello world!";
		}

		public function get_data()
		{
			return $this->database;
		}

		public function calling()
		{
			return $this->select_data();
		}

		public static function display()
		{
			echo "Hello world!<br>";
		}
	}

	Database::display();

	// $dbbuku = new Database();
	// var_dump($dbbuku);

	// echo $dbbuku->select_data() . "<br>";
	// echo "Servername: " . $dbbuku->servername . "<br>";
	// echo "Database: " . $dbbuku->get_data() . "<br>";
	// echo $dbbuku->calling();
?>