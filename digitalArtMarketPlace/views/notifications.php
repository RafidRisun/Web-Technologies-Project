<?php
    session_start();

    require_once('../models/notificationModel.php');
    $userName = $_SESSION['currentUserName'];
    $notifications = getUserNotifications($userName);

    
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $userName." Notifications" ?></title>
</head>
<body>
    <center>
        <h2>Notifications</h2>
        
        
            <?php while($notification = mysqli_fetch_assoc($notifications)){ ?>
                
                <b><?php echo $notification['description'] ?></b> | <?php echo $notification['time'] ?> | <a href="../controllers/deleteNotification.php?id=<?php echo $notification['id'] ?>">Delete</a>
                <hr>
            <?php } ?>
                    
                    
                

        
        
    </center>
    
</body>
</html>