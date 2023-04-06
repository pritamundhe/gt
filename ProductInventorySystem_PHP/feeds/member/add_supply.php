<?php
session_start();
include('../db.php');
echo $_REQUEST['supplier'];


if($_REQUEST['qty']){
	$sql = "insert into transaction (partner_id,product_id,qty,trans_date,user_id,trans_note,trans_action) values(".$_REQUEST["supplier"].",".$_REQUEST["type"].",".$_REQUEST["qty"].",now(),".$_SESSION['userid'].",'".$_REQUEST['note']."','add')";
	mysql_query($sql)or die(mysql_error());
}
echo $sql;
return true;

 ?>