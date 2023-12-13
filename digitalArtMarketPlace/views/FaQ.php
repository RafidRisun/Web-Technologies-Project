
<html>

<head>
    <title>FaQ</title>
    <link rel="stylesheet"  href="../assets/css/FaQ.css">

</head>

<body>
<form method="post">
    <fieldset>
        <legend align="center"><strong>FaQ</strong></legend>
    </br>
    
    <select id="FaQ" name="FaQ">
        <option value="q1">1. How to convert currency</option>
        <option value="q2">2. How to withdraw the currency</option>
        <option value="q3">3. How to add artwork</option>
    </select>
    <input type="submit" name="submit" value="Submit" />

    </fieldset>
</form>
</body>

</html>
<h1><a href="UserHome.php">Home</a></h1>
<h1><a href="../controllers/logout.php">Logout</a></h1>
<?php

if (isset($_POST['submit'])) {
    $FaQ = $_POST['FaQ'];
    if($FaQ=="q1"){echo"Answer: you can to add money through different online banking system";}
    if($FaQ=="q2"){echo"Answer: you can withdraw money through different online banking system";}
    if($FaQ=="q3"){echo"Answer: you can add artwork by going to your profile and clicking on add artwork";}
}
?>
