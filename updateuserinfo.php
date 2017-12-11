<!--Allow the user to edit this information. Be sure to add JavaScript validation for the following fields: l.Name, City, Country, Email (valid pattern x@x.xx). Be sure to make use of a field highlighting system similar to that used in JavaScript lab homework)-->

<?php
session_start();
if(empty($_SESSION['UserID'])){
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
    header("Location:/login.php");
}




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update User Info</title>
        <?php 
        include "includes/importStatements.inc.php"; 
        require_once('includes/config.php'); 
        include_once('includes/bookFunctions.inc.php');
          $userInstance = new UserProfileGateway();?>
        
    </head>
    <body>
        
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
        
        <?php 
            $user= $userInstance->getSpecificUser($_SESSION['UserID']);
           ?>

<main class="mdl-layout__content mdl-color--grey-50 ">
     <div class="mdl-grid">
            <div class="page-content">
                <div class="mdl-grid">
                    <div class="mdl-grid mdl-cell--12-col ">
                        <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell mdl-cell--4-col demo-card-wide mdl-card mdl-shadow--8dp card-me">
                        <h4 align="center">Update User Info</h4>
                <div align="center">
                    
                    <!-- main form for the login - if proper credentials it will log user into their own account -->
                    <form id="mainForm" action ="/updateinfojava.php" method="post">
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="firstName"  value="<?php echo $user['FirstName']?>">
                            <label class="mdl-textfield__label " for="firstName">First Name</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="lastName"  value="<?php echo $user['LastName']?>">
                            <label class="mdl-textfield__label " for="lastName">Last Name*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="address"  value="<?php echo $user['Address']?>">
                            <label class="mdl-textfield__label " for="address">Address</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="city"  value="<?php echo $user['City']?>">
                            <label class="mdl-textfield__label " for="city">City*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="region"  value="<?php echo $user['Region']?>">
                            <label class="mdl-textfield__label " for="region">Region</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="country"  value="<?php echo $user['Country']?>">
                            <label class="mdl-textfield__label " for="country">Country*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="postal"  value="<?php echo $user['Postal']?>">
                            <label class="mdl-textfield__label " for="postal">Postal</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="phone"  value="<?php echo $user['Phone']?>">
                            <label class="mdl-textfield__label " for="phone">Phone</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="email" value="<?php echo $user['Email']?>">
                            <label class="mdl-textfield__label " for="email">Email*</label>
                        </div>
                        
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">Update Profile</button>
                        
                    </form>
                </div>
                
                </div>
                <div class="mdl-layout-spacer"></div>
                
                    </div>
            
            <div class="mdl-cell mdl-cell--4-col"></div>
            </div>
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col"></div>
        </div>
        
        </div>
            </div>
                                </div>

        </main>
        
        <script>
    window.addEventListener('load', start);
function start(){
    var highlights = document.getElementsByClassName("hilightable");
    for (i=0; i<highlights.length; i++) {
        highlights[i].addEventListener("focus", function(){
            this.classList.toggle("hilightable");
        });
        highlights[i].addEventListener("blur", function(){
            if (this.value == '' && this.classList.contains("required")){
                this.classList.add("error");
            }else {
                this.classList.remove("error");
            }
            this.classList.toggle("hilightable");
        }); 
    }
    document.getElementById('mainForm').addEventListener("submit", function(e){
        e.preventDefault();
        var required = document.getElementsByClassName("required");
        var ready = false;
        for (var i=0; i<required.length; i++) {
            if (required[i].value == ""){
               required[i].classList.add("error");
               required[i].addEventListener("input", function(){
                  this.classList.remove("error") ;
               });
               ready = false;
               break;
            } else {
                ready = true;
            }
        }    
        if (ready){
        $(this).unbind('submit').submit();}
    })
}
</script>
</body>