<?php
    include "importStatements.inc.php";
    include "../classes/AbstractTableGateway.class.php";
    include "../classes/RegisterGateway.class.php";

    $registerInstance = new RegisterGateway();
    
    //checks if username exists and stops form submit if it does
    $users = $registerInstance->getUserNames();
    
    function generateRandomSalt(){
        return base64_encode(mcrypt_create_iv(12), MCRYPT_DEV_URANDOM);
    }
    
    for($i = 0; $i <= count($users) ; $i++){
        if($users[$i] == $_POST['email'])
        {
            $taken = true;
            
            //cancels submit if user name already exists
            echo "<script>";
            echo "$('#form').submit(function(e){ e.preventDefault(); });";
            echo "</script>";
        }
        else{$taken = false;}
    }
    $postArray = sizeof($_POST);
    for ($i = 0; $i<$postArray; $i++){
        if ($_POST[$i] == null ){
            $_POST[$i] = "null";
        }
    }    

    //sets necessary variables 
    $userID= count($users) + 1;
    $userName = $_POST['email'];
    $email= $_POST['email'];
    $salt = md5(microtime());
    $pasw = $_POST['password'];
    $currentdate = date("Y-m-d H:i:s");
    $state= 1;
    $firstName= $_POST[firstName];
    $lastName= $_POST['lastName'];
    $address= $_POST['address'];
    $city= $_POST['city'];
    $region= $_POST['region'];
    $country= $_POST['country'];
    $postal= $_POST['postal'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $privacy= 1;
    
    
    
        // echo "<script>console.log('$userName, , $salt, $state, $currentdate');</script>";
        // echo "<script>console.log('$userID, $firstName, $lastName, $address, $city, $region, $country, $postal, $phone, $email, $privacy');</script>";

    $registerInstance->usersLoginInsert($userID,$userName, md5("$pasw$salt"), $salt, $state, $currentdate);
    $userPulledID = $registerInstance->getLastID()[0];
    echo $userPulledID;
    $registerInstance->usersInsert($userPulledID, $firstName, $lastName, $address, $city, $region, $country, $postal, $phone, $email, $privacy);
    echo "<script>window.location.replace('../login.php');</script>";
?>