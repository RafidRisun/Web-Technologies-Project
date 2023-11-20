<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
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
        <table width="100%">
                <tr>
                    <td colspan="8"><a href=homepage.php><img src="../assets/head.PNG"></a></td>
                    <td>
                        <a href="user.php" >
                            User
                        </a><br>
                        <a href="menu.html" >
                            Menu
                        </a>
                    </td>
                </tr>
            </table>
        <table>


        <h2>Notifications</h2>
        
        
            <?php while($notification = mysqli_fetch_assoc($notifications)){ ?>
                
                <b><?php echo $notification['description'] ?></b> | <?php echo $notification['time'] ?> | <a href="../controllers/deleteNotification.php?id=<?php echo $notification['id'] ?>">Delete</a>
                <hr>
            <?php } ?>
                    
                    
                

        
        
    </center>
    
</body>
</html>