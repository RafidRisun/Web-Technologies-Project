<?php

include_once("../models/userModel.php");
require_once("../controllers/SessionCheck.php");
$user = getUser($_SESSION['username']); 
$username = $user['userName'];
//echo "Hello, ".$username;
?>
<html>
<head>
    <title>Withdraw</title>
  
    <script src="../assets/js/withdrawCheck.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/withdraw.css">
</head>





<body>

<?php echo "<p>Hello, <a href='user.php'>" . $username . "</a></p>"; ?>

<form action="" method="POST" enctype="">
    <fieldset>
    <legend><h2 align="center" >Withdraw</h2></legend>
    <input type="text" name ="amount" id="amount"placeholder="Enter Amount to withdraw" /><br />
    <br />
    <input type="password" name ="password" id="password" placeholder="Enter Password to confirm" />
    <br /><br />
    <input type="button" value="withdraw" name="withdraw" onclick="withdrawCheck()">
    <div id="result"></div>
    
    </fieldset>
</form>
<div class="links-container">
        <h1><a href="UserHome.php">Home</a></h1>
        <h1><a href="../controllers/logout.php">Logout</a></h1>
    </div>

</body>

</html>


