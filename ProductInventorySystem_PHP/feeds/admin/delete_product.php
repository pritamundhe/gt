<?php
include('../db.php');
$id=$_GET['id'];

mysql_query("delete from product where product_id='$id'")or die(mysql_error());
header('location:product.php');



?>