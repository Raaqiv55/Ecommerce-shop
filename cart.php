<?php include 'inc/header.php'; ?>

<div class="main">
<div class="content">
<div class="cartoption">		
	<div class="cartpage">
			<h2>Your Cart</h2>
				<table class="tblone">
					<tr>
						<th width="5%">Sl</th>
						<th width="30%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="15%">Quantity</th>
						<th width="15%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php 
						$getPro = $ct->getCartProduct();
						if($getPro){
							$i = 0;
							$sum = 0;
							while($result = $getPro->fetch_assoc()){
								$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productName']; ?>/td>
						<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
						<td>$<?php echo $result['price']; ?></td>
						<td>
							<form action="" method="post">
								<input type="number" name="" value="1"/>
								<input type="submit" name="submit" value="Update"/>
							</form>
						</td>
						<td>$
						<?php 
							$total = $result['price'] * $result['quantity'];
							echo $total;
						?>	
						</td>
						<td><a href="">X</a></td>
					</tr>
					<?php 
						$sum = $sum + $total;
					?>
					<?php 
						}
					}
					?>
					
					
				</table>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td>$<?php echo $sum; ?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>
							10%
						</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>$<?php 
							$vat = $sum * 0.1;
							$gtotal = $vat + $sum;
							echo $gtotal;
						?></td>
					</tr>
				</table>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.html"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="login.html"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
</div>  	
<div class="clear"></div>
</div>
</div>
</div>
  <?php include 'inc/footer.php'; ?>
