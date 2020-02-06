<?php
require_once 'config/database.php';
require_once 'config/core.php';
$database = new Database;
$db       = $database->getConnection();
require_once 'objects/product.php';
$product = new Product($db);
require_once 'objects/category.php';
$category = new Category($db);
$readall = $product->readAll($from_record_num,$records_per_page);
$total_rows = $product->countAll();
$page_url   = "index.php?";
require_once 'layout_header.php';
require_once 'read_template.php';
require_once 'layout_footer.php';
