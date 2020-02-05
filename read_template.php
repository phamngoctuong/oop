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
  <tr>
    <td>Abercrombie Allen Brook Shirt </td>
    <td>70</td>
    <td>Cool sred shirt!</td>
    <td>
      Fashion </td>
    <td>
      <a href='read_one.php?id=13' class='btn btn-primary left-margin'>
        <span class='glyphicon glyphicon-list'></span> Read
      </a>
      <a href='update_product.php?id=13' class='btn btn-info left-margin'>
        <span class='glyphicon glyphicon-edit'></span> Edit
      </a>
      <a delete-id='13' class='btn btn-danger delete-object'>
        <span class='glyphicon glyphicon-remove'></span> Delete
      </a>
    </td>
  </tr>
  <tr>
    <td>Abercrombie Lake Arnold Shirt </td>
    <td>60</td>
    <td>Perfect as gift!</td>
    <td>
      Fashion </td>
    <td>
      <a href='read_one.php?id=12' class='btn btn-primary left-margin'>
        <span class='glyphicon glyphicon-list'></span> Read
      </a>
      <a href='update_product.php?id=12' class='btn btn-info left-margin'>
        <span class='glyphicon glyphicon-edit'></span> Edit
      </a>
      <a delete-id='12' class='btn btn-danger delete-object'>
        <span class='glyphicon glyphicon-remove'></span> Delete
      </a>
    </td>
  </tr>
  <tr>
    <td>Amanda Waller Shirt </td>
    <td>333</td>
    <td>New awesome shirt!</td>
    <td>
      Fashion </td>
    <td>
      <a href='read_one.php?id=31' class='btn btn-primary left-margin'>
        <span class='glyphicon glyphicon-list'></span> Read
      </a>
      <a href='update_product.php?id=31' class='btn btn-info left-margin'>
        <span class='glyphicon glyphicon-edit'></span> Edit
      </a>
      <a delete-id='31' class='btn btn-danger delete-object'>
        <span class='glyphicon glyphicon-remove'></span> Delete
      </a>
    </td>
  </tr>
  <tr>
    <td>Another product </td>
    <td>555</td>
    <td>Awesome product!</td>
    <td>
      Electronics </td>
    <td>
      <a href='read_one.php?id=26' class='btn btn-primary left-margin'>
        <span class='glyphicon glyphicon-list'></span> Read
      </a>
      <a href='update_product.php?id=26' class='btn btn-info left-margin'>
        <span class='glyphicon glyphicon-edit'></span> Edit
      </a>
      <a delete-id='26' class='btn btn-danger delete-object'>
        <span class='glyphicon glyphicon-remove'></span> Delete
      </a>
    </td>
  </tr>
  <tr>
    <td>Bag </td>
    <td>999</td>
    <td>Awesome bag for you!</td>
    <td>
      Fashion </td>
    <td>
      <a href='read_one.php?id=27' class='btn btn-primary left-margin'>
        <span class='glyphicon glyphicon-list'></span> Read
      </a>
      <a href='update_product.php?id=27' class='btn btn-info left-margin'>
        <span class='glyphicon glyphicon-edit'></span> Edit
      </a>
      <a delete-id='27' class='btn btn-danger delete-object'>
        <span class='glyphicon glyphicon-remove'></span> Delete
      </a>
    </td>
  </tr>
</table>
<?php  
	require_once "paging.php";
?>