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
        return $this->getAll("SELECT UserName FROM UsersLogin");
    }  
    
    public function setUsername($email){
        $this->setValues("INSERT INTO UsersLogin UserName VALUES '".$email."'"); 
    }
    
    public function setFirst($first){
        $this->setValues("INSERT INTO Users FirstName VALUES '".$first."'"); 
    }
    
    public function setLast($last){
         $this->setValues("INSERT INTO Users LastName VALUES '".$last."'");
    }
    
    public function setAddress($address){
        $this->setValues("INSERT INTO Users Address VALUES '".$address."'");
    }
    
    public function setCity($city){
        $this->setValues("INSERT INTO Users City VALUES '".$city."'");
    }
    
    public function setRegion($region){
        $this->setValues("INSERT INTO Users Region VALUES '".$region."'");
    }
    
    public function setCountry($country){
        $this->setValues("INSERT INTO Users Country VALUES '".$country."'");
    }
    
    public function setPostal($postal){
        $this->setValues("INSERT INTO Users Postal VALUES '".$postal."'");
    }
    
    public function setPhone($phone){
        $this->setValues("INSERT INTO Users Phone VALUES '".$phone."'");
    }
    
    public function setEmail($email){
        $this->setValues("INSERT INTO Users Email VALUES '".$email."'");
    }
    
    public function setPassword($saltyPass){
        $this->setValues("INSERT INTO UsersLogin Email VALUES '".$saltyPass."'");
    }
    
    public function setSalt($salt){
        $this->setValues("INSERT INTO UsersLogin Salt VALUES '".$salt."'");
    }
    
    public function setUserDates($currentDate){
       $this->setValues("INSERT INTO UsersLogin DateJoined DateLastModified VALUES '".$currentDate."' '".$currentDate."'");
    }
}
?>