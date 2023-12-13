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

    $content = "";

    while ($rows = mysqli_fetch_assoc($result)) {
        $content .= "<img src='../assets/artworks/{$rows['image']}'" ;

    }
    echo $content;

?>