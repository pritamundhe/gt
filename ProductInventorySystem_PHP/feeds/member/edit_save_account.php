<?php
include('../db.php');
$user_id=$_POST['user_id'];
$username=$_POST['username'];
$password=$_POST['password'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$contact_no=$_POST['contact_no'];

	$result = mysql_query("UPDATE user SET username='$username', password='$password', first_name='$first_name', last_name='$last_name', contact_no='$contact_no' where user_id='$user_id'")or die(mysql_error());

header("location: index.php");

?>