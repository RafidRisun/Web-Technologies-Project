function menuFunc(){
    document.getElementById('menu').innerHTML = '<a href="search.html">Search</a><br><a href="../controllers/logout.php">Log Out</a>';
}

function trendingArtist(){
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controllers/homeTrendingArtist.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let artists = JSON.parse(this.responseText);
            let artistcontent = "";
            for(let i = 0; i < artists.length; i++){
                artistcontent += `<td>
                                     <a href='../views/profile.php?userName=${artists[i].userName}'><img src='${artists[i].profilePicture}' width='100px'><br></a><br>
                                     <a href='../views/profile.php?userName=${artists[i].userName}'>${artists[i].userName}</a>
                                 </td>`;
            }
            document.getElementById('result').innerHTML = artistcontent;
        }
    }

    xhttp.send();
}

function trendingArt(){
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controllers/homeTrendingArt.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let art = JSON.parse(this.responseText);
            let artcontent = "";
            for(let i = 0; i < art.length; i++){
                artcontent += `<td>
                                     <a href='../views/artwork.php?id=${art[i].id}'><img src='${art[i].image}' width='100px'><br></a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>${art[i].artworkName}</a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>Artist:${art[i].artistName}</a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>Owner:${art[i].ownerName}</a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>Price:${art[i].price}</a>
                                 </td>`;
            }
            document.getElementById('result2').innerHTML = artcontent;
        }
    }

    xhttp.send();
}
function newArt(){
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controllers/homeNewArt.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let art = JSON.parse(this.responseText);
            let artcontent = "";
            for(let i = 0; i < art.length; i++){
                artcontent += `<td>
                                     <a href='../views/artwork.php?id=${art[i].id}'><img src='${art[i].image}' width='100px'><br></a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>${art[i].artworkName}</a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>Artist:${art[i].artistName}</a><br>
                                     <a href='../views/artwork.php?id=${art[i].id}'>Price:${art[i].price}</a>
                                 </td>`;
            }
            document.getElementById('result3').innerHTML = artcontent;
        }
    }

    xhttp.send();
}