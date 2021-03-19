<?php 
	include "header/header-customer.php";
	include "database/database.php";
	include "include/account.php";
?>


<div class="row">
		<div class="col-sm-4">
			<img src="Images/profile.JPG" class="rounded"  width="100%"  height="auto"><br>
			<p><br></p>
			<p>Aljan Patrick Tristeza Mendoza</p>
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
      <br>
    
 		</div></center> 
     </div>
     							 </div>


     						 <div class="modal-footer">
        			<input type="submit" class="btn btn-primary" value="Save Changes" name="forgotpassowrd">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     			 </div>
   			 </div>
 		 </div>
		</div>
		</div>











		<hr class="d-sm-none">
			<div class="col-sm-8">
			<div class="container jumbotron text-center bg-dark whitecolor text-white" style="margin-bottom:5px">
				<img src="Images/LOGO.png" class="rounded-circle floatleft"  width="15%"  height="25%">
				<h2>Hello, Aljan</h2>
				<h5> Your Previous Transactions</h5>

			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">Order ID</th>
						<th scope="col">Product Name</th>
						<th scope="col">Quantity</th>
						<th scope="col">Price</th>
						<th scope="col">Total Amount</th>
						<th scope="col">Date Of Transactions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">192</th>
						<td>11 Kg LPG</td>
						<td>2</td>
						<td>Php 600</td>
						<td>1200</td>
						<td>03/19/18</td>
					</tr>
				<tr>
						<th scope="row">288</th>
						<td>11 Kg LPG</td>
						<td>4</td>
						<td>Php 600</td>
						<td>2400</td>
						<td>06/19/18</td>
				</tr>
				<tr>
					<th scope="row">329</th>
						<td>11 Kg LPG</td>
						<td>1</td>
						<td>Php 600</td>
						<td>600</td>
						<td>08/19/18</td>
				</tr>
			  </tbody>
			</table>
		</div>
	  </div>
	</div>

<?php
	include "footer/footer.php";
?>