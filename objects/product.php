<?php  
	class Product {
		private $conn;
		private $table = "products";
		public $id;
		public $name;
		public $description;
		public $image;
		public $price;
		public $category_id;
		public $created;
		function __construct($db)
		{
			$this->conn = $db;
		}
		public function readAll($from_record_num, $records_per_page) {
			$query = "SELECT * FROM {$this->table} LIMIT {$from_record_num}, {$records_per_page}";
			$stmt  = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt;
		}
		public function countAll() {
			$query = "SELECT count(*) as total FROM {$this->table}";
			$stmt  = $this->conn->prepare($query);
	    $stmt->execute();
	    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
		}
	}
?>