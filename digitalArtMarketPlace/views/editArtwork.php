<?php
    // session_start();
    require_once('../controllers/sessionCheck.php');
    require_once('../models/artworkModel.php');
    $userName = $_SESSION['currentUserName'];
    $artId= $_REQUEST['id'];
    
    $art=getArtwork($artId);


    
?>

<html>
    <head>
        <title>Edit Artwork</title>
        <script src="../assets/JS/editArtwork.js"></script>
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
        <table>
            <h2>Edit Artwork</h2>
                <tr>
                    <td>
                        <b>Name:</b>
                    </td>
                    <td>
                        <input type="text" id='name' name="artworkName" value="<?php echo $art['artworkName'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Description:</b>
                    </td>
                    <td>
                        <input type="text" id='description' name="description" value="<?php echo $art['description'] ?>"><p id='description'></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Current Price:</b>
                    </td>
                    <td>
                        <input type="text" id='price' name="price" value="<?php echo $art['price'] ?>"><p id='price'></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Purchaseablity:</b>
                    </td>
                    <?php if($art['purchaseAble'] == 'Yes') {?>
                    <td>
                        <input type="radio" id='yes' name="purchaseAble" value="Yes" checked> Yes
                         <input type="radio" id='no' name="purchaseAble" value="No" > No
                    </td>
                    <?php } else {?>
                    <td>
                        <input type="radio" id='yes' name="purchaseAble" value="Yes" > Yes
                         <input type="radio" id='no' name="purchaseAble" value="No" checked> No
                    </td>
                    <?php } ?>                                                                          <p id='purchaseable'></p>
                </tr>
                <input type = "text" id = "artId" name="artId" value="<?php echo $artId ?>" hidden>
                <tr>
                    <td colspan = "2">
                        <input type="button" name="submit" value="Apply Changes" onclick="return editfunc()">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="deleteArtwork.php?id=<?php echo $art['id'] ?>">Delete</a>
                    </td>
                </tr>
                
        </table>
        <div id='warning'></div>
    </center>
    </body>
</html>