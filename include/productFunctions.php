<?php
class Product{
	private $conn;
	private $tablename="product";  //$this->tablename\
	private $tablenameA="account";
	public $productId;
	public $productImage;
	public $productPrice;
	public $productDesc;
	public $productName;
	public $productQuantity;

	function __construct($db){
		$this->conn = $db;
	}

	function addProduct(){
		$query = "INSERT INTO ".$this->tablename." SET productName=?,productPrice=?,productQuantity=?,productDesc=?";
		// Account Type is set to 'Client' as default
		
		//Setting the values from registrationform.php
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->productName);
		$stmt->bindparam(2,$this->productPrice);
		$stmt->bindparam(3,$this->productQuantity);
		//$stmt->bindparam(4,$this->productImage);
		$stmt->bindparam(4,$this->productDesc);
		

		if($stmt->execute())
			return true;
		else
			return false;
		
	}
		function replenishProduct(){
		$query = "UPDATE INTO ".$this->tablename." SET productQuantity=?";
		// Account Type is set to 'Client' as default
		
		//Setting the values from registrationform.php
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->productQuantity);


		if($stmt->execute())
			return true;
		else
			return false;
}
		function allProducts(){
		$query = "SELECT * FROM " .$this->tablename." ORDER BY productId"; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

		function allAccounts(){
		$query = "SELECT * FROM " .$this->tablenameA." ORDER BY accountId"; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}


	//Activate Account
	// function activateAccount(){
	// 	$query = "UPDATE " . $this->tablename . " SET activation=? WHERE accountId=?"; 
	// 	$stmt = $this->conn->prepare($query);
	// 	$stmt->bindparam(1,$this->activation);
	// 	$stmt->bindparam(2,$this->accountId);

	// 	if($stmt->execute())
	// 		return true;
	// 	else
	// 		return false;
	// }

	//Ignore Account (Delete Account)
	function deleteAccount(){
		$query = "DELETE FROM ". $this->tablename ." WHERE accountId=?";
    	$stmt = $this->conn->prepare($query);
   		$stmt->bindParam(1, $this->accountId);
    	$stmt->execute();
	}
}
?>