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
				<div class="alert alert-success"><label>Welcome User</label></div>
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
			<div class="alert alert-success">My Reservation Management</div>
		</table>
		
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
						<th>Event Name</th>
						<th>Type</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						</tr>
					</thead>
				
					<tbody>
						<?php 
						$login=mysql_query("select * from user where username='$user'")or die(mysql_error());
						$row=mysql_fetch_row($login);
						$user = $row[0];
						$m = date('m');
						$d = date('d');
						$y = date('Y');
						
						$query=mysql_query("select * from sched where user_id ='$user'")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
						<tr>
						<td><a href="../schedule_member/view_sched2.php?id=<?php echo $row['sched_id'];?>"><?php echo $row['event_name']; ?></a></td>
						
						<td><?php 
						$event_type = $row['event_id'];
						$query1=mysql_query("select * from event where event_id ='$event_type'")or die(mysql_error());
						$row1=mysql_fetch_array($query1);
						echo $row1['event_name']; 
						
						?></td>
						
						<td><?php echo $row['month'].'-'.$row['date'].'-'.$row['year'].' '.$row['day']; ?></td>
						
						<td><?php echo $row['time1'].' to '.$row['time2']; ?></td>
						
						<td><?php 
						if ($row['approval']==1)
						{
							echo 'APPROVED';
						} 
						else if ($row['approval']==2)
						{
							echo 'PENDING';
						}
						else
						{
							echo 'UNKNOWN';
						}
						?>
						</td>

						</tr>
						<?php } ?>
					</tbody>
				</table>
			
	</div>
	</center>
	</body>

</html>