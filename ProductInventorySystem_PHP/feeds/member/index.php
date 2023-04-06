<?php include('../db.php');
include('header.php'); 
session_start();

$user = $_SESSION['username'];
$login=mysql_query("select * from user where user_name='$user'")or die(mysql_error());
$row=mysql_fetch_row($login);
$_SESSION['userid'] = $row[0];
$level = $row[3];
$name = $row[1];

?>
	<body>
	<center>
		</br>
		</br>
			<div id="container">
			<div id="header">
				<div class="alert alert-success"><label>Welcome Member</label></div>
			</div>
			
			<table>
				<thead>
					<td>
						<tr><a href="index.php">Home</a>  |  </tr>
						<tr><a href="../logout.php">Logout</a>  |  </tr>
					</td>
				</thead>
			</table>
			<br/>
			<table class="table table-bordered">
				<div class="alert alert-success">Church Announcements</div>
			</table>
			<div style="float:left;">


			<h4>Recieve</h4>
		
	
				<label for="product_type">Supplier</label>
				<div>
					<select  name="supp_supplier_type" id="supp_supplier_type" required>
						
					<?php 
					$query=mysql_query("select * from partner");
					while($row=mysql_fetch_array($query))
					 { ?>
						<option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
						<?php } ?>
					</select>
				</div>

			

			<label for="product_type">Product</label>
				<div>
					<select name="supp_product_type" id="supp_product_type" required>
						
					<?php 
					$query=mysql_query("select * from product");
					while($row=mysql_fetch_array($query))
					 { ?>
						<option value="<?php echo $row['product_id'];?>"> <?php echo $row['product_name']." Vol. ".$row['product_volume'];?> </option>
						<?php } ?>
					</select>
				</div>
		
			<label class="control-label" for="inputEmail">Quantity</label>
			<input type="text"  name="supp_product_quantity" id="supp_product_quantity" placeholder="Quantity" required>


			<label class="control-label" for="inputEmail">Note</label>
			<input type="text"  name="supp_product_note"  id="supp_product_note" placeholder="Note"><br>
	

			<button type="submit" id="add_supply" class="btn btn-info">Add</button>

			</div>

			<h4>Distribute</h4>
		
	
			<label for="customername">Customer</label>
			<input type="text"  name="customername" id="customername" placeholder="Customer Name" required>
						
			<label for="cust_product_type">Product</label>
				<div>
					<select name="cust_product_type" id="cust_product_type" required>
						
					<?php 
					$query=mysql_query("select t.qty,p.* , sum(t.qty) as total from transaction as t, product as p  where t.product_id = p.product_id group by t.product_id");
					while(($row=mysql_fetch_array($query))  && ($row['total'] !=='0'))
					 { ?>
						<option value="<?php echo $row['product_id'];?>"> <?php echo $row['product_name']." Vol. ".$row['product_volume'];?> </option>
						<?php } ?>
					</select>
				</div>
		
			<label class="control-label" for="inputEmail">Quantity</label>
			<input type="text"  name="cust_product_quantity" id="cust_product_quantity" placeholder="Quantity" required>


			<label class="control-label" for="inputEmail">Note</label>
			<input type="text"  name="cust_product_note"  id="cust_product_note" placeholder="Note"><br>
	

			<button type="submit" id="minus_supply" class="btn btn-info">Submit</button>

			</div>
			<h2>Inventory</h2>
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
				<thead>
					<tr>
					<th>Product Name</th>
					<th>Volume</th>
					<th>Quantity</th>
					<th>Price/pcs</th>
					<th>Description</th>
					</tr>
				</thead>
			
				<tbody>
					<?php 
					$query=mysql_query("select t.qty,p.* , sum(t.qty) as total from transaction as t, product as p  where t.product_id = p.product_id group by t.product_id ")or die(mysql_error());
					while(($row=mysql_fetch_array($query)) && ($row['total'] !=='0')){
					?>
					<tr>
					<td><?php echo $row['product_name']; ?></td>
					<td><?php echo $row['product_volume']; ?></td>
					<td><?php echo $row['total']; ?></td>
					<td><?php echo $row['product_price']; ?></td>
					<td><?php echo $row['product_description']; ?></td>

					</tr>
					<?php } ?>
				</tbody>
			</table>

		
		
			
		
			
	</center>
	</body>
<script type="text/javascript">

$(document).ready(function(){

	$('#add_supply').on('click',function(){
		
			var data1 = {
				'supplier':$('#supp_supplier_type').val(),
				'type':$('#supp_product_type').val(),
				'qty':$('#supp_product_quantity').val(),
				'note':$('#supp_product_note').val()
			}
			
		$.ajax({
			url: "add_supply.php",
			data:data1
			 
		}).done(function( data ) {
	    	console.log(data);
	    	location.reload();
	  });

	});


	$('#minus_supply').on('click',function(){
		
			var data1 = {
				'customername':$('#customername').val(),
				'product_id':$('#cust_product_type').val(),
				'qty':$('#cust_product_quantity').val(),
				'note':$('#cust_product_note').val(),
				'customername':$('#customername').val()
			}
			
		$.ajax({
			url: "minus_supply.php",
			data:data1
			 
		}).done(function( data ) {
	    	console.log(data);
	    	location.reload();
	  });

	});
	

});



</script>
</html>