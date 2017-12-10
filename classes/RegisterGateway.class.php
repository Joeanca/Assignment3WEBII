<?php
class LoginGateway extends AbstractTableGateway {    
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
    
    public function setUsername($email){
        return "INSERT INTO UsersLogin UserName VALUES".$email; 
    }
    
    public function setFirst($first){
        return "INSERT INTO Users FirstName VALUES".$first; 
    }
    
    public function setLast($last){
        return "INSERT INTO Users LastName VALUES".$last;
    }
    
    public function setAddress($address){
        return "INSERT INTO Users Address VALUES".$address;
    }
    
    public function setCity($city){
        return "INSERT INTO Users City VALUES".$city;
    }
    
    public function setRegion($region){
        return "INSERT INTO Users Region VALUES".$region;
    }
    
    public function setCountry($country){
        return "INSERT INTO Users Country VALUES".$country;
    }
    
    public function setPostal($postal){
        return "INSERT INTO Users Postal VALUES".$postal;
    }
    
    public function setPhone($phone){
        return "INSERT INTO Users Phone VALUES".$phone;
    }
    
    public function setEmail($email){
        return "INSERT INTO Users Email VALUES".$email;
    }
    
    public function setPassword($saltyPass){
        return "INSERT INTO UsersLogin Email VALUES '".$saltyPass."'";
    }
    
    public function setSalt($salt){
        return "INSERT INTO UsersLogin Salt VALUES '".$salt."'";
    }
    
    public function setUserDates($currentDate){
        return "INSERT INTO UsersLogin DateJoined DateLastModified VALUES '".$currentDate."' '".$currentDate."'";
    }
}
?>