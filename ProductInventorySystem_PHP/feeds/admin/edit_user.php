<?php 
include('header.php');
?>
<body>

<div class="container">
<h1>EDIT USER</h1>

<?php
include('../db.php');

	$id=$_GET['id'];
	$sql = "SELECT * FROM 
			user 
			 WHERE
			 user_id = $id
			 ";
	$result = mysql_fetch_array(mysql_query($sql));

	if(!empty($_GET['error']) && $_GET['error']== '101'){
		$error = "The password did not match!";
	}else{
		$error = "";
	}

	?>
<form class="form-horizontal" action="update_user.php" method="post">    


	<div class="thumbnail">
		<div class="control-group">
	    	<label class="control-label" for="user_name">Username </label>&nbsp;
			<input name="user_name" id="user_name" type="text" value="<?= $result['user_name'] ?>" /><br>
				
			<label class="control-label" for="n_pass">New Password</label>&nbsp;
			<input name="n_pass" id="n_pass"  type="password"/><br>

			<label class="control-label" for="c_pass">Confirm Password</label>&nbsp;
			<input name="c_pass" id="c_pass" type="password" /><br>

			<label class="control-label" for="user_level">Level</label>&nbsp;
			<input name="user_level" id="user_level" type="text" value="<?php echo $result['user_level'] ?>" /><br>

		<input name="user_id" type="hidden" value="<?= $id ?>" />
	    </div>
	</div>
	<input  class="btn btn-success" type="submit" name="btn_update" value="update"/>
</form>

</div>
<font color="red" style=" position: relative;left: 400px;"><?=$error?></font>
</body>
</html>