<?php include('connect.php');
include('../functions.php');?>

<!DOCTYPE html>
<html>
    <head>
        <title><h1>Games</h1></title>
        <link rel="stylesheet" type="text/css" href="..css/style.css">
        <link rel="stylesheet" type="text/css" href="..css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/main-again.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        
    </head>
    <body>
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
               <a href="games.php" class="dropbtn">Sign In/Up</a>
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
                      
                    </header>

                    <section id="recent-business" class="section-with-bg wow fadeInUp">

                            <div class="container">
                              <div class="section-header">
                                <h2>Games Starting soon in your pub</h2>
                                
                              </div>

                    <?php
                      //current URL of the Page. cart_update.php redirects back to this URL
                              
                        $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                        $db = mysqli_connect('localhost', 'root', '', 'Bargames');
            
                        $query = "SELECT * FROM games ORDER BY date ASC";
                        $result = mysqli_query($db, $query); 

                        if ($result) {
                            while($obj = $result->fetch_object())
                            {
                      
                                echo '<div class="business-info">';
                                echo '<ul class="business-info-detail">';
                                echo '<li>';
                                // echo '<div class="col-lg-4 col-md-6">';
                                // echo '<div class="rec-buis">';
                                // echo '<div class="rec-buis-img">';
                                echo '<img src="../img/'.$obj->img.'" alt="rec-buis 1" class="img-fluid">';
                                echo '<li>';
                                echo '<li>';
                                echo '<h3><a href="games.php"><h1>'.$obj->title.'</h1></a></h3>';
                                echo '<p>Day: '.$obj->date.'</p>';
                                echo '<p>Time:'.$obj->Time.'</p>';
                                echo '<p>Location: '.$obj->Location.'</p>';
                                echo '</li>';
                                echo '</div>';
                                
                            }
                        }

                        ?>
                            <!-- <li>
                                        <div class="col-lg-4 col-md-6">
                                        <div class="rec-buis">
                                            <div class="rec-buis-img">
                                            <img src="img/football.jpg" alt="rec-buis 2" class="img-fluid">
                                            </div>
                                            <h3><a href="games.php">Red Hut VS Crying Eagle</a></h3>
                                            <p>Day: Today</p>
                                            <p>Time: 2:30 PM</p>
                                            <p>Location: New Mexico, Vallery Port Stadium</p>
                                        </div>
                                        </div>
                            </li>
                            <li>
                                        <div class="col-lg-4 col-md-6">
                                        <div class="rec-buis">
                                            <div class="rec-buis-img">
                                            <img src="img/football.jpg" alt="rec-buis 3" class="img-fluid">
                                            </div>
                                            <h3><a href="games.php">Bulls VS Spinner</a></h3>
                                            <p>Day: Tommorow</p>
                                            <p>Time: 7:30 PM</p>
                                            <p>Location: Dallas, Toronto Stadium</p>
                                        </div>
                                        </div>
                            </li>
                            </ul>

                            <ul class="bui-list">
                                    <li>
                                            <div class="col-lg-4 col-md-6">
                                            <div class="rec-buis">
                                                <div class="rec-buis-img">
                                                <img src="img/mannew.jpg" alt="rec-buis 1" class="img-fluid">
                                                </div>
                                                <h3><a href="games.php">Manchester United VS Newcastle United</a></h3>
                                                <p>Day: Tomorrow</p>
                                                <p>Time: 10:30 AM</p>
                                                <p>Location: Lake Charkes, Lagrange Stadium</p>
                                                
                                            </div>
                                            </div>
                                </li>
                                <li>
                                            <div class="col-lg-4 col-md-6">
                                            <div class="rec-buis">
                                                <div class="rec-buis-img">
                                                <img src="img/cowgia.jpg" alt="rec-buis 2" class="img-fluid">
                                                </div>
                                                <h3><a href="games.php">Dallas Cowboys VS New York</a></h3>
                                                <p>Day: Tomorrow</p>
                                                <p>Time: 5:30 PM</p>
                                                <p>Location: New Mexico, David Stadium</p>
                                            </div>
                                            </div>
                                </li>
                                <li>
                                            <div class="col-lg-4 col-md-6">
                                            <div class="rec-buis">
                                                <div class="rec-buis-img">
                                                <img src="img/piswiz.jpg" alt="rec-buis 3" class="img-fluid">
                                                </div>
                                                <h3><a href="games.php">Piston VS Wizard</a></h3>
                                                <p>Day: Tommorow</p>
                                                <p>Time: 9:30 PM</p>
                                                <p>Location: Houston, Houston Stadium</p>
                                            </div>
                                            </div>
                                </li>
                                </ul>
-->
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
            
    </body>
</html>