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
    <title><?php echo "Edit ".$user['userName'] ?></title>
</head>
<body>
    <center>
        
        <h2><?php echo $user['userName'] ?></h2>
    </center>
    
    <center>
        <form action="../controllers/editUserCheck.php" method="post" enctype="multipart/form-data">

        
            <table>
            <tr>
                <td>
                    <table >
                    <tr>
                        <td><b>Username</b></td>
                        <td>: <input type="text" name="userName" value="<?php echo $user['userName']?>"></td>             
                    </tr>
                    <tr>
                        <td><b>First Name</b></td>
                        <td>: <input type="text" name="firstName" value="<?php echo $user['firstName']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Last Name</b></td>
                        <td>: <input type="text" name="lastName" value="<?php echo $user['lastName']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>: <input type="email" name="email" value="<?php echo $user['email']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Phone Number</b></td>
                        <td>: <input type="text" name="phoneNumber" value="<?php echo $user['phoneNumber']?>"></td>
                    </tr>
                    <tr>
                        <td><b>Gender</b></td>
                        <td>:
                            <?php if($user['gender'] == 'Male'){ ?>
                                <input type="radio" name="gender" value="Male" checked> Male
                                <input type="radio" name="gender" value="Female" > Female
                                <input type="radio" name="gender" value="Other" > Other
                            <?php }?>
                            <?php if($user['gender'] == 'Female'){ ?>
                                <input type="radio" name="gender" value="Male" > Male
                                <input type="radio" name="gender" value="Female" checked> Female
                                <input type="radio" name="gender" value="Other" > Other
                            <?php }?>
                            <?php if($user['gender'] == 'Other'){ ?>
                                <input type="radio" name="gender" value="Male" > Male
                                <input type="radio" name="gender" value="Female" > Female
                                <input type="radio" name="gender" value="Other" checked> Other
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Type</b></td>
                        <td>:
                            <?php if($user['type'] == 'Artist'){ ?>
                                <input type="radio" name="type" value="Artist" checked> Artist
                                <input type="radio" name="type" value="User" > User
                            <?php }?>
                            <?php if($user['type'] == 'User'){ ?>
                                <input type="radio" name="type" value="Artist" > Artist
                                <input type="radio" name="type" value="User" checked> User
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth</b></td>
                        <td>:
                            <input type="date" name="dateOfBirth" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>Current Password</b></td>
                        <td>:
                            <input type="password" name="password" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>New Password</b></td>
                        <td>:
                            <input type="password" name="newPassword" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>Retype Password</b></td>
                        <td>:
                            <input type="password" name="retypePassword" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td><b>Proflie Picture</b></td>
                        <td>:
                        <input type="file" accept="image/*" name="profilePicture">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Confirm">
                        </td>

                    </tr>
                    

                   

                    

                    </table>
                </td>
                
                    
                    <td >
                        <img src="<?php echo $user['profilePicture'] ?>" alt="" width="350px"> <br>
                    </td>
                    
                </tr>
            </table>

            </form>
</center>




</body>
</html>