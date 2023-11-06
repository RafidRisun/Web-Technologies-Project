<?php
    session_start();
    require_once('../models/userModel.php');
    $userName = $_SESSION['currentUserName'];
    
    $user = getUser($userName);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Delete ".$user['userName'] ?></title>
</head>
<body>
    <center>
        <h2><?php echo "Delete Account: ".$user['userName']."? <br> Your Account  And All Your Artworks Will Be Lost!" ?></h2>
    </center>
    
    <center>
        <form action="../controllers/deleteUserCheck.php" method="post" enctype="multipart/form-data">

        
            <img src="<?php echo $user['profilePicture'] ?>" alt="" width="100px"> <br>
            
            <table >
                    
                    <tr>
                        <td><b>Password</b></td>
                        <td>:
                            <input type="password" name="password" value="" >
                        </td>
                    </tr>
                    

                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Confirm">
                        </td>

                    </tr>
                    
            </table>
            
                    
                    
        
                    
                    
                

            </form>
</center>




</body>
</html>