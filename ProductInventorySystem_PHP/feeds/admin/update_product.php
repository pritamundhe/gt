<?php
include('../db.php');



$sql = "UPDATE product SET 
		product_name = '".$_POST['product_name']."' ,
		product_volume = '".$_POST['volume']."',
		product_description = '".$_POST['description']."',
		product_cost = ".$_POST['cost'].",
		product_price = ".$_POST['price'].",
		product_type_id = ".$_POST['product_type']."
		WHERE
		product_id = ".$_POST['product_id'] ;


		
	$result = mysql_query($sql);
	header( 'Location: http://localhost/feeds/feeds_supply/admin/product.php' ) ;
?>