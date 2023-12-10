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
    </head>
    <body>
            <center>
                <input type="hidden" id = 'id' name="id" value="<?php echo $id ?>">
                Enter Password to Delete: <input type="password" id='password' name="password" value=""><br><input type="button" name="submit" value="Submit" onclick="return deleteart()">
                <div id='warning'></div>
            </center>
          
    <script>
        function deleteart(){
            let password = document.getElementById('password').value;
            let id = document.getElementById('id').value;

            if(password == ""){
                document.getElementById('warning').innerHTML="Enter Password!";
                return false;
            }
            else{
                let xhttp = new XMLHttpRequest();

                xhttp.open('POST', '../controllers/deleteArtworkCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        alert(this.responseText);
                        window.location.href = "user.php";
                    }
                }
                xhttp.send('password='+password+'&id='+id);
            }
        }
    </script>
    </body>
</html>