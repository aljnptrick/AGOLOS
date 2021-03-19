<?php
class Account{
	private $conn;
	private $tablename="account";  //$this->tablename\

	public $accountId;
	public $username;
	public $accountType;
	public $password;
	public $firstName;
	public $lastName;
	public $streetNo;
	public $brgy;
	public $city;
	public $zip;
	public $emailAd;
	public $phoneNo;

	function __construct($db){
		$this->conn = $db;
	}
	
	//Creating/Adding a new account(registrationform.php)
	function createAccount(){
		$query = "INSERT INTO ".$this->tablename." SET accountType='C',password=?,username=?,firstName=?,lastName=?,streetNo=?,brgy=?,city=?,zip=?,emailAd=?,phoneNo=?";
		// Account Type is set to 'Client' as default
		
		//Setting the values from registrationform.php
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->password);
		$stmt->bindparam(2,$this->username);
		$stmt->bindparam(3,$this->firstName);
		$stmt->bindparam(4,$this->lastName);
		$stmt->bindparam(5,$this->streetNo);
		$stmt->bindparam(6,$this->brgy);
		$stmt->bindparam(7,$this->city);
		$stmt->bindparam(8,$this->zip);
		$stmt->bindparam(9,$this->emailAd);
		$stmt->bindparam(10,$this->phoneNo);
		

		if($stmt->execute())
			return true;
		else
			return false;
		
	}

	//Creating/Adding a new account(createaccount.php)
	function createAdminAccount(){
		$query = "INSERT INTO ".$this->tablename." SET accountType=?,password=?,firstName=?,lastName=?,streetNo=?,brgy=?,city=?,zip=?,emailAd=?,phoneNo=?,username=?";
		
		//Setting the values from createaccount.php
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->accountType);
		$stmt->bindparam(2,$this->password);
		$stmt->bindparam(3,$this->firstName);
		$stmt->bindparam(4,$this->lastName);
		$stmt->bindparam(5,$this->streetNo);
		$stmt->bindparam(6,$this->brgy);
		$stmt->bindparam(7,$this->city);
		$stmt->bindparam(8,$this->zip);
		$stmt->bindparam(9,$this->emailAd);
		$stmt->bindparam(10,$this->phoneNo);
		$stmt->bindparam(11,$this->username);

		if($stmt->execute())
			return true;
		else
			return false;	
	}

	//View all pending Accounts
	function pendingAccounts(){
		$query = "SELECT * FROM " .$this->tablename." WHERE accountType='C' ORDER BY accountId"; 
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

	//search account as fullname
	function searchAccount(){
		$query = "SELECT firstName+ ' ' + lastName AS FULLNAME FROM ". $this->tablename;
	}
}
?>