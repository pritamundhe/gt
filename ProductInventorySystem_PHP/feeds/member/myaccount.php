<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['username'];
$login=mysql_query("select * from user where username='$user'")or die(mysql_error());
$row=mysql_fetch_row($login);
$level = $row[3];
$name = $row[4];

if ($level == 1)
	{
		header('location:../admin/index.php');
	}

if ($level == '')
	{
		header('location:../index.php');
	}
?>
	<body>
	<center>
		</br>
		</br>
			<div id="container">
			<div id="header">
				<div class="alert alert-success"><label>Welcome Admin</label></div>
			</div>
			<table>
				<thead>
					<td>
						<tr><a href="index.php">Home</a>  |  </tr>
						<tr><a href="../schedule_member/index.php">Calendar</a>  |  </tr>
						<tr><a href="reservation.php">myReservation</a>  |  </tr>
						<tr><a href="myaccount.php">myAccount</a>  |  </tr>
						<tr><a href="help.php">Help</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			
			<br>
		<div class="row-fluid">
        <div class="span12">
		<table class="table table-bordered">
			<div class="alert alert-success">Manage My Account</div>
		</table>
		<form class="form-horizontal" action="edit_save_account.php" method="post"> 
				
								<?php

					$result = mysql_query("SELECT * FROM user where user_id='$row[0]'");
					while($row = mysql_fetch_array($result))
					  { ?>
					  <div class="thumbnail">
					<div class="control-group">
					<label class="control-label" for="inputEmail">Username</label>
					<div class="controls">
					<input name="user_id" type="hidden" value="<?php echo  $row['user_id'] ?>" />
					<input name="username" type="text" value="<?php echo $row['username'] ?>" />
					</div>
					</div>
					
					<div class="control-group">
					<label class="control-label" for="inputEmail">Password</label>
					<div class="controls">
						<input name="password" type="text" value="<?php echo $row['password'] ?>" />
					</div>
					</div>

						<div class="control-group">
					<label class="control-label" for="inputEmail">Firstname</label>
					<div class="controls">
						<input name="first_name" type="text" value="<?php echo $row['first_name'] ?>" />
					</div>
					</div>
					
						<div class="control-group">
					<label class="control-label" for="inputEmail">Lastname</label>
					<div class="controls">
						<input name="last_name" type="text" value="<?php echo $row['last_name'] ?>" />
					</div>
					</div>
					
							<div class="control-group">
					<label class="control-label" for="inputEmail">Contact Number</label>
					<div class="controls">
						<input name="contact_no" type="text" value="<?php echo $row['contact_no'] ?>" />
					</div>
					</div>
					
					</div>

					<br>
					

					
					  
					  <?php 
					  }

				?>
				<input name="edit_account" class="btn btn-success" type="submit" value="Update">
				</form>
				
		<br/>
		<br/>
		</div>		
		</div>		
	</div>
	</center>
	</body>

</html>