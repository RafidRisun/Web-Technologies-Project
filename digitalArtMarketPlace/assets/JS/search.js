function searchfunc(){
    let name = document.getElementById('term').value;
    if(name==''){
        alert("Enter a User Name!");
    }
    else{
        let xhttp = new XMLHttpRequest();

    

        xhttp.open('POST', '../controllers/searchCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('result').innerHTML = this.responseText;
            }
        }

        xhttp.send('std='+name);
    }
}

function menuFunc(){
    document.getElementById('menu').innerHTML = '<a href="search.html">Search</a><br><a href="../controllers/logout.php">Log Out</a>';
}