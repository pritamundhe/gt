<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['username'];
$login=mysqli_query($con,"select * from user where user_name='$user'")or die(mysqli_error());
$row=mysqli_fetch_row($login);
$level = $row[3];

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
						<tr><a href="product.php">Product</a>  |  </tr>
						<tr><a href="inventory.php">Inventory</a>  |  </tr>
						<tr><a href="myaccount.php">myAccount</a>  |  </tr>
						<tr><a href="help.php">Help</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			<br/>
				
			</div>
	</center>
	</body>

</html>