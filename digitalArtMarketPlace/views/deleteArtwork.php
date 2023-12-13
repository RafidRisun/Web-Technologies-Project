<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    $user = $_SESSION['currentUserName'];
    $id = $_REQUEST['id'];

?>
<html>
    <head>
        <title>
            Delete Art
        </title>
        <script src="../assets/JS/deleteArtwork.js"></script>
        <link rel="stylesheet" href="../assets/styles/rafid.css"/>
    </head>
    <body>
            <div id='topbarleft'>
                <a href=homepage.html><img src="../assets/home.png"></a>
                </div>
    
                <div id='topbarright'>
                <a href="user.php" >
                            User
                        </a><br>
                        <div onclick='menuFunc()'>
                            <p id='menu'>Menu</p></div>
                        </div>
            <center>
                <input type="hidden" id = 'id' name="id" value="<?php echo $id ?>">
                Enter Password to Delete: <input type="password" id='password' name="password" value=""><br><input type="button" name="submit" value="Submit" onclick="return deleteart()">
                <div id='warning'></div>
            </center>
    </body>
</html>