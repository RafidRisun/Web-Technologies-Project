<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');
    $userName = $_SESSION['currentUserName'];
    
    $user = getUser($userName);
    $artworks = getUserArtworks($userName);

    if(!$user) {
        echo "User {$userName} not found!";
        return;
    }
    




    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "User ".$user['userName'] ?></title>
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


        
        <h2><?php echo $user['userName'] ?></h2>
    </center>
    
    <center>
            <table>
            <tr>
                <td>
                    <table >
                    <tr>
                        <td><b>Username</b></td>
                        <td>:<?php echo $user['userName'] ?></td>             
                    </tr>
                    <tr>
                        <td><b>First Name</b></td>
                        <td>:<?php echo $user['firstName'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Last Name</b></td>
                        <td>:<?php echo $user['lastName'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>:<?php echo $user['email'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Phone Number</b></td>
                        <td>:<?php echo $user['phoneNumber'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Gender</b></td>
                        <td>:<?php echo $user['gender'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Type</b></td>
                        <td>:<?php echo $user['type'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Balance (ArtCoin)</b></td>
                        <td>:<?php echo $user['balance'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth</b></td>
                        <td>:<?php echo $user['dateOfBirth'] ?></td>
                    </tr>

                    <tr>
                        <td><b>Joining Date</b></td>
                        <td>:<?php echo $user['joiningDate'] ?></td>
                    </tr>
                    <?php if($user['type'] == "Artist") { ?>
                    <tr>
                        <td><b>Total Views</b></td>
                        <td>:<?php echo $user['totalViews'] ?></td>
                    </tr>
                    <?php }?>  
                    </table>
                </td>
                <td>
                    
                    </td>
                    <td >
                        <img src="<?php echo $user['profilePicture'] ?>" alt="" width="250px"> <br>
                    </td>
                    
                </tr>
            </table>

            <table>
                <tr>
                    <td>
                        <?php if($user['type'] == "Artist") { ?>
                            <a href="addArtwork.php">
                                <button>Add Artwork</button>
                            </a>
                        <?php }?>
                    </td>
                    <td>
                        <a href="notifications.php">
                            <button>Notifications</button>
                        </a>
                    </td>

                    <td>
                        <a href="profile.php?userName=<?php echo $user['userName'] ?>">
                            <button>Public Profile</button>
                        </a>
                    </td>
                    <td>
                        <a href="editUser.php">
                            <button>Edit Details</button>
                        </a>
                    </td>
                    <td>
                        <a href="deleteUser.php">
                            <button>Delete Account</button>
                        </a>
                    </td>
                    <td>
                        <a href="../controllers/logout.php">
                            <button>Log Out</button>
                        </a>
                    </td>



                </tr>
            </table>
            

</center>


<center>
    <h3>Artworks</h3>
</center>

<center>

    <table>
        <tr>
            <?php while($artwork = mysqli_fetch_assoc($artworks)){ ?>
            <td>
                <a href="artwork.php?id=<?php echo $artwork['id']?>">
                    <img src="<?php echo $artwork['image'] ?>" alt="" width="150px">
                    <p><center><b> <?php echo $artwork['artworkName'] ?> </b></center> </p>
                    <p><center> <?php echo $artwork['price'] ?> ArtCoin </center></p>
                </a>
                
            </td>
            <?php   }?>
        </tr>
    </table>
    
</center>

</body>
</html>