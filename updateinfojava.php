<!--Allow the user to edit this information. Be sure to add JavaScript validation for the following fields: l.Name, City, Country, Email (valid pattern x@x.xx). Be sure to make use of a field highlighting system similar to that used in JavaScript lab homework)-->


<!-- 
Come back and add in the isset checking
-->

<?php

require_once('includes/config.php'); 
include "includes/importStatements.inc.php";


session_start();
if(empty($_SESSION['UserID'])){
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
    header("Location:/login.php");
}

$updateUser = new UserProfileGateway();
$user = $updateUser->getSpecificUser($_SESSION['UserID']);


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$city = $_POST['city'];
$region = $_POST['region'];
$country = $_POST['country'];
$postal = $_POST['postal'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$setclause = 'SET ';

if ($firstName != NULL && strlen($firstName) > 0) {
    $setclause .= 'FirstName="'.$firstName.'"';
} 

if ($lastName != NULL && strlen($lastName) > 0) {
    $setclause .= ', LastName="'.$lastName.'"';
}
if ($address != NULL && strlen($address) > 0) {
    $setclause .= ', Address="'.$address.'"';
}
if ($city != NULL && strlen($city) > 0) {
    $setclause .= ', City="'.$city.'"';
}
if ($region != NULL && strlen($region) > 0) {
    $setclause .= ', Region="'.$region.'"';
}
if ($country != NULL && strlen($coutry) > 0) {
    $setclause .= ', Country="'.$country.'"';
}
if ($postal != NULL && strlen($postal) > 0) {
    $setclause .= ', Postal="'.$postal.'"';
}
if ($phone != NULL && strlen($phone) > 0) {
    $setclause .= ', Phone="'.$phone.'"';
}
if ($email != NULL && strlen($email) > 0) {
    $setclause .= ', Email="'.$email.'"';
}

$sql = 'Update Users ';
$sql .= $setclause;
$sql .= ' Where UserID='.$user['UserID'];

//echo $sql;

$updateUser->setValues($sql);


header( 'Location: /userProfile.php' );

?>

<!-- 

UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value 

-->