<?php
include_once("../controllers/sessionCheck.php");
require_once('../models/userModel.php');

$user = getUser($_SESSION['username']);
$username = $user['UserName'];

$data = $_POST['messageData'];
   //$std = json_decode($data);
   
   $messageData = json_decode($data);


   $messages = $messageData->message;
  // $username = $info->Password;

  SendMessage($username,$messages);
    
       // addMoney($username, $amount);
      //  $balance = ShowBalance($username);
       // $response = array('Balance' => $balance['Balance']);
       // echo json_encode($balance);
      // echo $balance['Balance'];
    
?>
