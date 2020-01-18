<?php
    include('functions.php');
    
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

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
// if(!isset($_SESSION['access_token']))
// {
//  //Create a URL to obtain user authorization
//  header('location: login.php');
// }

    // if (!isLoggedIn()) {
    //     $_SESSION['msg'] = "You must log in first";
    //     header('location: login.php');
    // }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>

        
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <script src="main.js"></script>
        <style>
          .searchBox {
  position: absolute;
  top: 60%;
  left: 50%;
  transform:  translate(-50%,50%);
  background: #ff8800;
  height: 40px;
  border-radius: 40px;
  padding: 10px;

}

.searchBox:hover > .searchInput {
  width: 240px;
  padding: 0 6px;
}

.searchBox:hover > .searchButton {
background: white;
color : #000000;
}

.searchButton {
  color: rgb(255, 255, 255);
  float: right;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #000000;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.4s;
}

.searchInput {
  border:none;
  background: none;
  outline:none;
  float:left;
  padding: 0;
  color: rgb(0, 0, 0);
  font-size: 16px;
  transition: 0.4s;
  line-height: 40px;
  width: 0px;

}

@media screen and (max-width: 665px) {
.searchBox:hover > .searchInput {
  width: 150px;
  padding: 0 6px;
}
.searchBox {
  position: absolute;
  top: 70%;
  left: 50%;
  transform:  translate(-50%,50%);
  background: #ff8800;
  height: 40px;
  border-radius: 40px;
  padding: 10px;

}
}
</style>
    </head>
    <body>

      <!----------------------
         Top Menu bar section 
        ----------------------->

        <header id="header">
          <h3> <?php
            if($login_button == '')
            {
             $username=$fname.$lname;
             $password=md5($lname.$fname);
             $sql_email="SELECT * FROM users WHERE email='$email'";
             $res_email = mysqli_query($db,$sql_email);
             if(mysqli_num_rows($res_email)>0){
                 $update = "UPDATE users SET fname = '$fname', lname ='$lname',username='$username',email='$email',password='$password'
                  WHERE email='$email'";
                 mysqli_query($db, $update);
             }else{
                 $query = "INSERT INTO users (fname, lname, username, email, password)
                 VALUES('$fname','$lname','$username' ,'$email', '$password')";
             
                 mysqli_query($db, $query);
             }
             
             echo $_SESSION['user_first_name'].$_SESSION['user_last_name'];
            //  echo '<h3><a href="logout.php">Logout</h3></div>';
            }

            if(isLoggedIns())
            {
           
               echo $_SESSION['users'];
               
              
            }
           
           
               ?></h3>
            <div class="container">
        
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu-active"><a href="google.php">Home</a></li>
                  <li><a href="google.php#about">About</a></li>
                  <li>
                    <div class="dropdown">
                      <a href="#recent-games" class="dropbtn">Games</a>
                      <div class="dropdown-content">
                        <a href="google.php#recent-games">Recent Games</a>
                        <a href="businessfile/games.php">All Games</a>
                        </div>
                        </div>
                    </li>
                  <li><a href="google.php#locations">Locations</a></li>
                  <li>
                      <div class="dropdown">
                          <a href="recent-business" class="dropbtn">Businesses</a>
                          <div class="dropdown-content">
                            <a href="google.php#recent-business">Recent Business</a>
                            <a href="businessfile/businesspage.php">All Businesses</a>
                            </div>
                            </div>
                  </li>
                  <li>
                      <div class="dropdown">
                          <a href="google.php" class="dropbtn">Contact Us</a>
                          <div class="dropdown-content">
                            <a href="https://www.facebook.com/nischal.aryal007" target="_blank">Nischal Aryal</a>
                            <a href="https://www.facebook.com/ishan.parajuli.90" target="_blank">Ishan Parajuli</a>
                            <a href="https://www.facebook.com/arjan.poudel" target="_blank">Arjan Poudel</a>
                            <a href="https://www.facebook.com/coolmanxema" target="_blank">Rohan Shrestha</a>
                            <a href="https://www.facebook.com/alan.khadka.3" target="_blank">Alien Khadka</a>
                            <a href="https://www.facebook.com/romm.silwal" target="_blank">Romm Silwal</a>
                            <a href="https://www.facebook.com/aauxbjd" target="_blank">Ayush</a>
                            </div>
                            </div>
                  </li>
                  <li>
                 <?php if(!$login_button == '')
            {
           
               echo '<div class="dropdown">
               <a href="google.php" class="dropbtn">Sign In/Up</a>
               <div class="dropdown-content">
                 <a href="login.php">Costumer</a>
                 <a href="businesslogin.html">Business</a>
                 </div>
                 </div>';
               
            } else{
                echo '<div class="dropdown">
               <a href="logout.php" class="dropbtn">Logout</a>
               
                 </div>';
            }
            ?>
                      
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

          <!----------------------
             Top Container Section 
            ----------------------->

          <section id="intro">
            <div class="intro-container wow fadeIn">
              <h1 class="mb-4 pb-0">Sports Around The<br><span>World</span> In Your Pub</h1>
              <p class="mb-4 pb-0">Support them, cheer them and love them all together with other fans.</p>
              
              <div class="searchBox">

<input class="searchInput" type="text" name="searchtext" placeholder="Search what you are looking for.">
<button class="searchButton" href="#">
    <i class="material-icons">
        Search
    </i>
</button>
</div>
              
            </div>
          </section>

          <!---------------------
             Recent Games Section 
            ---------------------->

          <section id="recent-games" class="wow fadeInUp">
            <div class="container">
              <div class="section-header">
                <h2>Recent Games</h2>
                <p>Don't wait up because your team have started playing their game</p>
              </div>
      
              <div class="row">
                <!-- <div class="col-lg-4 col-md-6"> -->
                  
                  <ul class="recent-games-list">
                    <li>  
                  <div class="rec-game">
                    <img src="img/mannew.jpg" alt="rec-game 1" class="img-fluid">
                    <div class="details">
                      <h3><a href="businessfile/games.php">Manchester United vs Newcastle United</a></h3>
                      
                      <div class="game-small-info">
                          <p>12:30 PM</p>
                          <p>American Bar</p>
                          
                      </div>
                    </div>
                  </div>
                  </li>
                <!-- </div> -->
                
                <li>
                <!-- <div class="col-lg-4 col-md-6"> -->
                  <div class="rec-game">
                    <img src="img/cowgia.jpg" alt="rec-game 2" class="img-fluid">
                    <div class="details">
                      <h3><a href="businessfile/games.php">Dallas Cowboys vs New York Giants</a></h3>
                      
                      <div class="game-small-info">
                          <p>1:30 PM</p>
                          <p>American Bar</p>
                      </div>
                    </div>
                  </div>
                  </li>
                <!-- </div> -->
                <li>
                
                <!-- <div class="col-lg-4 col-md-6"> -->
                  <div class="rec-game">
                    <img src="img/piswiz.jpg" alt="rec-game 3" class="img-fluid">
                    <div class="details">
                      <h3><a href="businessfile/games.php">Piston vs Wizard</a></h3>
                      
                      <div class="game-small-info">
                          <p>1:30 PM</p>
                          <p>American Bar</p>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
                </li>
                </ul>
                
                
              </div>
            </div>
      
          </section>


          <!-- Location section
          ---------------------->

          <section id="locations" class="section-with-bg">
              <div class="container wow fadeInUp">
                <div class="section-header">
                  <h2>Locations</h2>
                  <p>Locations we serve</p>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" href="google.php#locations" role="tab" data-toggle="tab">Lousiana</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="google.php#locations" role="tab" data-toggle="tab">Texas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="google.php#locations" role="tab" data-toggle="tab">California</a>
                    </li>
                  </ul>
                </div>
                <ul class="loc-img">
                <li><img src="img/usa1.gif" alt="USAGIF"></li>
                </ul>

                <!-- <video controls width="1000px" height="500px" loop autoplay>
                    <source src="./img/usa1.gif" type="video/mp4" type="video/mp4">
                  </video> -->
                      
                
              </section>



              <!-- Business section
              ------------------------- -->
              <section id="recent-business" class="section-with-bg wow fadeInUp">

                <div class="container">
                  <div class="section-header">
                    <h2>Businesses</h2>
                    <p>Here are some of our recently partnered businesses</p>
                  </div>
          
                  <div class="row1">
          <ul class="bui-list">
            <li>
                    <div class="col-lg-4 col-md-6">
                      <div class="rec-buis">
                        <div class="rec-buis-img">
                          <img src="img/3.jpg" alt="rec-buis 1" class="img-fluid">
                        </div>
                        <h3><a href="businessfile/businesspage.php">American Bar and Pub</a></h3>
                  
                        <p>2 miles from your location</p>
                      </div>
                    </div>
          </li>
          <li>
                    <div class="col-lg-4 col-md-6">
                      <div class="rec-buis">
                        <div class="rec-buis-img">
                          <img src="img/4.jpg" alt="rec-buis 2" class="img-fluid">
                        </div>
                        <h3><a href="businessfile/businesspage.php">British Pub and Bar</a></h3>
                        
                        <p>0.5 Miles from your location</p>
                      </div>
                    </div>
          </li>
          <li>
                    <div class="col-lg-4 col-md-6">
                      <div class="rec-buis">
                        <div class="rec-buis-img">
                          <img src="img/5.jpg" alt="rec-buis 3" class="img-fluid">
                        </div>
                        <h3><a href="businessfile/businesspage.php">Nepali Bhatti</a></h3>
                        
                        <p>0.6 Mile from your location</p>
                      </div>
                    </div>
          </li>
          </ul>
                  </div>
                </div>
          
              </section>

              <!-- About us section
              ---------------------->

              <section id="about">
                <!-- <div class="container"> -->
                  <div class="section-header">
                    <h2>About Us</h2>
                    <p>Developers</p>
                  </div>
                    <div class="about-para">
                      <ul>
                        <li><img src="img/nischal.jpg" alt="nischal">
                            <p>Nischal Aryal</p>
                            <p>Project Manager</p></li>
                        <li><img src="img/ishan.jpg" alt="ishan">
                            <p>Ishan Parajuli</p>
                            <p>Lead Front End Designer</p></li>
                        <li><img src="img/arjan.jpg" alt="arjan">
                            <p>Arjan Poudel</p>
                            <p>Lead Back End Designer</p></li>
                        <li><img src="img/alan.jpg" alt="alan">
                          <p>Alan Khadka</p>
                          <p>Front End Designer</p></li>
                        <li><img src="img/ayush.jpg" alt="ayush">
                          <p>Ayush</p>
                          <p>Front End Designer</p></li>
                        <li><img src="img/rohan.jpg" alt="rohan">
                          <p>Rohan Shrestha</p>
                          <p>Back End Designer</p></li>
                        <li><img src="img/romm.jpg" alt="romm">
                          <p>Romm Silwal</p>
                          <p>Content Creator</p></li>
                      </ul>
                    <!-- </div> -->
                  
          
                </div>
              </section>


              <!-- Contact content -->
              <section>
                <div class="bg-grey">
                    <div class="section-header">
                        <h2>Contact Us</h2>
                        <p>Any Questions, Comments or Concerns? Hit us up here...</p>
                    </div>
                    <form class="contact-form">
                      <ul>
                        <li>
                          <label for="name">Name</label>
                          <input class="input100" type="text" name="name" id="name"></li>
                        <li>
                          <label for="email">E-Mail</label>
                          <input class="input100" type="email" name="email" id="email"></li>
                          <li>
                            <button type="submit" name="submit" id="submit">Send</button>
                          </li>
                    </form>
                    
                    <div class="contact-p">
                    <p>Or, you can send us email directly from your gmail just by <a href="google.php">Clicking Here</a>.</p>
                    </div>
                    
                </div>
              </section>

              <!-- Footer section -->
              <section class="footer">
                <ul>
                  <li>
                  <p>4205 Ryan Street,</p>
                  <p>Lake Charkes, LA, 70605, USA</p>
                </li>
                <li>
                  <p>McNeese State University</p>
                </li>
                </ul>
                <div class="last-line">
                <hr>
                </div>
                <p>*This website is created for class project. Some content used in this website may not be owned by the website designer, instructor or university.</p>
              </section>


              <script src="index.js"></script>
    </body>
</html>