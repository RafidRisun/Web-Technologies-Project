<?php
    require_once('sessionCheck.php');
    require_once('../models/userModel.php');
    require_once('../models/artworkModel.php');
    $trendingArtist = getTrendingArtist();
    $trendingArtwork = getTrendingArtwork();
    $newArtwork = getNewArtwork();

    // $content = "<table><center><tr>";

    // while ($artist = mysqli_fetch_assoc($trendingArtist)) {
    //     $content .= "
    //                     <td>
    //                     <a href='../views/profile.php?userName={$artist['userName']}'><img src='{$artist['profilePicture']}' width='100px'><br></a><br>
    //                     <a href='../views/profile.php?userName={$artist['userName']}'>{$artist['userName']}</a>
    //                     </td>
    //                 ";
    // }
    // $content .= "</tr></center></table>";

    // echo $content;

    $artistresult = [];

    while ($artist = mysqli_fetch_assoc($trendingArtist)){
        array_push($artistresult, $artist);
    }
    echo json_encode($artistresult); 

?>