<?php

//Deleting an account

if($_POST){
    include_once "database.php";
    include_once "account.php";

    $database = new Database();
    $db = $database->getConnection();
 
    $acc = new Account($db);
    $acc->accountId = $_POST['accountId'];
     
    $acc->deleteAccount();
}
?>