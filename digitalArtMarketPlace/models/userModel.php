<?php

    require_once('db.php');

    function login($userName, $password){
        $con = getConnection();
        $sql = "select * from Users where userName='{$userName}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        if($result){
            $user = mysqli_fetch_assoc($result);
            if(count($user) > 0){
                return true;
            }else{
                return false;
            }
        }
        }
        
    function signup(){

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

    function adduser(){

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