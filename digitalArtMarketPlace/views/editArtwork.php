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
    </head>
    <body>
        <center>
        <form action="" method="post" enctype="" onsubmit="return editfunc();">
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
                        <input type="text" id='description' name="description" value="<?php echo $art['description'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Current Price:</b>
                    </td>
                    <td>
                        <input type="text" id='price' name="price" value="<?php echo $art['price'] ?>">
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
                    <?php } ?>
                </tr>
                <input type = "text" id = "artId" name="artId" value="<?php echo $artId ?>" hidden>
                <tr>
                    <td colspan = "2">
                        <input type="submit" name="submit" value="Apply Changes" onclick="editfunc()">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="deleteArtwork.php?id=<?php echo $art['id'] ?>">Delete</a>
                    </td>
                </tr>
                
        </table>
    </form>
    </center>
    <script>
        function editfunc(){
            let name = document.getElementById('name').value;
            let description = document.getElementById('description').value;
            let price = document.getElementById('price').value;
            let yes = document.getElementById('yes').checked;
            let no = document.getElementById('no').checked;
            let id =document.getElementById('artId').value;
            let purchaseAble = "";
            if(yes == true)
            {
                purchaseAble = "Yes";
            }
            else if(no == true)
            {
                purchaseAble = "No";
            }

            if(name == '' || description=='' || price=='' || purchaseAble=='')
            {
                alert("Missing Information!");
                return false;
            }
            else
            {
                let xhttp = new XMLHttpRequest();

                xhttp.open('POST', '../controllers/editArtworkCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        alert("ArtWork Edited!");
                    }
                }

                xhttp.send('artworkName='+name+'&&description='+description+'&&price='+price+'&&purchaseAble='+purchaseAble+'&&id='+id);
            }
        }
    </script>
    </body>
</html>