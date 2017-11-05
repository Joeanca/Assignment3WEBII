<?php
    class AdapterFactory {
        public static function createAdapter($type, $connectionValues){
            if (class_exists($type)){
                return new PDO('mysql:dbname=book;charset=utf8mb4;','testUser', 'mypassword');
            }  else {
                echo "NOT INSIDE THE IF";
                return new MySQLi();
            }
        }
    }
?>