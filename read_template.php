<form role='search' action='search.php'>
  <div class='input-group col-md-3 pull-left margin-right-1em'>
    <input type='text' class='form-control' placeholder='Type product name or description...' name='s' id='srch-term' required />
    <div class='input-group-btn'>
      <button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>
    </div>
  </div>
</form>
<div class='right-button-margin'>
  <a href='create_product.php' class='btn btn-primary pull-right'>
    <span class='glyphicon glyphicon-plus'></span> Create Product
  </a>
</div>
<table class='table table-hover table-responsive table-bordered'>
  <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Description</th>
    <th>Category</th>
    <th>Actions</th>
  </tr>
  	<?php  
  		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  	?>
  	<tr>
	  	<td><?php echo $row['name'] ?></td>
	    <td><?php echo $row['price'] ?></td>
	    <td><?php echo $row['description'] ?></td>
	    <td>
	    	<?php 
	    		$category->id = $row['category_id'];
		    	echo $category->readName();
	    	?>
	    </td>
	    <td>
	      <a href='read_one.php?id=<?php echo $row['id']; ?>' class='btn btn-primary left-margin'>
	        <span class='glyphicon glyphicon-list'></span> Read
	      </a>
	      <a href='update_product.php?id=<?php echo $row['id']; ?>' class='btn btn-info left-margin'>
	        <span class='glyphicon glyphicon-edit'></span> Edit
	      </a>
	      <a delete-id='<?php echo $row['id']; ?>' class='btn btn-danger delete-object demo-2'>
	        <span class='glyphicon glyphicon-remove'></span> Delete
	      </a>
	    </td>
	  </tr>
  	<?php
  		}
		?>
</table>
<?php  
	require_once "paging.php";
?>