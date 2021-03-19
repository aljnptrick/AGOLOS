<?php 
	include "header/header-index.php";
	include "database/database.php";
	include "include/account.php";

	//If user submits the form
	if($_POST){
		$database=new Database(); //class Database() from database.php
		$db=$database->getConnection(); //names the connection to database '$db'
		$acc=new Account($db); //class Account() from account.php

		if($_POST['password']==$_POST['confirmPassword']){
      $acc->username=$_POST['username']; //text
			$acc->password=$_POST['password']; //text
			$acc->firstName=$_POST['firstName']; //text
			$acc->lastName=$_POST['lastName']; //text
			$acc->streetNo=$_POST['streetNo']; //text
			$acc->brgy=$_POST['brgy']; //text
			$acc->city=$_POST['city']; //text
			$acc->zip=$_POST['zip']; //number
			$acc->emailAd=$_POST['emailAd']; //text
			$acc->phoneNo=$_POST['phoneNo']; //text

			//echo "HelloWorld";

			//Check if account is created
			if($acc->createAccount()){
				//success
				echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong> Account successfully created. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			}
			else{
				//failed
				echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong> Account not created. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			}
		}
		else{
			echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong> Confirm Password does not match. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}
		//Copying the input of user to the variables in account.php
		
		
	}
?>
<div class="container" style="margin-top:30px">

  <h1><center> Adams Gas Online LPG Delivery<br> Registration Form</center></h1><br>  
    
   


        <!-- Start of form -->
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
    
    <div class="form-group">
      <input type='submit' name='submit' id='submit' class='btn btn-primary btn-block' value='Register' />
    </div></div></center> 
    </form>
  </div>
</div>
</div>

<?php
	include "footer/footer.php";
?>