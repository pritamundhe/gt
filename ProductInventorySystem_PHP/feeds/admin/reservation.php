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
			<div class="alert alert-success">Under COnstruction</div>
		</table>
			
	</div>
	</center>
	</body>

</html>