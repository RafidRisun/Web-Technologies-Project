<?php
include_once("../controllers/sessionCheck.php");
require_once('../models/userModel.php');

$username = $_SESSION['username'];
$data = Transaction($username);
$user = getUser($_SESSION['username']); 
$username = $user['userName'];
?>

<html lang="en">
<head>
    <title>Transaction History</title>
    <script src="../assets/js/transactionHistory.js"></script>
    <link rel="stylesheet"  href="../assets/css/TransactionHistory.css">
</head>

<body>
<?php echo "<p>Hello, <a href='user.php'>" . $username . "</a></p>"; ?>
    <input type="button" name="click" value="Show Transaction History" onclick="transactionHistory()" />
    <div id="result"></div>
    <h1><a href=UserHome.php>Home</a></h1>
    <br><br>
    <h1><a href="../controllers/logout.php">Logout</a></h1>
</body>
</html>
