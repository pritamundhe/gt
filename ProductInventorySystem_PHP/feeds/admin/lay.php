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
			<div class="alert alert-success">Manage Lay Minister</div>
		</table>
				
				<form class="form-horizontal" method="POST">
				<div class="control-group">
				<label class="control-label" for="inputEmail">Lay Minister</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="lay_name" placeholder="Name" required>
				</div>
				</div>
				
				<div class="control-group">
				<div class="controls">
				<button type="submit" name="register_lay" class="btn btn-info">Save</button>
				</div>
				</div>
				</form>
				
				
				<?php
				if (isset($_POST['register_lay'])){
				$lay_name=$_POST['lay_name'];
				
				mysql_query("insert into lay (lay_name) values('$lay_name')")or die(mysql_error());
				header('location:lay.php');
				
				}
				?>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
						<th>Lay Minister</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
					</thead>
				
					<tbody>
						<?php 
						$query=mysql_query("select * from lay")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row['lay_name']; ?></td>
						<td><a class="btn btn-success" href="edit_lay.php<?php echo '?id='.$row['lay_id']; ?>">Edit</a></td>
						<td><a class="btn btn-danger" href="delete_lay.php<?php echo '?id='.$row['lay_id']; ?>">Delete</a></td>

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