<?php
include('../db.php');
var_dump($_POST['n_pass']);
if(!empty($_POST['n_pass'])){

	if($_POST['n_pass'] !== $_POST['c_pass']){
		header( 'Location: http://localhost/feeds/feeds_supply/admin/edit_user.php?id='.$_POST['user_id'].'&error=101' ) ;
	}
	$pass = true;
}else{
	$pass = false;
}

if($pass === true){
	$sql = "UPDATE user SET
		user_name = '".$_POST['user_name']."' ,
		user_level = '".$_POST['user_level']."',
		user_password = '".$_POST['n_pass']."'
		WHERE
		user_id = ".$_POST['user_id'] ;
}else{
	$sql = "UPDATE user SET
			user_name = '".$_POST['user_name']."' ,
			user_level = '".$_POST['user_level']."'
			WHERE
			user_id = ".$_POST['user_id'] ;
}

	$result = mysql_query($sql);
	var_dump($sql);
	header( 'Location: http://localhost/feeds/feeds_supply/admin/manageuser.php' ) ;
?>