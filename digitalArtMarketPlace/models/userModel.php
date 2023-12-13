<?php

    require_once('db.php');

    // function login($userName, $password){
    //     $con = getConnection();
    //     $sql = "select * from Users where userName='{$userName}' and password='{$password}'";
    //     $result = mysqli_query($con, $sql);
    //     if(!$result) {
    //         return NULL;
    //     }

    //     $user = mysqli_fetch_assoc($result);
    //     return $user;
        
    //     }
    function login($username, $password)
    {
        $con = getConnection();
        $sql = "select * from users where UserName='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $user = mysqli_fetch_array($result);
        if ($count == 1) {
            session_start();
            setcookie('username', $row['UserName'], time() + 3600, '/');
            //setcookie('flag', 'true', time()+3600, '/');
            $_SESSION['username'] = $row['UserName'];
            $_SESSION['currentUserName'] = $row['UserName'];
            $_SESSION['password'] = $row['Password'];
            $_SESSION['flag'] = "true";
            return true;
            
        } else {
            return false;
        }
    }

    function ShowBalance($username){
        $con = getConnection();
        $sql = "select `Balance` FROM `users` WHERE UserName = '{$username}'";
        $result = mysqli_query($con, $sql);
        $balance = mysqli_fetch_assoc($result);
        return $balance;
    }

    function addMoney($username,$amount){
        //date_default_timezone_set('Asia/Dhaka'); 
    
        //$date = date('d-m-Y');
        $con = getConnection();
       // mysqli_query($con,"UPDATE `users` SET `date_time`='{$date}' WHERE UserName='Azwad1'");
        $sql = "update `users` set `Balance`= Balance + '{$amount}',`TransactionType` ='TopUp' WHERE UserName = '{$username}'";
        $sql2="INSERT INTO `transactionhistory`(`UserId`, `Type`, `Amount`) VALUES ('{$username}', 'TopUp','{$amount}') ";
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con,$sql2);
       
        if ($result==true) {
            //echo"successfull";
            return true;
           
        } else {
            return false;
        }
    }
        
    function withdraw($username,$amount){
        $con = getConnection();
        $sql="UPDATE users SET Balance=Balance-'{$amount}' WHERE Username='$username'";
        $sql2="INSERT INTO `transactionhistory`(`UserId`, `Type`, `Amount`) VALUES ('{$username}', 'Withdrawn','{$amount}') ";
        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con,$sql2);
       
        if ($result==true) {
            //echo"successfully withdrawn";
            return true;
           
        } else {
            return false;
        }
    }

    function Transaction($username){
        $con = getConnection();
        $sql = "SELECT * FROM `transactionhistory` WHERE UserId = '{$username}';";
        $result = mysqli_query($con, $sql);
        $transArray = [];
        while($trans = mysqli_fetch_assoc($result)){
            array_push($transArray, $trans);
        }
        return $transArray;
        
    }

    function getUser($userName){
        $con = getConnection();
        $sql = "select * from Users where userName='{$userName}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function searchUser($userName){
        $con = getConnection();
        $sql = "select * from Users where userName like '%{$userName}%'";
        $result = mysqli_query($con, $sql);

        return $result;
    }


    function deleteUser($userName){
        $con = getConnection();
        $sql = "delete from Users where userName = '{$userName}'";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            return false;
        }else{
            return true;
        }

    }

    function updateUser($currentUserName, $user){
        $con = getConnection();

        $balance = $user['balance'];
        $dateOfBirth = $user['dateOfBirth'];
        $email = $user['email'];
        $firstName = $user['firstName'];
        $gender = $user['gender'];
        $joiningDate = $user['joiningDate'];
        $lastName = $user['lastName'];
        $phoneNumber = $user['phoneNumber'];
        $profilePicture = $user['profilePicture'];
        $totalViews = $user['totalViews'];
        $type = $user['type'];
        $userName = $user['userName'];
        $password = $user['password'];
        
        $sql = "update Users set balance = '{$balance}', dateOfBirth = '{$dateOfBirth}', email = '{$email}', firstName = '{$firstName}', gender = '{$gender}', joiningDate = '{$joiningDate}', lastName = '{$lastName}', phoneNumber = '{$phoneNumber}', profilePicture = '{$profilePicture}', totalViews = {$totalViews}, type = '{$type}', userName = '{$userName}', password = '{$password}' where userName = '{$currentUserName}'";

        $result = mysqli_query($con, $sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    function checkDuplicateUserName($userName){
        $con = getConnection();
        $sql = "select * from Users where userName='{$userName}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function checkDuplicateEmail($email){
        $con = getConnection();
        $sql = "select * from Users where email='{$email}'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            return NULL;
        }

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function getTrendingArtist(){
        $con = getConnection();
        $sql = "select * from users where type = 'Artist' order by totalViews desc";
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return NULL;
        }
        return $result;
    }

?>