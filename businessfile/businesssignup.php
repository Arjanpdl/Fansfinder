<?php include('../functions.php'); ?>


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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">

</head>
<!-- Here is our main sign up page body begins. All the frontend is here -->
<body>

    <header id="header">
          
        <div class="container">
    
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="index.html">Home</a></li>
              
              <li>
                  <div class="dropdown">
                      <a href="#" class="dropbtn">Sign In/Up</a>
                      <div class="dropdown-content">
                        <a href="login.html">Costumer</a>
                        <a href="businesslogin.html">Business</a>
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
        
      </header><!-- #header -->
	<!-- This div here controls the whole page >>main.css -->
        <div class="limiter">
            <div class="container-login100"> <!-- This controls the background and scaling of the sign in and sign up page >>main.css-->
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33"> <!-- This is a login box >>main.css -->
                <form method="post" class="login100-form validate-form flex-sb flex-w" action="businesssignup.php">
                        <span class="login100-form-title p-b-53"> <!-- Title of the form >>main.css -->
                            Sign Up
                        </span>
    
                        <!-- Facebook and Google link button -->
                        <!-- <a href="#" class="btn-face m-b-20">
                            <i class="fa fa-facebook-official"></i>
                            Facebook
                        </a> -->
    
                        <a href="#" class="btn-google m-b-20">
                            <!-- <img src="img/icon-google.png" alt="GOOGLE"> -->
                            
                        </a>

                        <!-- Field lables and input contents -->
                        
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Business Name
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Business Name is required">
                            <input class="input100" type="text" name="bussname">
                            <span class="focus-input100"></span>
                        </div>
                        <!-- <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Last Name
                            </span>
                        </div> -->
                        <!-- <div class="wrap-input100 validate-input" data-validate = "Last Name is required">
                            <input class="input100" type="text" name="lname">
                            <span class="focus-input100"></span>
                        </div> -->
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Business UserName
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Business Username is required">
                            <input class="input100" type="text" name="bussusername" value="<?php echo $bussusername; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                E-Mail
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "E-Mail is required">
                            <input class="input100" type="text" name="bussemail" value="<?php echo $bussemail; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Location
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate = "Where is your Business?">
                                <input class="input100" type="text" name="busslocation" value="<?php echo $busslocation; ?>">
                                <span class="focus-input100"></span>
                            </div>
                            <div class="p-t-13 p-b-9">
                                    <span class="txt1">
                                        Business Registration Number
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Enter your registration number">
                                    <input class="input100" type="text" name="bussregnum" value="<?php echo $bussregnum; ?>">
                                    <span class="focus-input100"></span>
                                </div>
                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="busspass" value="<?php echo $busspass; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Confirm Password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Confirm your Password">
                            <input class="input100" type="password" name="busscpass" value="<?php echo $busscpass; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="p-t-13 p-b-9">
                                <span class="txt1">
                                    Image
                                </span>
                            </div>
                            <div class="Neon Neon-theme-dragdropbox">
                                    <input style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" name="files[]" id="filer_input2" multiple="multiple" type="file">
                                    <div class="Neon-input-dragDrop"><div class="Neon-input-inner"><div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div><div class="Neon-input-text"><h3>Drag&amp;Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="Neon-input-choose-btn blue">Browse Files</a></div></div>
                                    </div>
    
                        <!-- Sign up button link -->
                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn" type="submit" name="busssignup_btn">
                                Sign Up
                            </button>
                        </div>
    
                        
                    </form>
                </div>
            </div>
        </div>
        <script src="index.js"></script>
</body>
</html>