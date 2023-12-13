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

            if(name == ''){
                document.getElementById('warning').innerHTML = "Enter a name";
                return false;
            }
            else if(description == ''){
                document.getElementById('warning').innerHTML="Enter a description";
                return false;
            }
            else if(price == ''){
                document.getElementById('warning').innerHTML="Enter a price";
                return false;
            }
            else if(purchaseAble == ''){
                document.getElementById('warning').innerHTML="Enter purchasability";
                return false;
            }
            else
            {
                let xhttp = new XMLHttpRequest();

                xhttp.open('POST', '../controllers/editArtworkCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById('warning').innerHTML= this.responseText;
                    }
                }
                xhttp.send('artworkName='+name+'&description='+description+'&price='+price+'&purchaseAble='+purchaseAble+'&id='+id);
            }
        }

        function menuFunc(){
            document.getElementById('menu').innerHTML = '<a href="search.html">Search</a><br><a href="../controllers/logout.php">Log Out</a>';
        }