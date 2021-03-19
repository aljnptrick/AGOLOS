<?php 
	include "header/header-admin.php";
	include "database/database.php";
	include "include/account.php";

	$database=new Database();
	$db=$database->getConnection();
	$acc=new Account($db)
?>
<div class="row">
			<div class="col-sm-4">
				<img src="Images/profile.JPG" class="rounded"  width="100%"  height="auto"><br><p><br>
				<p>Aljan Patrick Tristeza Mendoza<br>(Administrator)</p><br>
				<p>aljanpatrick@gmail.com</p>
				<p>099123456789</p>
				<p>123 Lopez Street Aurora Hill Baguio City</p>
					 <a href="" data-toggle="modal" data-target=".edit" class="text-right">Edit My Account</a>




			 <!-- Modal for edit account-->

			<div class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-lg">
   			 <div class="modal-content">
     			 <div class="modal-header">
      									  <h5 class="modal-title" id="exampleModalLabel">Editing Account</h5>
       										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         										 <span aria-hidden="true">&times;</span>
        									</button>
      									</div>


    								  <div class="modal-body">
      								<div class="modal-body">
     <form method="POST" action="registrationform.php">
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
      <br></center> 
    
 		</div>
     </div>
     							 </div>


     						 <div class="modal-footer">
        			<input type="submit" class="btn btn-primary" value="Save Changes" name="forgotpassowrd">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     			 </div>
   			 </div>
 		 </div>






			</div>
		<div class="col-sm-8">
			<div class="container jumbotron text-center bg-dark whitecolor text-white" style="margin-bottom:5px">
			<img src="Images/LOGO.png" class="rounded-circle floatleft"  width="15%"  height="25%">
			<h2>Hello, Aljan</h2>
			<h4>Request For Activation</h4>
		<div class="alert alert-success">
			<center><strong>Account Name:</strong></center>
			<!--Rommel Grande requesting to reactivate his account.-->
			<?php
				$stmt=$acc->pendingAccounts();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  	extract($row);
			  	echo "<strong>{$lastName},{$firstName}</strong> requesting to reactivate his account.<br>";
				}
			?>
			<a class="nav-link" href="account-recovery.php">Activate Now</a>
			<a class="nav-link" href="account-recovery.php">Decline</a>
		</div>
			<h4>Archived Products</h4>
		<div class="alert alert-success">
			<strong>Product Name:</strong> 2.7Kg Super Kalan
			<a class="nav-link" href="account-recovery.php">Activate Now</a>
			<br>
			<a class="nav-link" href="account-recovery.php">Decline</a>
		</div>
			<h4>Archived Account Lists</h4>
			<div class="alert alert-success">
				<strong>Account Name:</strong> Denmark Castaneda
				<a class="nav-link" href="account-recovery.php">Activate Now</a>
				<a class="nav-link" href="account-recovery.php">Decline</a><br>
				<strong>Account Name:</strong> Albert Santillan
				<a class="nav-link" href="account-recovery.php">Activate Now</a>
				<a class="nav-link" href="account-recovery.php">Decline</a>
				</div>
			</div>
		</div>
	</div>




<?php
	include "footer/footer.php";
?>