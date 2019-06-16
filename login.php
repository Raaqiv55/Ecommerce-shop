<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" >
                    <input name="Domain" type="password" >
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey">Sign In</button></div></div>
					</div>
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
				$customerReg = $cmr->customerRegistration($_POST);
			}
		?>
		<?php 
			if(isset($customerReg)){
				echo $customerReg;
			}
		?>			
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
								<input type="text" name="name" placeholder="Name" />
							</div>
							
							<div>
								<input type="text" name="city" placeholder="city" />
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="zip" />
							</div>
							<div>
								<input type="text" name="email" placeholder="email" />
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="address" />
						</div>
		    	<div>
					<input type="text" name="country" placeholder="Country" />		
				</div>		        

				  <div>
				 	<input type="text" name="phone" placeholder="Phone" />	
				</div>
				<div>
				 	<input type="text" name="pass" placeholder="Password" />	
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php'; ?>