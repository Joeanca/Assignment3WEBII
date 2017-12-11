<?php
class RegisterGateway extends AbstractTableGateway {    
    public function __construct()    {
        parent::__construct();   
        
    }       
    //Gets all the users from the Users table in the db
    protected function getSelectStatement(){
        return "SELECT UserID, FirstName, LastName, Email FROM Users";
    }    
    protected function getOrderFields(){
        return "UserID";
    }      
    protected function getKeyName(){
        return "UserName";
    } 
    
    public function getUserNames(){
        return $this->getSpecific("SELECT UserName FROM UsersLogin");
    }
    
    //inserts into UsersLogin table
    public function usersLoginInsert($userID,$userName, $password, $salt, $state, $currentDate){
        $this->setValues("INSERT INTO UsersLogin(UserID,UserName, Password, Salt, State, DateJoined, DateLastModified) VALUES('$userID','$userName',  '$password', '$salt', ' $state', '$currentDate', '$currentDate')");
    }
    
    public function getLastID(){
        return $this->getSpecific("SELECT UserID FROM UsersLogin ORDER BY UserID DESC LIMIT 1")[0];
    }
    
    //inserts into Users table
    public function usersInsert( $userID, $firstName, $lastName, $address, $city, $region, $country, $postal, $phone, $email, $privacy){
        $userInt = (int)$userID;
        $this->setValues("INSERT INTO Users(UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy) VALUES($userInt,'$firstName', '$lastName', '$address', '$city', '$region', '$country', '$postal', '$phone','$email', '$privacy')");
    }
    
}
?>