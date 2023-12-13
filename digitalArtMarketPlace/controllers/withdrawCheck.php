<?php
include_once("../controllers/sessionCheck.php");
require_once('../models/userModel.php');

$user = getUser($_SESSION['username']);
$username = $user['userName'];
$userpass=$user['password'];
$CurrentBalance = ShowBalance($username);
$CurrentBalance = $CurrentBalance['balance'];


    $data = $_POST['info'];
    $info = json_decode($data);

    $amount = $info->amount;
    $password = $info->Password;
    if(is_int($amount)){
       echo" Please enter a valid amount in numbers";
    }
    else if ($CurrentBalance == 0 ){
        echo "No balance";
    }else if($CurrentBalance < $amount){
        echo "Amount is larger than current balance";
    } else if($password != $userpass) {
        echo "Wrong password";
    } else {
        withdraw($username, $amount);
        $balance = Showbalance($username);
        echo"successfully withdrawn. your new balance is: ". $balance['balance'];
    }

?>
