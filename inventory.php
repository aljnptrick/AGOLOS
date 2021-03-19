<?php 
	include "header/header-admin.php";
	include "database/database.php";
	include "include/account.php";
	include "include/productFunctions.php";

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


		if(isset($_POST['replenishQuantity'])){
		$database=new Database(); //class Database() from database.php
		$db=$database->getConnection(); //names the connection to database '$db'
		$product=new Product($db); //class Product() from productFunctions.php
			//$product->productImage=$_POST['productImage']; //text
			$product->productQuantity=$_POST['txtReplenishProduct']; //text


			//echo "HelloWorld";

			//Check if account is created
			if($product->replenishProduct()){
				//success
				echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong> Product Quantity Added. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			}
			else{
				//failed
				echo "<div class='alert alert-warning alert-dismissible' role='alert'><strong>Product Quantity Not Added. </strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			}
		}

?>

<div class="row">
    <div class="container center_div">
		<h2>Product Management</h2>
			<div class="text-right">
			 	<h4><a href="" data-toggle="modal" data-target=".add" class="text-right" data-toggle="tooltip" data-placement="top" title="Add Product"><img src="images/add.png"></a></h4>
			</div>

			<!-- Modal for add product -->
	<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg">
   			<div class="modal-content">
     			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Adding Product</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      		<div class="modal-body">
      			<form method="post">
       			<h2>Product Information</h2><br>
					<h5>Product Image</h5>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="productImage" id="inputGroupFile01">
							<label class="custom-file-label" for="inputGroupFile01" >Choose Image</label>
						</div><br>
							<h5>Product Name</h5> 
							<input type="text" class="form-control" name="productName" id="productName"><br>
							<h5>Product Price</h5>
							<input type="text" class="form-control" name="productPrice" id="productPrice"><br>
							<h5>Product Quantity</h5>
							<input type="text" class="form-control" name="productQuantity"  id="productQuantity"><br>
							<h5>Product Description</h5> 
							<input type="text" class="form-control" name="productDesc"  id="productDesc"><br>
     					 </div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<input type="submit" class="btn btn-primary" name="add" value="addProduct"></button>
      				</div>
      			</form>
    			</div>
  			</div>
		</div>




		<!-- Modal for replenish product -->

			<div class="modal fade" id="replenishProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  						<div class="modal-dialog" role="document">
   							<div class="modal-content">
    							<div class="modal-header">
      									  <h5 class="modal-title" id="exampleModalLabel">Replenish Product</h5>
       										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         										 <span aria-hidden="true">&times;</span>
        									</button>
      									</div>


    								<div class="modal-body">
      								 <h5>Insert the number of product you want to add.</h5>
      								 <input type="text" class="form-control" name="txtReplenishProduct" placeholder="0">
     							 	</div>


     						 <div class="modal-footer">
        			<input type="submit" class="btn btn-primary" name="replenishQuantity">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     			 </div>
   			 </div>
 		 </div>
		</div>


				


			<table class="table">
				<thead class=" table-striped table-dark">
					<tr>
						<center><th scope="col">Product ID</th></center>
						<center><th scope="col">Product Image</th></center>
						<center><th scope="col">Product Name</th></center>
						<center><th scope="col">Quantity Of Product Available</th></center>
						<center><th scope="col">Price</th></center>
						<center><th scope="col">Actions</th></center>
						
					</tr>
					
			</thead>
				<tbody>
					<tr>
				<?php
				$database=new Database(); //class Database() from database.php
				$db=$database->getConnection(); //names the connection to database '$db'
				$product=new Product($db); //class Product() from productFuncti
				$stmt=$product->allProducts();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			  	extract($row);
			  	echo 
						"<center><td>{$productId}</td></center>
						<center><td><img src='Images/2t.png' class='rounded-circle floatleft'  width='200px'  height='150px'> </td></center>
						<center><td>{$productDesc}</td></center>
						<center><td>{$productQuantity}</td></center>
						<center><td>{$productPrice}</td><center>				
							
						<td>
						<a href='' data-toggle='modal' data-target='.add' class='text-right' data-toggle='tooltip' data-placement='top' title='Edit Product'><img src='images/edit.png'  width='30px'  height='30px'> </a>
						<a href='' data-toggle='modal' data-target='#replenishProduct' class='text-right' data-toggle='tooltip' data-placement='top' title='Replenish Product'><img src='images/replenish.png'  width='30px'  height='30px'> </a>
						<a href='' data-toggle='modal' data-target='.add' class='text-right' data-toggle='tooltip' data-placement='top' title='Archive Product'><img src='images/archive.png'  width='30px'  height='30px'> </a>
						<a href='' data-toggle='modal' data-target='.add' class='text-right' data-toggle='tooltip' data-placement='top' title='Delete Product'><img src='images/delete.png'  width='30px'  height='30px'></a>
						</a></td>	
					</tr>";
				}
				?>
			</tbody>
		  </table>
		</div>
	</div>





<?php
	include "footer/footer.php";
?>