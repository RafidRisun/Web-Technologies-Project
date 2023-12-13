<?php 
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/artworkModel.php');
    $userName = $_SESSION['currentUserName'];
    $artId = $_REQUEST['id'];
    $result = getArtworkWithId($artId);
    $art = mysqli_fetch_assoc($result);

    $art['views'] = $art['views']+1;
    updateArtwork($art) ;

    if(!$art) {
        echo "Artwork not found!";
        return;
    }
?>
<html>
<header>
    <title>Artwork</title>
    <script src="../assets/JS/artwork.js"></script>
    <link rel="stylesheet" href="../assets/styles/rafid.css"/>
</header>



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
        <h2>Artwork</h2><br>
        <img src="<?php echo $art['image'] ?>" width="600px"><br>
        <table>
            <tr>
                <td><b>Name:</b></td>
                <td><?php echo $art['artworkName']  ?></td>
            </tr>
            <tr>
                <td><b>Description:</b></td>
                <td><?php echo $art['description']  ?></td>
            </tr>
            <tr>
                <td><b>Artist:</b></td>
                    <td><a href="profile.php?userName=<?php echo $art['artistName'] ?>"><?php echo $art['artistName'] ?></a></td>
            </tr>
            <tr>
                <td><b>Owner:</b></td>
                <td><a href="profile.php?userName=<?php echo $art['ownerName'] ?>"><?php echo $art['ownerName'] ?></a></td>
            </tr>
            <tr>
                <td><b>Current Price:</b></td>
                <td><?php echo $art['price'] ?></td>
            </tr>
            <?php if($art['purchaseAble'] == 'Yes' && $art['ownerName'] != $userName ) { ?>
            <tr>
                <td>
                    <b><a href="buyArtwork.php?id=<?php echo $art['id'] ?>">BUY</a></b>
                </td>
            </tr>
            <?php } ?>

            <?php if($_SESSION['currentUserName'] == $art['ownerName']) { ?> 
            <tr>
                <td>
                    <b><a href="editArtwork.php?id=<?php echo $art['id'] ?>">EDIT</a></b>
                </td>
            </tr>
            <?php } ?>
        </table>

    </center>
</body>

</html>