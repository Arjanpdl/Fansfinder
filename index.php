<?php
    include('functions.php');
    include('showresult.php');
   
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
           
            if(isLoggedIns())
            {
           
               echo $_SESSION['username'];
               
              
            }
           
           
               ?></h3>
            <div class="container">
        
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu-active"><a href="index.php">Home</a></li>
                  <li><a href="index.php#about">About</a></li>
                  <li>
                    <div class="dropdown">
                      <a href="#recent-games" class="dropbtn">Games</a>
                      <div class="dropdown-content">
                        <a href="index.php#recent-games">Recent Games</a>
                        <a href="businessfile/games.php">All Games</a>
                        </div>
                        </div>
                    </li>
                  <li><a href="index.php#locations">Locations</a></li>
                  <li>
                      <div class="dropdown">
                          <a href="#recent-business" class="dropbtn">Businesses</a>
                          <div class="dropdown-content">
                            <a href="index.php#recent-business">Recent Business</a>
                            <a href="businessfile/businesspage.php">All Businesses</a>
                            </div>
                            </div>
                  </li>
                  <li>
                      <div class="dropdown">
                          <a href="index.php" class="dropbtn">Contact Us</a>
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
                 <?php if(!isLoggedIns())
            {
           
               echo '<div class="dropdown">
               <a href="index.php" class="dropbtn">Sign In/Up</a>
               <div class="dropdown-content">
                 <a href="login.php">Costumer</a>
                 <a href="businessfile/businesslogin.php">Business</a>
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
              <form method="POST" action="showresult.php" target="_blank">
              <div class="searchBox">

                <input class="searchInput" type="text" name="searchtext" placeholder="Search what you are looking for.">
                <button class="searchButton" name="sea">
                    <i class="material-icons">
                        Search
                    </i>
                </button>
            </div>
          </form>
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
                      <a class="nav-link" href="index.php#locations" role="tab" data-toggle="tab">Lousiana</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php#locations" role="tab" data-toggle="tab">Texas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php#locations" role="tab" data-toggle="tab">California</a>
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
          
                  <?php
                  //current URL of the Page. cart_update.php redirects back to this URL
                  
                  
                  

                  $query = "SELECT * FROM business_page ORDER BY id ASC";
                  $result = mysqli_query($db, $query); 
                
                  
                  if ($result) {
                    while($obj = $result->fetch_object())
                    {
                      echo '<div class="row1">';
                  echo '<ul class="bui-list">';
                    echo '<li>';
                           echo '<div class="col-lg-4 col-md-6">';
                             echo '<div class="rec-buis">';
                                echo '<div class="rec-buis-img">';
                      echo ' <img src="img/'.$obj->business_img_name.'" alt="image 6" class="img-fluid">';
                      echo '</div>';
                      
                      echo '<h1>'.$obj->business_name.'</h1>';
                      
                      // echo '<p>'.$obj->business_desc.'</p>';
                      echo '</div>';
                            echo '</div>';
                  echo '</li>';

                      // If you do not want this part, you can remove it.
                      // This code will generate the following page in next screen.
                      // If you want to keep it this way, you might have to work some more on database with classes
                      // because its a different class than business-info.
                      // I do not have much idea about this so i am leaving this upto you.
                     /* echo '<div class="business-info1">';
                      echo '<ul class="business-info-detail">';
                      echo '  <li>';
                      echo '<h1>'.$obj->business_name.'</h1>';
                      echo ' <p>807 Walters Street, Lake Charles, LA, USA</p>';
                      echo '<p>Plsiiasd kjhsduue isjd iusdsi ush  ish iuiudhf iue fhiusdhf iuehf fuehf iuhdf. Uefwieu udf jdf wue fdjf wuef djf uiehf jdf hwiuefh djf weuf. Pojuy hudy hhdyyeuusjjd hjd kjasjd kjshdhj, skhds, sjhdsjd, lieoej, and kljfuef. jkhaskdeuskaj akskdnef sjnf d skdfeuf kjdf ue djf ksdjfeu skdjfeuf d. S kjnd ed jdfnenu iowe djfneuf nosdnf dkfjeiskdjf skfefudnsdk dffwef.</p>';
                      echo '</li>';
                      echo ' <li>';
                      echo ' <img src="img/'.$obj->business_img_name.'" alt="image 6">';
                      echo '  </li>';
                      echo '</ul>';
                      echo '</div>'; */
                    }
                  }

                //  echo '<div class="row1">';
                //   echo '<ul class="bui-list">';
                //     echo '<li>';
                //            echo '<div class="col-lg-4 col-md-6">';
                //              echo '<div class="rec-buis">';
                //                 echo '<div class="rec-buis-img">';
                //                   echo '<img src="img/3.jpg" alt="rec-buis 1" class="img-fluid">';
                //                echo '</div>';
                //                echo '<h3><a href="businessfile/businesspage.php">American Bar and Pub</a></h3>';
                          
                //                echo '<p>2 miles from your location</p>';
                //               echo '</div>';
                //             echo '</div>';
                //   echo '</li>';

                
                  ?>
               
          
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
                    <form class="contact-form" method="POST">
                      <ul>
                        <li>
                          <label for="email">Email</label>
                          <input class="input100" type="email" name="emailcontact" id="name"></li>
                        <li>
                          <label for="question">Question</label>
                          <input class="input100" type="varchar" name="questioncontact" id="email"></li>
                          <li>
                            <button type="submit" name="submitcontact" id="submit">Send</button>
                          </li>
                    </form>
                    
                    <div class="contact-p">
                    <p>Or, you can send us email directly from your gmail just by <a href="mailto:fansfindergames@gmail.com" target="_top">Clicking Here</a>.</p>
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