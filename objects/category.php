<?php  
	class Category
	{
		private $conn;
		private $table = 'categories';
		public $id;
		public $name;
		public $created;
		public function __construct($db)
		{
			$this->conn = $db;
		}
		public function readName()
	  {
	    $query = "SELECT name FROM " . $this->table . " WHERE id = ? limit 0,1";
	    $stmt  = $this->conn->prepare($query);
	    $stmt->bindParam(1, $this->id);
	    $stmt->execute();
	    $row        = $stmt->fetch(PDO::FETCH_ASSOC);
	    return $this->name = $row['name'];
	  }
		public function read()
	  {
	    $query = "SELECT id, name FROM " . $this->table . " ORDER BY name";
	    $stmt  = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt;
	  }
	}
?>