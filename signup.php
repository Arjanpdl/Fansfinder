<?php 
include('functions.php');

//Include Configuration File


$login_button = '';
$login_button = $google_client->createAuthUrl();

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
if(array_key_exists('GOOGLE', $_POST)) { 
    button1(); 
} 
//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
// if(!isset($_SESSION['access_token']))
// {
//  //Create a URL to obtain user authorization
//  $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="icon-google.png"  class="fa fa-facebook-official"/></a>';
// }

?>



<!-- Main page for sign up page can be found here written in HTML with bootstrap classes -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- This is the title of the page -->
    <title>Sign Up</title>
    <!-- This meta tag replace the existing character sets with its standard UTF -->
    <meta charset="UTF-8">
    <!-- This meta tag gives information to the browser about how the scaling should be done -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style sheet used in this page. You can find them in the our project folder -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style>
        .error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
  text-align: left;
}
</style>
    
</head>
<!-- Here is our main sign up page body begins. All the frontend is here -->
<body>
<header id="header">
          
          <div class="container">
      
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <li class="menu-active"><a href="index.php">Home</a></li>
                
                <li>
                    <div class="dropdown">
                        <a href="login.html" class="dropbtn">Sign In/Up</a>
                        <div class="dropdown-content">
                          <a href="login.html">Costumer</a>
                          <a href="businessfile/businesslogin.php">Business</a>
                          </div>
                          </div>
                </li>
                <!-- <li class="buy-tickets"><a href="#buy-tickets">Buy Tickets</a></li> -->
              <!-- <li> -->
                
              <!-- </li> -->
              </ul>
              
            </nav>
            <div class="mob-nav">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
            </div>
          </div>
          
        </header>
	<!-- This div here controls the whole page >>main.css -->
        <div class="limiter">
            <div class="container-login100"> <!-- This controls the background and scaling of the sign in and sign up page >>main.css-->
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33"> <!-- This is a login box >>main.css -->
                    <form method="post" class="login100-form validate-form flex-sb flex-w" action="signup.php"> <!-- This is for the form itself >>main.css -->
                        <span class="login100-form-title p-b-53"> <!-- Title of the form >>main.css -->
                            Sign Up
                        </span>
    
                        <!-- Facebook and Google link button -->
                        <!-- <a href="#" class="btn-face m-b-20">
                            <i class="fa fa-facebook-official"></i>
                            Facebook
                        </a> -->
                        
                        <input type="button"  class="btn-google m-b-20" onclick="window.location = '<?php echo $login_button ?>';" value="" name="">
                           
                             
                        <!-- Field lables and input contents -->
                        
                        <?php echo display_error(); ?> <!--  I need CSS for Error Display-->
                        
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                First Name
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "First Name is required">
                            <input class="input100" type="text" name="fname" value="<?php echo $fname; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Last Name
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Last Name is required">
                            <input class="input100" type="text" name="lname" value="<?php echo $lname; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                UserName
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" value="<?php echo $username; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                E-Mail
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "E-Mail is required">
                            <input class="input100" type="text" name="email" value="<?php echo $email; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pass">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Confirm Password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Confirm your Password">
                            <input class="input100" type="password" name="cpass">
                            <span class="focus-input100"></span>
                        </div>
    
                        <!-- Sign up button link -->
                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn" type="submit" name="signup_btn">
                                Sign Up
                            </button>
                        </div>
    
                        
                    </form>
                </div>
            </div>
        </div>
</body>
</html>