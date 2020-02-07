<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';
$database = new Database();
$db       = $database->getConnection();
$product  = new Product($db);
$category = new Category($db);
if (isset($_POST)) {
  $image                = !empty($_FILES["image"]["name"]) ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
  $product->image       = $image;
  $product->id          = $id;
  $product->name        = $_POST['name'];
  $product->price       = $_POST['price'];
  $product->description = $_POST['description'];
  $product->category_id = $_POST['category_id'];
  if ($product->update()) {
    echo $product->uploadPhoto();
    echo "<div class='alert alert-success alert-dismissable'>";
    echo "Product was updated.";
    echo "</div>";
  } else {
    echo "<div class='alert alert-danger alert-dismissable'>";
    echo "Unable to update product.";
    echo "</div>";
  }
}
require_once 'layout_header.php';
?>
<div class='right-button-margin'>
  <a href='index.php' class='btn btn-default pull-right'>Read Products</a>
</div>
<div class="container">
	<form action="/ooo/update_product.php?id=13" method="post" enctype="multipart/form-data">
	  <table class='table table-hover table-responsive table-bordered'>
	    <tr>
	      <td>Name</td>
	      <td><input type='text' name='name' value='Abercrombie Allen Brook Shirt' class='form-control' /></td>
	    </tr>
	    <tr>
	      <td>Price</td>
	      <td><input type='text' name='price' value='70' class='form-control' /></td>
	    </tr>
	    <tr>
	      <td>Description</td>
	      <td><textarea name='description' class='form-control'>Cool red shirt!</textarea></td>
	    </tr>
	    <tr>
	      <td>Category</td>
	      <td>
	        <select class='form-control' name='category_id'>
					  <option>Please select...</option>
						<option value='2'>Electronics</option><option value='1' selected>Fashion</option><option value='3'>Motors</option>
					</select>
	      </td>
	    </tr>
	    <tr>
			    <td>Photo</td>
			    <td><input type="file" name="image" class='form-control' /></td>
			</tr>
	    <tr>
	      <td></td>
	      <td>
	        <button type="submit" class="btn btn-primary">Update</button>
	      </td>
	    </tr>
	  </table>
	</form>
</div>
<?php
require_once 'layout_footer.php';
?>
