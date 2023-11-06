<?php
    session_start();
    require_once('../models/notificationModel.php');
    $id = $_REQUEST['id'];

    if(!$id){
        echo "Empty ID!";
    }
    else{
        $status = deleteNotification($id);
        if(!$status){
            echo "Invalid ID!";
        }
        else{
            echo "Notification Deleted!";
            header("location: ../views/notifications.php");
        }

    }
?>