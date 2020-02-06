<?php  
	require_once 'config/database.php';
	$database = new Database;
	$db       = $database->getConnection();
	require_once 'objects/product.php';
	$product = new Product($db);
	require_once 'layout_header.php';
	$id = isset($_GET['id']) ? $_GET['id'] : 1;
	$product->id = $id;
	require_once 'objects/category.php';
	$category = new Category($db);
	$readone = $product->readOne();
	$one = $readone->fetch(PDO::FETCH_ASSOC);
?>
<div class='right-button-margin'>
  <a href='index.php' class='btn btn-primary pull-right'>
    <span class='glyphicon glyphicon-list'></span> Read Products
  </a>
</div>
<table class='table table-hover table-responsive table-bordered'>
  <tr>
    <td>Name</td>
    <td><?php echo $one['name']; ?></td>
  </tr>
  <tr>
    <td>Price</td>
    <td>&#36;<?php echo $one['price']; ?></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><?php echo $one['description']; ?></td>
  </tr>
  <tr>
    <td>Category</td>
    <td>
    	<?php 
    		$category->id =  $one['category_id'];
    		echo $category->readName();
    	 ?>
    </td>
  </tr>
  <tr>
    <td>Image</td>
    <td>
    		<img src='uploads/<?php echo $one['image']; ?>' style='width:300px;' />    
    </td>
	</tr>
</table>
<?php  
	require_once 'layout_footer.php';
?>