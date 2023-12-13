<?php
include_once("../models/userModel.php");
require_once("../controllers/SessionCheck.php");
//require_once("../controller/CookieCheck.php");
$user= getUser($_SESSION['username']);
//$user = getUser($_SESSION['username']); 
$username = $user['userName'];
?>

<html>

<head>
    <title>Top UP</title>
    <link rel="stylesheet" href="../assets/css/topUp.css">
    <script src="../assets/js/topUpCheck.js"></script>
</head>

<body>
   
    <?php echo "<p>Hello, <a href='user.php'>" . $username . "</a></p>"; ?>
   

    <form action="" method="POST" enctype="">
        <fieldset>
            <legend><h2 align="center">Top Up</h2></legend>
            <h1>Enter Amount </h1>
            <input type="text" name="amount" id="amount" />
            <br><br>
            <h1>Enter Password to verify </h1>
            <input type="Password" name="Password" id="Password" />
            <br><br>
            <input type="button" name="click" value="Top Up" onclick="topUpCheck()" />
            <div id="result"></div>
        </fieldset>
    </form>

    <div class="links-container">
        <h1><a href="UserHome.php">Home</a></h1>
        <h1><a href="../controllers/logout.php">Logout</a></h1>
    </div>
</body>

</html>
