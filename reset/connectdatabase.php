 <?php
 $con = mysqli_connect('localhost', 'root', '', 'Bargames');

 if(mysqli_connect_errno()){
     echo "Failed to connect:" . mysqli_connect_errno();
 }
?>