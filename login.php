		
<?php
	include "header/header.php";
	include "database/database.php";
	include "include/account.php";
?>
<?php
/*
// define variables and set to empty values
$nameErr = $passErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Please Fill Up The Username";
  }
   else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $passErr = "Please Fill Up The Password";
  } else {
    $password = test_input($_POST["password"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


*/
?>


 <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">	
						 	<h1><center> Adams Gas Online LPG Delivery </center></h1><br>
						 	<img src="Images/LOGO.png" floatleft"  width="400px"  height="150px">
							<h1>Login</h1>
							<hr>
						
						 </div>
					</div>
                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <h5><label>Username</label></h5>
                              <input type="email" name="username"  class="form-control" id="email" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                             <h5> <label>Password</label></h5>
                              <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
                           </div><br>
                        <div class="col-md-12 ">

                         	<center>
     					<a href="profile.php"><button type="button" class="btn btn-primary">Sign In</button></a></center> 
    					</div></center> 
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                              </div>
                           </div>
 							
                           <div class="form-group">
                           	<div class="col-md-12 ">
                             <!-- Button for registration-->
							<a href=""  data-toggle="modal" data-target=".register" class="text-left">Register</a>
  							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							                   		
                          
                            	 <!-- Button for forgot password-->
                            <a href="" data-toggle="modal" data-target="#forgotpassword" class="text-right">Forgot Password</a>
							
						</div></div>



						<!-- Modal for register -->

			<div class="modal fade register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  			<div class="modal-dialog modal-lg">
   			 <div class="modal-content">
     			 <div class="modal-header">
      									  <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
       										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         										 <span aria-hidden="true">&times;</span>
        									</button>
      									</div>


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


     				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			 <input type='submit' name='submit' id='submit' class='btn btn-primary' value='Register' />
        			  </form>
     			 </div>
   			 </div>
 		 </div>
		</div>




<!-- Modal for forgot password-->

			<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  						<div class="modal-dialog" role="document">
   							<div class="modal-content">
    							<div class="modal-header">
      									  <h5 class="modal-title" id="exampleModalLabel">Forgot Password?</h5>
       										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         										 <span aria-hidden="true">&times;</span>
        									</button>
      									</div>


    								  <div class="modal-body">
      								 <h5>Insert Your Contact Email Address </h5>
      								 <input type="email" class="form-control" id="emailAd" name="emaild" placeholder="agolos@gmail.com">
     							 </div>


     						 <div class="modal-footer">
        			<input type="submit" class="btn btn-primary" value="Send Code" name="forgotpassowrd">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     			 </div>
   			 </div>
 		 </div>
		</div>
                           </div>
                        </form>
                 
				</div>
			</div>
			 
			</div>
		</div>
      </div> 

		
<?php
	include "footer/footer.php";
?>



