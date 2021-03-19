<?php 
	include "header/header-admin.php";
	include "database/database.php";
	include "include/account.php";
	include "include/productFunctions.php";

	$database=new Database(); //class Database() from database.php
	$db=$database->getConnection(); //names the connection to database '$db'
	$product=new Product($db); //class Product() from productFunctions.php
?>

<div class="row">
		<div class="col-md-12">
			<div class="container center_div">	
			<br>
			<h1>Managing Accounts</h1>
			<br>		
			<!-- Button trigger modal for create employee acount 
			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".create">Create Employee or Customer Account</button>
			<br><br>
			 Button trigger modal for pending acount 
			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".pending">Pending Account Request</button>


			<br><br>
			 Button trigger modal for deactivate acount 
			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".deactivate">Deactivate Account</button>-->




			<table class="table">
				<thead class=" table-striped table-dark">
					<tr>
						<center><th scope="col">Account ID</th></center>
						<center><th scope="col">Account Image</th></center>
						<center><th scope="col">Username</th></center>
						<center><th scope="col">Password</th></center>
						<center><th scope="col">First Name</th></center>
						<center><th scope="col">Last Name</th></center>
						<center><th scope="col">Address</th></center>
						<center><th scope="col">Phone Number</th></center>
						<center><th scope="col">Actions</th></center>
						
					</tr>
					
			</thead>
				<tbody>
					<tr>
				<?php
				$database=new Database(); //class Database() from database.php
				$db=$database->getConnection(); //names the connection to database '$db'
				$product=new Product($db); //class Product() from productFuncti
				$stmt=$product->allAccounts();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  	extract($row);
			  	echo 
						"<tr>
						<center><td>{$accountId}</td></center>
						<center><td><img src='Images/profile.jpg' class='rounded-circle floatleft'  width='100px'  height='100px'> </td></center>
						<center><td>{$username}</td></center>
						<center><td>{$password}</td></center>
						<center><td>{$firstName}</td><center>
						<center><td>{$lastName}</td><center>
						<center><td>{$city}</td><center>	
						<center><td>{$phoneNo}</td><center>			
							
						<td>
						<a href='' data-toggle='modal' data-target='.create' class='text-right' data-toggle='tooltip' data-placement='top' title='Create Employee Or Client Account'><img src='images/add.png'  width='30px'  height='30px'> </a>
						<a href='' data-toggle='modal' data-target='.pending' class='text-right' data-toggle='tooltip' data-placement='top' title='Archieve Account'><img src='images/pending.png'  width='30px'  height='30px'> </a>
						<a href='' data-toggle='modal' data-target='.deactivate' class='text-right' data-toggle='tooltip' data-placement='top' title='Deactivate Account'><img src='images/deactivate.png'  width='30px'  height='30px'> </a>
						</td>	
					</tr>";
				}
				?>
			</tbody>
		  </table>
		</div>
	</div>






		<div class="modal fade create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-lg">
   			 <div class="modal-content">
     			 <div class="modal-header">
     			   <h5 class="modal-title" id="exampleModalLabel"> <h5>Creating Employee Or Client Account</h5></h5>
      			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			  <span aria-hidden="true">&times;</span>
       			 </button>
    			  </div>


    			  <div class="modal-body">
     			
		  

         
        <form method="POST" action="">
        <center>
     <div class="form-group">
     	<div class="col-md-8 col-md-offset-8">
        <div class="container center_div">
        	<h5>Username</h5>
			<input type="text" class="form-control" id="username" name="username" required>
			<h5>First Name</h5>
			<input type="text" class="form-control" id="firstName" name="firstName" required>

			<h5>Last Name</h5>
			<input type="text" class="form-control" id="lastName" name="lastName" placeholder="*">

			<h5>Account Type</h5>
			<select class="form-control" id="accountType" name="accountType">
				<option value="C">Client</option>
				<option value="E">Employee</option>
			</select>

			<h5>Email Address</h5>
			<input type="email" class="form-control" id="emailAd" name="emailAd" placeholder="*">

			<!-- Address -->
			<h5>Street Number</h5>
			<input type="text" class="form-control" id="streetNo" name="streetNo" placeholder="*">
			<h5>Barangay</h5>
			<input type="text" class="form-control" id="brgy" name="brgy" placeholder="*">
			<h5>City</h5>
			<input type="text" class="form-control" id="city" name="city" placeholder="*">
			<h5>Zip</h5>
			<input type="number" class="form-control" id="zip" name="zip" placeholder="*">

			<h5>Mobile Phone Number</h5>
			<input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="*">

			<h5>Password</h5>
			<input type="password" class="form-control" id="password" name="password" >
			<h5>Confirm Password</h5>
			<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" >
			<br>
		
		<div class="form-group">
			<input type='submit' name='submit' id='submit' class='btn btn-primary btn-block' value='Register' />
		</div></div></center> 
		
    			  </div>


    			  <div class="modal-footer">
      			  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      			  <button type="button" class="btn btn-primary">Create</button>

     			 </div>
     			</form>
   			 </div>
  		</div>
	</div>
			<br><br>
			

		<div class="modal fade pending" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-lg">
   			 <div class="modal-content">
     			 <div class="modal-header">
     			   <h5 class="modal-title" id="exampleModalLabel">Pending Account Request</h5>
      			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			  <span aria-hidden="true">&times;</span>
       			 </button>
    			  </div>


    			  <div class="modal-body">
    			  	<?php
     			 	$database=new Database();
					$db=$database->getConnection();
					$acc=new Account($db); 

					echo "<center><h2>Archieved Account's</h2>
						<h2>Request For Activation</h2></center>";

						//Views all pending accounts
						$stmt=$acc->pendingAccounts();
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  						extract($row);
  					echo "<div class='alert alert-warning'>
						<strong>Account Name:</strong> {$lastName},{$firstName} requesting to reactivate his account. <a class='nav-link' href=''>Activate Now</a>
						<a class='btn btn-danger text-white delete-object' delete-id='{$accountId}'>Ignore</a>
					</div>";
					}
				?>
					<!-- Script for deleting an account pending for activation -->
				<script>
						$(document).on('click', '.delete-object', function(){
	 			   var id = $(this).attr('delete-id');
	 			   var q = confirm("Are you sure?");
	  			  if (q == true){
      				  $.post('accountDelete.php', {
     			       accountId: id
     			   }, function(data){
      			      location.reload();
     			   }).fail(function() {
     			       alert('Unable to delete.');
    			    });
   			 }
				});
			</script>
    			  </div>


    			  <div class="modal-footer">
      			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      			  <button type="button" class="btn btn-primary">Save changes</button>
     			 </div>
   			 </div>
  		</div>
	</div>
			

		<div class="modal fade deactivate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-lg">
   			 <div class="modal-content">
     			 <div class="modal-header">
     			   <h5 class="modal-title" id="exampleModalLabel"><h5>Deactivate Account</h5>
      			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			  <span aria-hidden="true">&times;</span>
       			 </button>
    			  </div>


    			  <div class="modal-body">
     			 <div class="col-md-4 col-md-offset-12 mt-4 ml-2">
		<h5>First name</h5> <input type="text" class="form-control" name="last"><br>
		<h5>Last name</h5> <input type="text" class="form-control" name="last"><br>
			<a href=""><button type="button" class="btn btn-primary">Search</button></a>
	</div>
	<div class="col-md-10 col-md-offset-12 mt-4 ml-2">
		<div class="alert alert-danger">
		<strong>Account Name:</strong> Rommel Grande<a class="nav-link" href="accountrecovery.php">Reactivate It</a>
		<a class="nav-link" href="accountrecovery.php">Deactivate</a>
	</div>
	<div class="alert alert-danger">
		<strong>Account Name:</strong> Sebastian Turingan  <a class="nav-link" href="accountrecovery.php">Reactivate It</a>
		<a class="nav-link" href="accountrecovery.php">Deactivate</a>
	</div>
	<div class="alert alert-danger">
		<strong>Account Name:</strong> Jedrik Villoria  <a class="nav-link" href="accountrecovery.php">Reactivate It</a>
		<a class="nav-link" href="accountrecovery.php">Deactivate</a>
	</div>
	<div class="alert alert-danger">
		<strong>Account Name:</strong> Budz Cammora  <a class="nav-link" href="accountrecovery.php">Reactivate It</a>
		<a class="nav-link" href="accountrecovery.php">Deactivate</a>
	</div>
    <div class="alert alert-danger">
		<strong>Account Name:</strong>Meynard Soriano  <a class="nav-link" href="accountrecovery.php">Reactivate It</a>
		<a class="nav-link" href="accountrecovery.php">Deactivate</a>
	</div>
  </div>
    			  </div>


    			  <div class="modal-footer">
      			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      			  <button type="button" class="btn btn-primary">Save changes</button>
     			 </div>
   			 </div>
  		</div>
	</div>
			</div>
		</div>
	</div>
<br><br>

<?php
	include "footer/footer.php";
?>