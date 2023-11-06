<?php
    session_start();
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');

    $userName = $_SESSION['currentUserName'];
    $user = getUser($userName);
    $artworks = deleteArtworksByUser($userName);
    $password = $_REQUEST['password'];
   

    
    $isPasswordValid = true;

    if($password == ""){
        echo "Password Cannot Be Empty!";
        $isPasswordValid = false;
    }
    

    if($password != $user['password']){
        echo "Invalid Password!";
        $isPasswordValid = false;
    }

    

    if($isPasswordValid){
        $status1 = deleteUser($userName);
        $status2 = deleteArtworksByUser($userName);
        

        
        if($status1 && $status2){
            echo 'User Deleted Successfuly';
            unlink($_SESSION['currentUserName']);

            if (!unlink($user['profilePicture'])){
                echo 'Profile Delete Unsuccessful!';
            }

            while($artwork = mysqli_fetch_assoc($artworks)){
                if (!unlink($artwork['image'])){
                    echo 'Artwork Delete Unsuccessful!';
                }
            }

            header("location: ../views/login.html");
        }else{
            echo 'User Delete Unsuccessful!';
        }

    }


?>