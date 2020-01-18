<?php

$login_button = '';

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
   $fname=$_SESSION['user_first_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
   $lname=$_SESSION['user_last_name'];
  }
  
  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
   $email=$_SESSION['user_email_address'];
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
if($login_button == '')
{
$username=$fname.$lname;
   
    $password=md5($lname.$fname);
    $sql_email="SELECT * FROM users WHERE email='$email'";
    $res_email = mysqli_query($db,$sql_email);
    if(mysqli_num_rows($res_email)>0){
        $update = "UPDATE users SET fname = '$fname', lname ='$lname',username='$username',email='$email',password='$password'
         WHERE email='$email'";
          $_SESSION['user_google'] = $username;
        mysqli_query($db, $update);
    }else{
        $query = "INSERT INTO users (fname, lname, username, email, password)
        VALUES('$fname','$lname','$username' ,'$email', '$password')";
        mysqli_query($db, $query);
    }
}

function isLoggedIn()
	{
		if (isset($_SESSION['user_google'])) {
			return true;
		}else{
			return false;
		}
	}
    
?>
