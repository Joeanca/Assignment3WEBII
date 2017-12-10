<?php
class RegisterGateway extends AbstractTableGateway {    
    public function __construct()    {
        parent::__construct();   
        
    }       
    //Gets all the information from the Users table in the db
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
    
    public function usersLoginInsert($userName, $pass, $salt, $state, $currentDate){
        $this->setValues("INSERT INTO UsersLogin(UserName, Password, Salt, State, DateJoined, DateLastModified) VALUES('".$userName."', '". $password."', ".$salt.", ". $state.", ".$currentDate.", ".$currentDate.")");
    }
    
    public function usersInsert($userID, $firstName, $lastName, $address, $city, $region, $country, $postal, $phone, $email, $privacy){
        $this->setValues("INSERT INTO UsersLogin(UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy) VALUES('".$userID."', '". $firstName."', '". $lastName."', ".$address.", ". $city.", ".$region.", ".$country.", ".$postal.", ".$phone.", ".$email.", ".$privacy.")");
    }
    
}
?>