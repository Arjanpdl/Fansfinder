<?php
$connec = mysqli_connect('localhost', 'root', '', 'Bargames');
//search code
//error_reporting(0);
if(isset($_POST['sea'])){
$name = $_POST['searchtext'];

if(empty($name)){
	$make = '<h4>You must type a word to search!</h4>';
}else{
	$make = '<h4>No match found!</h4>';
  $sele = "SELECT * FROM games WHERE title LIKE '%$name%'";
  $seles = "SELECT * FROM business_page WHERE business_name LIKE '%$name%'";

    $result = mysqli_query($connec,$sele);
    $results = mysqli_query($connec,$seles);
    echo ' <h1><center>Search Result</center></h1> ';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    if ($result) {
        while($obj = $result->fetch_object())
        {
          
          echo '<div class="business-info">';
          echo '<ul class="business-info-detail">';
          
          
          echo ' <li>';
          echo ' <img src="img/'.$obj->img.'" alt="image 6">';
          echo '  </li>';
          echo '  <li>';
          echo '<h1>'.$obj->title.'</h1>';
          echo '<p>'.$obj->date.'</p>';
          echo '<p>'.$obj->Time.'</p>';
          echo '<p>'.$obj->Location.'</p>';
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
      if ($results) {
        while($obj = $results->fetch_object())
        {
          
          echo '<div class="business-info">';
          echo '<ul class="business-info-detail">';
          
          
          echo ' <li>';
          echo ' <img src="img/'.$obj->business_img_name.'" alt="image 6">';
          echo '  </li>';
          echo '  <li>';
          echo '<h1>'.$obj->business_name.'</h1>';
          echo '<h1>'.$obj->business_address.'</h1>';
          echo '<p>'.$obj->business_desc.'</p>';
          // echo '<p>'.$obj->Time.'</p>';
          // echo '<p>'.$obj->Location.'</p>';
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
	
// 	if($mak = mysqli_num_rows($result) > 0){
// 		while($row = mysqli_fetch_assoc($result)){
//         // echo ' <img src="img/'.$row['img'];
// 		echo '<h4> Id						: '.$row['id'];
//         echo '<br>Title						: '.$row['title'];
//         echo '<br>Date						: '.$row['date'];
//         echo '<br>Time					: '.$row['Time'];
//         echo '<br>Location					: '.$row['Location'];
// 		echo '</h4>';
// 	}
else{
echo'<h2> Search Result</h2>';

print ($make);
}
mysqli_free_result($result);
mysqli_close($connec);
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Result</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <style>
          body{
      
          }
        </style>
    <script src='main.js'></script>
</head>
<body>

</body>
</html>
