<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once("../models/userModel.php");
    require_once("../models/artworkModel.php");
    $password = $_POST['password'];
    $id = $_POST['id'];
    $currentUserName = $_SESSION['currentUserName'];
    $user=getUser($currentUserName);
    $artwork = getArtwork($id);


    if($password == $user['password'])
    {
        deleteArtwork($id);
        unlink($artwork['image']);
        echo 'Successfully Deleted!';
        header("../views/user.php");
    }
    else{
        echo 'Wrong Password!';
    }
?>