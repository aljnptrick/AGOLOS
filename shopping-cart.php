<?php
  include "header/header-admin.php";
  include "database/database.php";
error_reporting(0);
//Setting session start
session_start();

$total=0;

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=agolos.sql", 'root', '');    
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//get action string
$action = isset($_GET['action'])?$_GET['action']:"";

//Add to cart
if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {
  
  //Finding the product by code
  $query = "SELECT * FROM product WHERE productId=:productId";
  $stmt = $conn->prepare($query);
  $stmt->bindParam('productId', $_POST['productId']);
  $stmt->execute();
  $product = $stmt->fetch();
  
  $currentQty = $_SESSION['product'][$_POST['productId']]['qty']+1; //Incrementing the product qty in cart
  $_SESSION['product'][$_POST['productId']] =array('qty'=>$currentQty,'name'=>$product['name'],'image'=>$product['image'],'price'=>$product['price']);
  $product='';
}

//Empty All
if($action=='emptyall') {
  $_SESSION['product'] =array();
}

//Empty one by one
if($action=='empty') {
  $productId = $_GET['productId'];
  $product = $_SESSION['product'];
  unset($product[$productId]);
  $_SESSION['product']= $product;
}


 
 
 //Get all Product
$query = "SELECT * FROM product";
$stmt = $conn->prepare($query);
$stmt->execute();
$product = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container" style="width:600px;">
  <?php if(!empty($_SESSION['product'])):?>
  <nav class="navbar navbar-inverse" style="background:#04B745;">
    <div class="container-fluid pull-left" style="width:300px;">
      <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Shopping Cart</a> </div>
    </div>
    <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="shopping-cart.php?action=emptyall" class="btn btn-info">Empty cart</a></div>
  </nav>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Actions</th>
      </tr>
    </thead>
    <?php foreach($_SESSION['product'] as $key=>$product):?>
    <tr>
      <td><img src="<?php print $product['image']?>" width="50"></td>
      <td><?php print $product['name']?></td>
      <td>$<?php print $product['price']?></td>
      <td><?php print $product['qty']?></td>
      <td><a href="shopping-cart.php?action=empty&sku=<?php print $key?>" class="btn btn-info">Delete</a></td>
    </tr>
    <?php $total = $total+$product['price'];?>
    <?php endforeach;?>
    <tr><td colspan="5" align="right"><h4>Total:$<?php print $total?></h4></td></tr>
  </table>
  <?php endif;?>
  <nav class="navbar navbar-inverse" style="background:#04B745;">
    <div class="container-fluid">
      <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Products</a> </div>
    </div>
  </nav>
  <div class="row">
    <div class="container" style="width:600px;">
      <?php foreach($product as $product):?>
      <div class="col-md-4">
        <div class="thumbnail"> <img src="<?php print $product['image']?>" alt="Lights">
          <div class="caption">
            <p style="text-align:center;"><?php print $product['name']?></p>
            <p style="text-align:center;color:#04B745;"><b>$<?php print $product['price']?></b></p>
            <form method="post" action="shopping-cart.php?action=addcart">
              <p style="text-align:center;color:#04B745;">
                <button type="submit" class="btn btn-warning">Add To Cart</button>
                <input type="hidden" name="sku" value="<?php print $product['sku']?>">
              </p>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
</body>
</html>