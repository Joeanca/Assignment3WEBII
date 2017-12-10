<?php

$registerInstance = new RegisterGateway();
    
    //checks if username exists and stops form submit if it does
    $users = $registerInstance->getUserNames();
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


    //sets necessary variables 
    $userID= count($users) + 1;
    $email= $_POST['email'];
    $salt = MD5(microtime());
    $password = $_POST['password'] . $salt;
    $currentdate = date("YYYY-mm-dd HH:ii:ss");
    $state= 1;
    $firstName= $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $address= $_POST['address'];
    $city= $_POST['city'];
    $region= $_POST['region'];
    $country= $_POST['country'];
    $postal= $_POST['postal'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $privacy= 1;
    
    $registerInstance->usersLoginInsert($userName, $pass, $salt, $state, $currentDate);
    
    $registerInstance->usersInsert($userID, $firstName, $lastName, $address, $city, $region, $country, $postal, $phone, $email, $privacy);

?>