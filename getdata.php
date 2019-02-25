<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
      echo 'Connected failure<br>';
   }
   mysqli_select_db( $conn,'users_data' );

   $sql = "SELECT * FROM newtable";
   $resultJ = array();

   if ($result=mysqli_query($conn,$sql))
     {

     while($row = mysqli_fetch_assoc($result)) {
       array_push($resultJ,array(
         'TIME'=>$row['TIME'],
         'FINALDAYSTEPS'=>$row['FINALDAYSTEPS'],
         'FINAL_VALUE'=>$row['FINAL_VALUE'],
         'DATE'=>$row['DATE']
       ));



       #echo "ONE: " . $row["ONE"]. "<br>";
       #echo "TWO: " . $row["TWO"]. "<br>";
     }
     echo json_encode(array('result'=>$resultJ));
   }

   else{

     echo 'No Data';

   }

  mysqli_close($conn);

?>
