<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/chatModel.php');
    require_once('../models/userModel.php');
    
    $senderUserName = $_SESSION['currentUserName'];
    $receiverUserName = $_REQUEST['userName'];

    if($senderUserName == $receiverUserName){
        echo "You Cannot Send Messages To Yourself!";
        return;
    }

    $sender = getUser($senderUserName);
    $receiver = getUser($receiverUserName);

    $messages = getMessages($sender['userName'], $receiver['userName']);



    
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Chat With ".$receiver['userName'] ?></title>
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


        <h2><?php echo $receiver['userName'] ?></h2>
        
        <p>(This Is The Beginning Of This Conversation)</p>
        <table>
                
                
            <?php while($message = mysqli_fetch_assoc($messages)){ ?>
                
                <?php if($message['sender'] == $receiver['userName']) { ?>
                    <tr>
                        <td>
                            <a href="profile.php?userName=<?php echo $receiver['userName'] ?>">
                                <img src="<?php echo $receiver['profilePicture']?>" alt="" width="40px">
                            </a>

                        </td>
                        
                        <td>
                            <?php echo $message['message']?>
                        </td>
                        <td colspan="3"></td>
                    </tr>
                    <?php } ?>
                    
                    <?php if($message['sender'] == $sender['userName']) { ?>
                        <tr>
                            <td colspan="3"></td>
                            <td>
                            <?php echo $message['message']?>
                        </td>
                        <td>
                            <a href="user.php">
                                <img src="<?php echo $sender['profilePicture']?>" alt="" width="40px">
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    
                <?php } ?>
                    
                    
                </table>
                
                <form action="../controllers/sendMessage.php" method="post">
                    <input hidden type="text" name="receiver" value="<?php echo $receiver['userName']?>">
                    <input type="text" name="message" value="" id="message">
                    <input type="submit" name="submit" value="Send">
                </form>
        
        
        </center>
        
        
    
</body>
</html>