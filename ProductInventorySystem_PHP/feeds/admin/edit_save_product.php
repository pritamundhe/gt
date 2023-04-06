<?php
include('../db.php');
$announce_id=$_POST['announce_id'];
$announce_content=$_POST['announce_content'];

	$result = mysql_query("UPDATE announce SET announce_content='$announce_content' where announce_id='$announce_id'")or die(mysql_error());

header("location: announcement.php");

?>