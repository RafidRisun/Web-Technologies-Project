<?php
    include_once("../controllers/sessionCheck.php");
    require_once('../models/userModel.php');
    $user = getUser($_SESSION['username']); 
    $username = $user['userName'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
</head>

<body>
    <centre>
    <div class="username"> 
        <h2>Hello, <?php echo $username; ?></h2>
    </div>
    </centre>
    
        <h1><a href="transactionHistory.php">1. Transaction History</a></h1>
        <h1><a href="topUp.php">2. TopUp</a></h1>
        <h1><a href="withdraw.php">3. Withdraw</a></h1>
       
        <h1><a href="FaQ.php">4. FaQ</a></h1>
        <h1><a href="aboutUs.html">5. About our website</a></h1>
   
    <br>

    <button><a href="../controllers/logout.php">Logout</a></button>
   
</body>

</html>
