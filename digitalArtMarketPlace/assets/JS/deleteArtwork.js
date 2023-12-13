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