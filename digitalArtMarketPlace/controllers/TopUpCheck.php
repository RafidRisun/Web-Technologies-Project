<?php
include_once("../controllers/sessionCheck.php");
require_once('../models/userModel.php');

$user = getUser($_SESSION['username']);
$username = $user['userName'];
$userpass = $user['password'];

$data = $_POST['info'];
   //$std = json_decode($data);
   
   $info = json_decode($data);


   $amount = $info->amount;
   $password = $info->Password;

    if(is_int($amount)){
        echo"Please enter a valid amount in numbers";
    }
    else if ($userpass != $password) {
        echo "wrong pass";
    } else {
        addMoney($username, $amount);
        $balance = ShowBalance($username);
       // $response = array('Balance' => $balance['Balance']);
       // echo json_encode($balance);
       echo "successfull. your new balance is: ".$balance['balance'];
    }
?>