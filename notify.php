<?php 
	include "header/header-admin.php";
	include "database/database.php";
	include "include/account.php";
?>



<div class="row">
      <div class="col-md-10">
          <div class="container center_div">
		  <form action="/action_page.php">
			<h2>Send Notification To Customer</h2><br>
			<h5>Customer Account Name Or Account ID</h5> <input type="text" class="form-control" name="last" >
			<h5>Message</h5> <textarea class="form-control" rows="5" id="comment"></textarea>
			<br>
			</form>
				<div class="text-right">		
						<a href="index.php"><button type="button" class="btn btn-primary">Send</button></a>
						<a href="notify.php"><button type="button" class="btn btn-danger">Clear</button></a>
					</div>
			</div>
		</div>
	</div>

<?php
	include "footer/footer.php";
?>