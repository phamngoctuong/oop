<ul class="pagination">
	<?php
if ($page > 1) {
  ?>
	  <li><a href='<?php echo $page_url; ?>' title='Go to the first page.'>First Page</a></li>
	 <?php
}
$total_pages         = ceil($total_rows / $records_per_page);
$range               = 2;
$initial_num         = $page - $range;
$condition_limit_num = ($page + $range) + 1;
for ($x = $initial_num; $x < $condition_limit_num; $x++) {
  if (($x > 0) && ($x <= $total_pages)) {
    if ($x == $page) {
      ?>
	      <li class='active'><a href="#"><?php echo $x; ?><span class="sr-only">current</span></a></li>
	    <?php
} else {
      ?>
	      <li><a href='<?php echo $page_url; ?>page=<?php echo $x; ?>'><?php echo $x; ?></a></li>
	    <?php
}
  }
}
if ($page < $total_pages) {
  ?>
	  <li><a href='<?php echo $page_url; ?>page=<?php echo $total_pages; ?>' title='Last page is <?php echo $total_pages; ?>.'>Last Page</a></li>
	<?php
}
?>
</ul>