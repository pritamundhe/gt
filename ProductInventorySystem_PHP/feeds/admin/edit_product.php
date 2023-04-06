<?php 
include('header.php');
?>
<body>

<div class="container">
<a href="announcement.php" class="btn btn-inverse">return</a>

<?php
include('../db.php');

	$id=$_GET['id'];
	$sql = "SELECT * FROM 
			Product as p,
			 type as t 
			 WHERE
			 p.product_id = $id AND 
			 t.type_id = p.product_type_id
			 ";
	$result = mysql_fetch_array(mysql_query($sql));

	?>
<form class="form-horizontal" action="update_product.php" method="post">    


	<div class="thumbnail">
		<div class="control-group">
	    	<label class="control-label" for="product_name">Name </label>&nbsp;
			<input name="product_name" id="product_name" type="text" value="<?= $result['product_name'] ?>" /><br>

	
				<label class="control-label" for="product_type">Product Type</label>
					<div class="controls">
						<select id="product_type" name="product_type" required>
							<option></option>
						<?php 
						$query=mysql_query("select * from type");
						while($row=mysql_fetch_array($query))
						 { 
						 	if($result['product_type_id'] == $row['type_id']){
						 		$sel = "selected";
						 	}else{
						 		$sel = "";
						 	}
						 		?>
							<option value="<?php echo $row['type_id'];?>" <?=$sel?> > <?php echo $row['type_name'];?> </option>
							<?php 
						} ?>
						</select>
			
			</div>

			<label class="control-label" for="volume">Volume</label>&nbsp;
			<input name="volume" id="volume"  type="text" value="<?php echo $result['product_volume'] ?>" /><br>

			<label class="control-label" for="description">Description</label>&nbsp;
			<input name="description" id="description" type="text" value="<?php echo $result['product_description'] ?>" /><br>

			<label class="control-label" for="cost">Cost</label>&nbsp;
			<input name="cost" id="cost" type="text" value="<?php echo $result['product_cost'] ?>" /><br>

		    <label class="control-label" for="price">Price</label>&nbsp;
			<input name="price" id="price" type="text" value="<?php echo $result['product_price'] ?>" /><br>

			<input name="product_id" type="hidden" value="<?= $id ?>" />
	    </div>
	</div>
	<input  class="btn btn-success" type="submit" name="btn_update" value="update"/>
</form>
</div>
</body>
</html>