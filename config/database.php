<?php
class Database
{
	private $conn;
  private $servername = "localhost";
  private $database   = "php_oop_crud_level_1";
  private $username   = "root";
  private $password   = "";
  function getConnection()
	{
	try {
	  $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}		
		return $this->conn;
	}
}
?>
