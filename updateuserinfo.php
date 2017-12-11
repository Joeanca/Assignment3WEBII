<!--Allow the user to edit this information. Be sure to add JavaScript validation for the following fields: l.Name, City, Country, Email (valid pattern x@x.xx). Be sure to make use of a field highlighting system similar to that used in JavaScript lab homework)-->

// <?php
session_start();
if(empty($_SESSION['UserID'])){
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
    header("Location:/login.php");
}

require_once('includes/config.php'); 
include_once('includes/bookFunctions.inc.php');


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update User Info</title>
        <?php include "includes/importStatements.inc.php"; 
          $userInstance = new UserProfileGateway();?>
        
    </head>
    <body>
        
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/left-nav.inc.php'; ?>
        
        <?php 
            $user= $userInstance->getSpecificUser($_SESSION['UserID']);
           ?>
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

<main class="mdl-layout__content">
            <div class="page-content">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col"></div>
                    <div class="mdl-cell mdl-cell--4-col"></div>
                    <div class="mdl-cell mdl-cell--4-col"></div>
                </div>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col"></div>
                    <div class="mdl-cell mdl-cell--4-col">
                    
                <div class="demo-card-wide mdl-card mdl-shadow--8dp card-me">
                        <h4 align="center">Update User Info</h4>
                <div align="center">
                    
                    <!-- main form for the login - if proper credentials it will log user into their own account -->
                    <form id="mainForm" action ="/updateinfojava.php" method="post">
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="firstName">
                            <label class="mdl-textfield__label " for="firstName">First Name</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="lastName">
                            <label class="mdl-textfield__label " for="lastName">Last Name</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="address">
                            <label class="mdl-textfield__label " for="address">Address</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="city">
                            <label class="mdl-textfield__label " for="city">City</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="region">
                            <label class="mdl-textfield__label " for="region">Region</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="country">
                            <label class="mdl-textfield__label " for="country">Country</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="postal">
                            <label class="mdl-textfield__label " for="postal">Postal</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="phone">
                            <label class="mdl-textfield__label " for="phone">Phone</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="email">
                            <label class="mdl-textfield__label " for="email">Email</label>
                        </div>
                        
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">Update Profile</button>
                        
                    </form>
                </div>
                
                </div>
                
                    </div>
            
            <div class="mdl-cell mdl-cell--4-col"></div>
            </div>
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col"></div>
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
    
    document.getElementsByName('email').addEventListener("submit", function(e){
        var ready = false;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var emailEntered = document.getElementsByName('email');
        if (emailEntered.value.match(mailformat)) {
            //emailIsGood();
            alert("ALERTAAAA")
        } else {
            emailEntered.classList.add("error");
            emailEntered.addEventListener("input", function() {
                this.classList.remove("error");
            });
            
        }
        
    })
    
    function emailIsGood() {
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
}
//     window.addEventListener('load', start);
// function start(){
//     var highlights = document.getElementsByClassName("hilightable");
//     for (var i=0; i<highlights.length; i++) {
//         highlights[i].addEventListener("focus", function(){
//             this.classList.toggle("hilightable");
//         });
//         highlights[i].addEventListener("blur", function(){
//             if (this.value == '' && this.classList.contains("required")){
//                 this.classList.add("error");
//             }else {
//                 this.classList.remove("error");
//             }
//             this.classList.toggle("hilightable");
//         }); 
//     }
    

//     //https://www.w3resource.com/javascript/form/email-validation.php
//     document.getElementById('mainForm').addEventListener("submit", function(e){
//         e.preventDefault();
//         var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//         var required = document.getElementsByClassName("required"); 
//         var email = document.getElementsByName("email");
//         var ready = false;
        
//         if(email.value.match(mailformat)) {
//             for (var i = 0; i<required.length; i++){
//                 if (required[i].value == "") {
//                     required[i].classList.add("error");
//                     required[i].addEventListner("input", function() {
//                         this.classList.remove("error");
//                     });
//                     ready = false;
//                     break;
//                 } else {
//                     ready = true;
//                 }
//             }
//             if (ready) {
//                 $(this).unbind('submit').suibmit();
//             } else {
//                 required[i].addEventListener("input", function(){
//                     this.classList.remove("error");
//                 });
//             }
//         } else {
//             alert("You have entered an invalid email address!"); 
//             document.form1.text1.focus(); 
//             email.classList.add("error");
//             email.addEventListener("input" , function() {
//                 this.email.remove("error");
//             });
//         }
//         })
// }
       
       </script>
       </body>