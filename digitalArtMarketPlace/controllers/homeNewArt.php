<?php
    require_once('sessionCheck.php');
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');
    $trendingArtist = getTrendingArtist();
    $trendingArtwork = getTrendingArtwork();
    $newArtwork = getNewArtwork();

    // $content = "<table><center><tr>";

    // while ($art = mysqli_fetch_assoc($newArtwork)) {
    //     $content .= "
    //                     <td>
    //                     <a href='../views/artwork.php?id={$art['id']}'><img src='{$art['image']}' width='100px'><br></a>
    //                     <a href='../views/artwork.php?id={$art['id']}'>{$art['artworkName']}</a><br>
    //                     <a href='../views/artwork.php?id={$art['id']}'>Artist:{$art['artistName']}</a><br>
    //                     </td>
    //                 ";
    // }
    // $content .= "</tr></center></table>";

    // echo $content;

    $artresult = [];

    while ($art = mysqli_fetch_assoc($newArtwork)){
        array_push($artresult, $art);
    }
    echo json_encode($artresult); 
?>