<?php
include('../db.php');
$id=$_GET['id'];

mysql_query("delete from user where user_id='$id'")or die(mysql_error());
header( 'Location: http://localhost/feeds/feeds_supply/admin/manageuser.php' );



?>