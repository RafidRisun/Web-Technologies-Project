<?php
    require_once('../models/userModel.php');
    require_once('sessionCheck.php');
    $userName = $_POST['std'];
    $result = searchUser($userName);

    $content = "<center><b>Results:</b><table>";

    while ($rows = mysqli_fetch_assoc($result)) {
        $content .= "<tr><td>User Name</td><td>:<a href='../views/profile.php?userName={$rows['userName']}'>{$rows['userName']}</a></td></tr>
                        <tr><td>Views</td><td>:{$rows['totalViews']}</td></tr>";
    }

    $content .= "</table></center>";
    
    echo $content;

?>