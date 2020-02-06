<?php
class Product
{
  private $conn;
  private $table = "products";
  public $id;
  public $name;
  public $description;
  public $image;
  public $price;
  public $category_id;
  public $created;
  public function __construct($db)
  {
    $this->conn = $db;
  }
  public function readAll($from_record_num, $records_per_page)
  {
    $query = "SELECT * FROM {$this->table} LIMIT {$from_record_num}, {$records_per_page}";
    $stmt  = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
  public function countAll()
  {
    $query = "SELECT count(*) as total FROM {$this->table}";
    $stmt  = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
  }
  public function readOne()
  {
    $query = "SELECT * FROM {$this->table} WHERE id={$this->id}";
    $stmt  = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
  public function delete() {
  	$query = "DELETE FROM {$this->table} WHERE id={$this->id}";
  	$stmt  = $this->conn->prepare($query);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function create()
  {
    $query             = "INSERT INTO " . $this->table . " SET name=:name, price=:price, description=:description, category_id=:category_id, image=:image, created=:created";
    $stmt              = $this->conn->prepare($query);
    $this->name        = htmlspecialchars(strip_tags($this->name));
    $this->price       = htmlspecialchars(strip_tags($this->price));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->image       = htmlspecialchars(strip_tags($this->image));
    $this->created   = date('Y-m-d H:i:s');
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":image", $this->image);
    $stmt->bindParam(":created", $this->created);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
