<?php
    // session_start();
    require_once('sessionCheck.php');
    require_once("../models/artworkModel.php");
    
    $currentUserName = $_SESSION['currentUserName'];
    

    $artworkName = $_POST['artworkName'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $purchaseAble = $_POST['purchaseAble'];
    $id = $_POST['id'];
    $artwork = getArtwork($id);

    if($artworkName == ''){
        echo 'Artwork Name field is Empty!';
        return;
    }
    if($description == ''){
        echo 'Description field is Empty!';
        return;
    }
    if($price == ''){
        echo 'Price field is Empty!';
        return;
    }
    if($purchaseAble == ''){
        echo 'Purchaseable field is Empty!';
        return;
    }

    $up = editArtwork($artworkName, $description, $price, $purchaseAble, $id);
    if($up == True) {
        echo "Artwork has been Updated!";
    }


?>
