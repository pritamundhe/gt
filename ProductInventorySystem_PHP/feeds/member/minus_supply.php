<?php
session_start();
include('../db.php');


/*'supplier':$('#supp_supplier_type').val(),
				'type':$('#supp_product_type').val(),
				'qty':$('#supp_product_quantity').val(),
				'note':*/
if($_REQUEST['qty']){
	$sql = "insert into transaction (customer_name,product_id,qty,trans_date,user_id,trans_note,trans_action) values('".$_REQUEST['customername']."',".$_REQUEST['product_id'].",-".$_REQUEST["qty"].",now(),".$_SESSION['userid'].",'".$_REQUEST['note']."','distribute')";
	mysql_query($sql)or die(mysql_error());
}
echo $sql;
return true;

 ?>

