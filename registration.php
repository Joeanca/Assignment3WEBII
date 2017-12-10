<?php
 session_start();
    if(isset($_SESSION['UserID'])){
        session_destroy();
    }if
    ( isset($_SESSION['postdata'])) {
        $_POST = $_SESSION['postdata'];
        unset($_SESSION['postdata']);
        $_SESSION = array();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styles.css" />
      
<?php 
    include "includes/importStatements.inc.php"; 
?>
        
    </head>
    <body>
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawe mdl-layout--fixed-header">
    <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
            <h1 class="mdl-layout-title"><span>CRM</span> Admin</h1>
    </header>

<?php
    include "includes/registerFunctions.inc.php";
?>
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
                        <h4 align="center">Update User Profile</h4>
                <div align="center">
                    
                    <!-- main form for the login - if proper credentials it will log user into their own account -->
                    <form id="mainForm" action ="/registration.php" method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="firstName">
                            <label class="mdl-textfield__label " for="firstName">First Name</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="lastName">
                            <label class="mdl-textfield__label " for="lastName">Last Name*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="address">
                            <label class="mdl-textfield__label " for="address">Address</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="city">
                            <label class="mdl-textfield__label " for="city">City*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="region">
                            <label class="mdl-textfield__label " for="region">Region</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="text" name="country">
                            <label class="mdl-textfield__label " for="country">Country*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="postal">
                            <label class="mdl-textfield__label " for="postal">Postal Code</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input hilightable" type="text" name="phone">
                            <label class="mdl-textfield__label " for="phone">Phone Number</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" id="email" type="text" name="email">
                            <label class="mdl-textfield__label " for="email">Email*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="password" name="password">
                            <label class="mdl-textfield__label" for="password">Password*</label>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input required hilightable" type="password" name="password">
                            <label class="mdl-textfield__label" for="password">Confirm Password*</label>
                        </div>
                        
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">Create Account</button>
                    </form>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="button" onclick="javascript:window.location.assign('/login.php')">Back to Login</button>
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

        </div>
<script>
//highlight and blur events when inputs are selected
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
    //when the form is submitted it checks to make sure required fields are there
    document.getElementById('mainForm').addEventListener("submit", function(e){
        e.preventDefault();
        var required = document.getElementsByClassName("required");
        var ready = true;
        for (i=0; i<required.length; i++) {
            if (required[i].value == ""){
               required[i].classList.add("error");
               required[i].addEventListener("input", function(){
                  this.classList.remove("error") ;
               });
               ready = false;
            } 
        }
            var pass1 = document.getElementById("pass1").value;
         var pass2 = document.getElementById("pass2").value;
         var match = false;
        if(pass1 === pass2){
             match = true;
         }
         else {match = false;}
         
         if (match == false){
                document.getElementById("pass1").classList.add("error");
                document.getElementById("pass2").classList.add("error");
                 ready = false;
                   document.getElementById('pass1').addEventListener("input", function(){
                   document.getElementById("pass1").classList.remove("error");
                   document.getElementById("pass2").classList.remove("error");
                });
         } 
        
        if (ready){
        $(this).unbind('submit').submit();}
        document.alert("Thanks for registering, please log in!");
        window.location.replace("login.php");
    });  
    
     document.getElementById("email").addEventListener("change", function(){
         var email = document.getElementById("email").value;
         var emailVal = false;
         var at = email.includes("@");
         var dot = email.includes(".");
         if(at == true && dot == true){
             emailVal = true;
         }
         else{
             emailVal = false;
         }
         if(emailVal == false){
             document.getElementById("email").ClassList.add("error");
             ready = false;
         }
         else{
                 this.classList.remove("error");
         }
     });
}
</script>
</body>
    
</html>