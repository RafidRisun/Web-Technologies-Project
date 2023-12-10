<?php
    require_once('../models/userModel.php');
    require_once('sessionCheck.php');
    $userName = $_POST['std'];
    $result = searchUser($userName);

    $content = "<table>Results:";

    while ($row = mysqli_fetch_assoc($result)) {
        $content .= "<tr>
                        <td><a href='../views/profile.php?userName={$row['userName']}'>{$row['userName']}</a></td>
                    </tr>";
    }

    $content .= "</table>";
    
    echo $content;

?>