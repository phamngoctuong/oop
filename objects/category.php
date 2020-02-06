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
		public function readName() {
			$query = "SELECT * FROM {$this->table} WHERE id={$this->id}";
			$stmt  = $this->conn->prepare($query);
	    $stmt->execute();
	    $array = $stmt->fetch(PDO::FETCH_ASSOC);
	    return $array['name'];
		}
	}
?>