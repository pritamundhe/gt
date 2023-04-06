<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['username'];
$login=mysql_query("select * from user where username='$user'")or die(mysql_error());
$row=mysql_fetch_row($login);
$level = $row[3];
$name = $row[4];

if ($level == 2)
	{
		header('location:../member/index.php');
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
						<tr><a href="../schedule_admin/index.php">Scheduling</a>  |  </tr>
						<tr><a href="sales.php">Sales</a>  |  </tr>
						<tr><a href="reservation.php">Reservation</a>  |  </tr>
						<tr><a href="priest.php">Priest</a>  |  </tr>
						<tr><a href="lay.php">Lay</a>  |  </tr>
						<tr><a href="choir.php">Choir</a>  |  </tr>
						<tr><a href="member.php">Member</a>  |  </tr>
						<tr><a href="myaccount.php">myAccount</a>  |  </tr>
						<tr><a href="announcement.php">Announcements</a>  |  </tr>
						<tr><a href="help.php">Help</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			<br>
		<div class="row-fluid">
        <div class="span12">
				
				<table class="table table-bordered">
			<div class="alert alert-success">Manage Priest</div>
		</table>
				
				<form class="form-horizontal" method="POST">
				<div class="control-group">
				<label class="control-label" for="inputEmail">Priest Name</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="priest_name" placeholder="Name" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Address</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="priest_address" placeholder="Address" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Birthday</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="priest_bday" placeholder="Birthday" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Telephone</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="priest_telephone" placeholder="Telephone" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Position</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="priest_position" placeholder="Position" required>
				</div>
				</div>
				
				<div class="control-group">
				<div class="controls">
				<button type="submit" name="register_priest" class="btn btn-info">Save</button>
				</div>
				</div>
				</form>
				
				
				<?php
				if (isset($_POST['register_priest'])){
				$priest_name=$_POST['priest_name'];
				$priest_address=$_POST['priest_address'];
				$priest_bday=$_POST['priest_bday'];
				$priest_telephone=$_POST['priest_telephone'];
				$priest_position=$_POST['priest_position'];
				
				mysql_query("insert into priest (priest_name,priest_address,priest_bday,priest_telephone,priest_position) values('$priest_name','$priest_address','$priest_bday','$priest_telephone','$priest_position')")or die(mysql_error());
				header('location:priest.php');
				
				}
				?>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
						<th>Priest</th>
						<th>Address</th>
						<th>Birthday</th>
						<th>Telephone</th>
						<th>Position</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
					</thead>
				
					<tbody>
						<?php 
						$query=mysql_query("select * from priest")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row['priest_name']; ?></td>
						<td><?php echo $row['priest_address']; ?></td>
						<td><?php echo $row['priest_bday']; ?></td>
						<td><?php echo $row['priest_telephone']; ?></td>
						<td><?php echo $row['priest_position']; ?></td>
						<td><a class="btn btn-success" href="edit_priest.php<?php echo '?id='.$row['priest_id']; ?>">Edit</a></td>
						<td><a class="btn btn-danger" href="delete_priest.php<?php echo '?id='.$row['priest_id']; ?>">Delete</a></td>

						</tr>
						<?php } ?>
					</tbody>
				</table>

		</div>		
		</div>	
	</div>
	</center>
	</body>

</html>