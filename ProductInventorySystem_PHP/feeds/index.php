<?php include('header.php'); 
$login=mysqli_query($con,"select * from user")or die(mysqli_error());
$row=mysqli_fetch_row($login);
$level = $row[3];

session_start();
session_destroy();
session_start();			
if (isset($_SESSION['username'])){
	if ($level == 1)
		{
			header('location:admin/index.php');
		}
						
	if ($level == 2)
		{
			header('location:member/index.php');
		}
}

?>

	<body>
	<div class="row-fluid">
        <div class="span12">
	<center>
		</br>
		</br>
		<div id="container">
			<div id="header">
				<div class="alert alert-success"><label>Login to the System</label></div>
			</div>
			
			<form method="post"> 
			<table>
				<tr>
					<td><label>User Name</label></td>
					<td><input type="text" id="username" name="username" placeholder="username" required></td>
				</tr>
				
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" id="password" name="password" placeholder="Password" required></td>
				</tr>
				
				<tr>
					<td></td>
					<td><button type="submit" id="submit" name="submit" class="btn btn-success">Login</button></td>
				</tr>
				
			
			</table>
			</form>
			
			<?php
				if (isset($_POST['submit'])){
				$username=$_POST['username'];
				$password=($_POST['password']);
				
				$login=mysqli_query($con, "select * from user where user_name='$username' and user_password='$password'")or die(mysqli_error());
				$count=mysqli_num_rows($login);
				
				$row=mysqli_fetch_row($login);
				$level = $row[3];
				
				
				if ($count > 0){
				
				$_SESSION['username']=$row[1];
					if ($level == 1)
						{
							header('location:admin/index.php');
						}
						
					if ($level == 2)
						{
							header('location:member/index.php');
						}

				}
				
				else{ ?>
				<script type="text/javascript">
					alert("Error Login! Wrong Combination of Username and Password!");
				</script>
				<!--<div class="alert alert-error">Error login! Please check your username or password</div>
				--><?php
				}}
				?>
				
				
			
				
		</div>
	
	
	</center>
</div>
</div>
	</body>
</html>