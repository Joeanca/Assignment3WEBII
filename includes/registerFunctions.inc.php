<?php

//used to check if a POST value has been set
function checkIsset($val){
    if(isset($val)){
        $isset = true;
    }
    else {$isset = false;}
    
    return $isset;
}
    //sets first name in DB 
    $first = checkIsset($_POST['firstName']);
    if($first == true){
        $registerInstance->setFirst($_POST['firstName']);
    }
    
    //sets last name in DB 
    $last = checkIsset($_POST['lastName']);
    if($last == true){
        $registerInstance->setLast($_POST['lastName']);
    }
    
    //sets address in DB
    $address = checkIsset($_POST['address']);
    if($address == true){
        $registerInstance->setAddress($_POST['address']);
    }
    
    //sets city in DB
    $city = checkIsset($_POST['city']);
    if($city == true){
        $registerInstance->setCity($_POST['city']);
    }
    
    //sets region in DB
    $region = checkIsset($_POST['region']);
    if($region == true){
        $registerInstance->setRegion($_POST['region']);
    }
    
    //sets country in DB
    $country = checkIsset($_POST['country']);
    if($country == true){
        $registerInstance->setCountry($_POST['country']);
    }
    
    //sets postal code in DB
    $postal = checkIsset($_POST['postal']);
    if($postal == true){
        $registerInstance->setPostal($_POST['postal']);
    }
    
    //sets phone number in DB
    $phone = checkIsset($_POST['phone']);
    if($phone == true){
        $registerInstance->setPhone($_POST['phone']);
    }
    
    //sets email in DB
    $email = checkIsset($_POST['email']);
    if($email == true){
        $registerInstance->setEmail($_POST['email']);
    }
    
    //gets salt value and sets it in DB
    $salt = MD5(microtime());
    $registerInstance->setSalt($salt);
    
    //combines password with salt value and sets it in DB
    $passwordVal = checkIsset($_POST['password']);
    if($passwordVal == true){
        $password = $_POST['password'] . $salt;
        $registerInstance->setPassword(password);
    }
    
    //checks if username exists
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
    
    //sets user name in DB if it is unique
    $username = checkIsset($_POST['email']);
    if($taken == false && $username == true){
        $registerInstance->setUsername($_POST['email']);
    }
    
    $currentdate = date("YYYY-mm-dd HH:ii:ss");
    $registerInstance->setUserDates($currentdate);



?>