<?php 
	include "header/header-admin.php";
	include "database/database.php";
	include "include/productFunctions.php";

	//If user submits the form
	 if(isset($_POST['add'])){
		$database=new Database(); //class Database() from database.php
		$db=$database->getConnection(); //names the connection to database '$db'
		$product=new Product($db); //class Product() from productFunctions.php
			//$product->productImage=$_POST['productImage']; //text
			$product->productName=$_POST['productName']; //text
			$product->productPrice=$_POST['productPrice']; //text
			$product->productQuantity=$_POST['productQuantity']; //text
			$product->productDesc=$_POST['productDesc']; //text


			//echo "HelloWorld";

			//Check if account is created
			if($product->addProduct()){
				//success
				echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong> Product successfully added. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			}
			else{
				//failed
				echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong>Product not added. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			}
		}
		
		//Copying the input of user to the variables in account.php
		
		
	
?>

	<div class="row">
      <div class="col-md-6">
          <div class="container center_div">
		 <form method="post">
		  
			<h2>Product Information</h2><br>
			<h5>Product Image</h5>
		<?php	/*<div class="custom-file">
				<input type="file" class="custom-file-input" name="productImage" id="inputGroupFile01">
				<label class="custom-file-label" for="inputGroupFile01" >Choose Image</label>
			</div>*/?>
			<h5>Product Name</h5> 
			<input type="text" class="form-control" name="productName" id="productName"><br>
			<h5>Product Price</h5>
			<input type="text" class="form-control" name="productPrice" id="productPrice"><br>
			<h5>Product Quantity</h5>
			<input type="text" class="form-control" name="productQuantity"  id="productQuantity"><br>
			<h5>Product Description</h5> 
			<input type="text" class="form-control" name="productDesc"  id="productDesc"><br>
			
			
			<div class="text-right">
			<input type="submit" class="btn btn-primary" value="Add Product" name="add" >
			</form>
			</div>
			</div>
		</div>
	</div>
<?php
	include "footer/footer.php";
?>