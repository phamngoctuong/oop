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
    $query = "SELECT name, price, description, category_id, image FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row               = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->name        = $row['name'];
    $this->price       = $row['price'];
    $this->description = $row['description'];
    $this->category_id = $row['category_id'];
    $this->image       = $row['image'];
  }
  public function delete()
  {
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
    $this->created     = date('Y-m-d H:i:s');
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
  public function uploadPhoto()
  {
    $result_message = "";
    if ($this->image) {
      $target_directory           = "uploads/";
      $target_file                = $target_directory . $this->image;
      $file_type                  = pathinfo($target_file, PATHINFO_EXTENSION);
      $file_upload_error_messages = "";
      $check                      = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
      } else {
        $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
      }
      $allowed_file_types = ["jpg", "jpeg", "png", "gif"];
      if (!in_array($file_type, $allowed_file_types)) {
        $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
      }
      if (file_exists($target_file)) {
        $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
      }
      if ($_FILES['image']['size'] > (88024000)) {
        $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
      }
      if (!is_dir($target_directory)) {
        mkdir($target_directory, 0777, true);
      }
      if (empty($file_upload_error_messages)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
          $result_message .= "<div class='alert alert-danger'>";
          $result_message .= "<div>Unable to upload photo.</div>";
          $result_message .= "<div>Update the record to upload photo.</div>";
          $result_message .= "</div>";
        }
      } else {
        $result_message .= "<div class='alert alert-danger'>";
        $result_message .= "{$file_upload_error_messages}";
        $result_message .= "<div>Update the record to upload photo.</div>";
        $result_message .= "</div>";
      }
    }
    return $result_message;
  }
  public function update()
  {
    $query = "UPDATE {$this->table} SET name=:name, description=:description, image=:image, price=:price, category_id=:category_id WHERE id=:id";
    $stmt  = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":image", $this->image);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":id", $this->id);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function search($search_term, $from_record_num, $records_per_page)
  {
    $query       = "SELECT c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created FROM " . $this->table . " p LEFT JOIN categories c ON p.category_id = c.id WHERE p.name LIKE ? OR p.description LIKE ? ORDER BY p.name ASC LIMIT ?, ?";
    $stmt        = $this->conn->prepare($query);
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
  }
  public function countAll_BySearch($search_term)
  {
    $query       = "SELECT COUNT(*) as total_rows FROM " . $this->table . " p  WHERE p.name LIKE ? OR p.description LIKE ?";
    $stmt        = $this->conn->prepare($query);
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['total_rows'];
  }
}
