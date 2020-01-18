<?php include('connect.php');
include('../functions.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>


        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/index.scss">
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    </head>
    <body>

      <!----------------------
         Top Menu bar section 
        ----------------------->

        <header id="header">
            <h3><?php
           
           if(isLoggedIns())
           {
          
              echo $_SESSION['username'];
              
             
           }
          
          
              ?></h3>
              <div class="container">
          
                <nav id="nav-menu-container">
                  <ul class="nav-menu">
                    <li class="menu-active"><a href="../index.php">Home</a></li>
                    <li><a href="../index.php#about">About</a></li>
                    <li>
                      <div class="dropdown">
                        <a href="#recent-games" class="dropbtn">Games</a>
                        <div class="dropdown-content">
                          <a href="../index.php#recent-games">Recent Games</a>
                          <a href="games.php">All Games</a>
                          </div>
                          </div>
                      </li>
                    <li><a href="../index.php#locations">Locations</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="recent-business" class="dropbtn">Businesses</a>
                            <div class="dropdown-content">
                              <a href="../index.php#recent-business">Recent Business</a>
                              <a href="businesspage.php">All Businesses</a>
                              </div>
                              </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="../index.php" class="dropbtn">Contact Us</a>
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
               <a href="businesspage.php" class="dropbtn">Sign In/Up</a>
               <div class="dropdown-content">
                 <a href="login.php">Costumer</a>
                 <a href="businesslogin.php">Business</a>
                 </div>
                 </div>';
               
            } else{
                echo '<div class="dropdown">
               <a href="../logout.php" class="dropbtn">Logout</a>
               
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

          <section id="locations" class="section-with-bg">
                <div class="container wow fadeInUp">
                  <div class="section-header">
                    <h2>Business</h2>
                    <p>Find which business is near you...</p>
                  </div>
              
  
                <?php
                  //current URL of the Page. cart_update.php redirects back to this URL
                  
                  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                  $db = mysqli_connect('localhost', 'root', '', 'Bargames');

                  $query = "SELECT * FROM business_page ORDER BY id ASC";
                  $result = mysqli_query($db, $query); 
                
                  
                  if ($result) {
                    while($obj = $result->fetch_object())
                    {
                      echo '<div class="business-info">';
                      echo '<ul class="business-info-detail">';
                      echo ' <li>';
                      echo ' <img src="../img/'.$obj->business_img_name.'" alt="image 6">';
                      echo '  </li>';
                      echo '  <li>';
                      echo '<h1>'.$obj->business_name.'</h1>';
                      echo ' <p>'.$obj->business_address.'</p>';
                      echo '<p>'.$obj->business_desc.'</p>';
                      echo '</li>';
                      echo '</ul>';
                      echo '</div>';

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
                  ?>
                      </div>
                    
                    </div>
        </section>
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
               
                
