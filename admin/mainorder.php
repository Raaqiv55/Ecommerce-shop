<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath. '/../classes/Cart.php');
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Order</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Order Date</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Address</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                            $ct = new Cart();
                            $fm = new Format();
                            $getOrder = $ct->getAllOrderProduct();
                            if($getOrder){
                                while($result = $getOrder->fetch_assoc()){
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><?php echo $result['quantity']; ?></td>
                            <td><?php echo $result['price']; ?></td>
                            <td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Address</a></td>
							<td><a href="">Shifted</a></td>
                        </tr>

                        <?php             
                                }
                            }
                        ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
