<?php include('../db.php');
include('header.php'); 
session_start();
$user = $_SESSION['username'];
$login=mysql_query("select * from user where user_name='$user'")or die(mysql_error());
$row=mysql_fetch_row($login);
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
						<tr><a href="manageuser.php">Manage users</a>  |  </tr>
						<tr><a href="help.php">Help</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			<br>
		<div class="row-fluid">
        <div class="span12">
		<table class="table table-bordered">
			<div class="alert alert-success">Product</div>
		</table>
		
				<form class="form-horizontal" method="POST">
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Name</label>
				<div class="controls">
				<input type="text" id="product_name" name="product_name" placeholder="Name" required>
				</div>
				</div>
				
				<div class="control-group">
							<label class="control-label" for="inputEmail">Product Type</label>
							<div class="controls">
								<select id="product_type" name="product_type" required>
									<option></option>
								<?php 
								$query=mysql_query("select * from type");
								while($row=mysql_fetch_array($query))
								 { ?>
									<option value="<?php echo $row['type_id'];?>"> <?php echo $row['type_name'];?> </option>
									<?php } ?>
								</select>
							</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Volume</label>
				<div class="controls">
				<input type="text" id="product_volume" name="product_volume" placeholder="Volume" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Description</label>
				<div class="controls">
				<input type="text" id="product_description" name="product_description" placeholder="Description" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Cost</label>
				<div class="controls">
				<input type="text" id="product_cost" name="product_cost" placeholder="Cost" required>
				</div>
				</div>
				
				<div class="control-group">
				<label class="control-label" for="inputEmail">Price</label>
				<div class="controls">
				<input type="text" id="product_price" name="product_price" placeholder="Price" required>
				</div>
				</div>
				
				
				<div class="control-group">
				<div class="controls">
				<button type="submit" name="register" class="btn btn-info">Save</button>
				</div>
				</div>
				</form>
				
				<?php
				if (isset($_POST['register'])){
				$product_name=$_POST['product_name'];
				$product_type=$_POST['product_type'];
				$product_volume=$_POST['product_volume'];
				$product_description=$_POST['product_description'];
				$product_cost=$_POST['product_cost'];
				$product_price=$_POST['product_price'];
				
				mysql_query("insert into product (product_name,product_type_id,product_volume,product_description,product_cost,product_price) values('$product_name','$product_type','$product_volume','$product_description','$product_cost','$product_price')")or die(mysql_error());
				
				}
				?>
				
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
						<th>Name</th>
						<th>Type</th>
						<th>Volume</th>
						<th>Description</th>
						<th>Cost</th>
						<th>Price</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
					</thead>
				
					<tbody>
						<?php
						$sql = "select p.*,t.* from product as p , type as t where p.product_type_id =t.type_id group by p.product_type_id";
						$query=mysql_query($sql)or die(mysql_error());
						while($row=mysql_fetch_array($query)){
						?>
						<tr>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[8]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[5]; ?></td>
						<td><?php echo $row[6]; ?></td>
						<td><a class="btn btn-success" href="edit_product.php<?php echo '?id='.$row['product_id']; ?>">Edit</a></td>
						<td><a class="btn btn-danger" href="delete_product.php<?php echo '?id='.$row['product_id']; ?>">Delete</a></td>

						</tr>
						<?php } ?>
					</tbody>
				</table>
				
				
	</div>
	</center>
	</body>

</html>