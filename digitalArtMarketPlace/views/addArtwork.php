<?php
    require_once('../controllers/sessionCheck.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artwork</title>
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


        <h2>Add Artwork</h2>
    
        <form action="../controllers/addArtworkCheck.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                <td>
                    <b>Image</b> 
                </td>
                <td>:
                <input type="file" accept="image/*" name="uploadedImage">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Name</b> 
                </td>
                <td>:
                    <input type="text" name="artworkName" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Description</b> 
                </td>
                <td>:
                    <textarea name="artworkDescription" id="" cols="20" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Price</b> 
                </td>
                <td>:
                    <input type="number" name="artworkPrice" value="0">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Purchaseable</b> 
                </td>
                <td>:
                    <input type="radio" name="artworkPurchaseable" value="Yes" checked> Yes
                    <input type="radio" name="artworkPurchaseable" value="No"> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name= "submit" value="Add Artwork">
                </td>
            </tr>
        </table>
    </form>
</center>
    
</body>
</html>