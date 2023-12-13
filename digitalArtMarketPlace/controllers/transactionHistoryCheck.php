<?php
include_once("../controllers/sessionCheck.php");
require_once('../models/userModel.php');

$data = Transaction($_SESSION['username']);
    
    
     echo json_encode($data);
   

?>