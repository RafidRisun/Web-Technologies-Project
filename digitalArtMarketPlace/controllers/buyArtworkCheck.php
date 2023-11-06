<?php
    session_start();
    require_once('../models/artworkModel.php');
    require_once('../models/userModel.php');
    require_once('../models/notificationModel.php');

    $artworkId = $_REQUEST['id'];
    $artwork = getArtwork($artworkId);

    $buyerUserName = $_SESSION['currentUserName'];
    $buyerUser = getUser($buyerUserName);

    $sellerUserName = $artwork['ownerName'];
    $sellerUser = getUser($sellerUserName);

    if($artwork && $buyerUser && $sellerUser){
        $buyerUser['balance'] = $buyerUser['balance'] - $artwork['price'];
        $sellerUser['balance'] = $sellerUser['balance'] + $artwork['price'];
        $artwork['ownerName'] = $buyerUser['userName'];

        if(updateArtwork($artwork) && updateUser($buyerUserName, $buyerUser) && updateUser($sellerUserName, $sellerUser)){
            echo 'Purchase Successful!';
            createNotification($buyerUserName, "You Have Purchased {$artwork['artworkName']} From {$sellerUserName} For {$artwork['price']} ArtCoin!");
            createNotification($sellerUserName, "{$buyerUserName} Has Purchased {$artwork['artworkName']} From You For {$artwork['price']} ArtCoin!");
            header("location: ../views/user.php");

        }else{
            echo 'Purchase Unsuccessful!';
        }

    }else{
        echo 'Buyer, Seller, or Artwork Invalid!';
    }

?>