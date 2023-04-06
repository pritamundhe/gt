<?php include('../db.php');
include('header.php'); 
session_start();
// $user = $_SESSION['username'];
// $login=mysql_query("select * from user where username='$user'")or die(mysql_error());
// $row=mysql_fetch_row($login);

?>
	<body>

	<center>
		<h1>MANAGE USER</h1>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
				<th>Username</th>
				<th>User level</th>
				</tr>
			</thead>
		
			<tbody>
				<?php 
				$sql = mysql_query("SELECT * FROM user ");
				while($row=mysql_fetch_array($sql)){
				?>
				<tr>
					<td><?php echo $row['user_name']; ?></td>
					<td><?php echo $row['user_level']; ?></td>
					<td><a class="btn btn-success" href="edit_user.php<?php echo '?id='.$row['user_id']; ?>">Edit</a></td>
					<td><a class="btn btn-danger" href="delete_user.php<?php echo '?id='.$row['user_id']; ?>">Delete</a></td>

				</tr>
				<?php } ?>
			</tbody>
		</table>
	</center>
	</body>

</html>