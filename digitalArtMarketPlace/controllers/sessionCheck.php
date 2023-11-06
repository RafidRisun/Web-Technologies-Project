<?php 
    session_start();
    if(!isset($_SESSION['currentUserName'])){
        header('location: login.html');
    }
?>