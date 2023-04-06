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
			<div class="alert alert-success">Sales</div>
		</table>
				
				<form class="form-horizontal" method="POST">
				<div class="control-group">
				<label class="control-label" for="inputEmail">Customer Name</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="sales_customer" placeholder="Name" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Sales Type</label>
				<div class="controls">
					<select name="sales_type" required>
						<option></option>
						<option>Mass</option>
						<option>Reservation</option>
						<option>Donation</option>
					</select>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Sales Cost</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="sales_cost" placeholder="Cost" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Sales Date</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="sales_date" value="<?php echo date("m-d-Y"); ?>" required disabled>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">OR Number</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="sales_or" placeholder="OR Number" required>
				</div>
				</div>
				
				<div class="control-group">
				<div class="controls">
				<button type="submit" name="register_sales" class="btn btn-info">Save</button>
				</div>
				</div>
				</form>
				
				
				<?php
				if (isset($_POST['register_sales'])){
				$sales_customer=$_POST['sales_customer'];
				$sales_type=$_POST['sales_type'];
				$sales_cost=$_POST['sales_cost'];
				$sales_date=date("m-d-Y");
				$sales_or=$_POST['sales_or'];
				
				mysql_query("insert into sales (sales_customer,sales_type,sales_cost,sales_date,sales_or) values('$sales_customer','$sales_type','$sales_cost','$sales_date','$sales_or')")or die(mysql_error());
				 
				} 
				?>
		
		<table class="table table-bordered">
			<div class="alert alert-success">Sales for this Day <?php echo date("m-d-Y"); ?></div>
		</table>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
					<thead>
						<tr>
						<th>Customer Name</th>
						<th>Type of Sales</th>
						<th>Date</th>
						<th>OR Number</th>
						<th>Cost of Sales</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 
						$date = date("m-d-Y");
						$query=mysql_query("select * from sales where sales_date = '$date';")or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row['sales_customer']; ?></td>
						<td><?php echo $row['sales_type']; ?></td>
						<td><?php echo $row['sales_date']; ?></td>
						<td><?php echo $row['sales_or']; ?></td>
						<td><?php echo $row['sales_cost']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php
					$date = date("m-d-Y");
					$result = mysql_query("SELECT sum(sales_cost) FROM sales where sales_date = '$date'") or die(mysql_error());
						while ($rows = mysql_fetch_array($result)) { ?>

							<div class="pull-right">
								<div class="span"><div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total Sales Today:&nbsp;<?php echo $rows['sum(sales_cost)']; ?></div></div>
							</div>
					<?php } ?>
		
		</div>		
		</div>		
	</div>
	</center>
	</body>

</html>