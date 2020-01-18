<?php

include("connectdatabase.php");

if(!(isset($_GET["code"]))){
    exit("We cannot find page Please try again");
}
$errors   = array(); 
$code = $_GET["code"];
$getEmailQuery = mysqli_query($con,"SELECT email FROM resetPasswords WHERE code ='$code'");
if(mysqli_num_rows($getEmailQuery)==0)
{
    exit("We cannot find Page");
}      

if(isset($_POST["pass_1"])){
    $pw = $_POST["pass_1"];
    $pw1 = $_POST["cpass_1"];

    if (empty($pw)) { 
        array_push($errors, "Password field is empty"); 
    }
    if (strlen($pw) <= '8') {
        array_push($errors, "Password should be at least 8 charcter");
    }
    if(!preg_match("#[0-9]+#",$pw)) {
        array_push($errors, "Password should have at least one number");
    }
    if(!preg_match("#[A-Z]+#",$pw)) {
        array_push($errors, "Password should have at least one Uppercase letter");
    }
    if(!preg_match("#[a-z]+#",$pw)) {
        array_push($errors, "Password should have at least one lowercase letter");
    }

    if ($pw != $pw1) {
        array_push($errors, "Password conformation mistake");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($pw);

        $row = mysqli_fetch_array($getEmailQuery);
        $email = $row["email"];

        $query = mysqli_query($con, "UPDATE users SET password='$password' WHERE email ='$email'");
        if($query){
            
            $querys= mysqli_query($con, "DELETE FROM `resetPasswords` WHERE `resetPasswords`.`code` = '$code';");
            echo '<h3 style="background-color:white;color:blue;text-align:center;">Password has been Updated</h3>';
            
        }else{
            exit("Password Update failed");
        }
    }

}
    

function display_error() {
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">'; // Make css for error from this class
            foreach ($errors as $error){
                echo $error .'<br>';
            }
        echo '</div>';
    }
}    

        
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <link rel="stylesheet" href="forgetpass.css">
        <link rel="stylesheet" href="../css/main.css">
    </head>

    <body>
            <div class="limiter">
                    <div class="container-login100" style="background-color: rgb(255, 255, 255);">
                        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

                                <form method="POST" class="forgot-form">
                                    <?php
                                     echo display_error(); 

                                    ?>
                                    <p>Password:</p>
                                    <div class="wrap-input100 validate-input">
                                        <input class="input100" type="password" name="pass_1" value="">
                                    </div>
                                    <p>Confirm Password:</p>
                                    <div class="wrap-input100 validate-input">
                                        <input class="input100" type="password" name="cpass_1" value="">
                                    </div>
                                    <a href="../login.php" class="txt2 bo1 m-l-5">
                                <strong>Login Back</strong>
                                  </a>
                                  <br>
                                    <input class="reset-button" type="submit" value="Update Password" name="resetemailsubmit">
                            </form>
                        </div>
                    </div>
            </div>
    </body>
</html>