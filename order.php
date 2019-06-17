<?php include 'inc/header.php'; ?>
<?php 
	$login = Session::get('cuslogin');
	if($login == false){
		header("Location:login.php");
	}
?>
<style>
	.notfound{}
	.notfound h2{font-size: 80px;line-height: 130px;text-align:center;}
	.notfound h2 span{display: block;color:red;font-size: 150px;}
</style>

 <div class="main">
    <div class="content">
    	 	<div class="section group">
    	 		<div class="found">
    	 			<h2><span>Oder page</span> </h2>
    	 		</div>
    	 	</div>
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php'; ?>
