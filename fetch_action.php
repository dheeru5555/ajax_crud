<?php


$conn = mysqli_connect('localhost','root','','test');


 $sql_select = "SELECT * FROM student";
 $sel_query =  mysqli_query($conn,$sql_select);

 $output =array();

 while($row = mysqli_fetch_array($sel_query))
  {
    $output[] = $row;
  }
     echo json_encode($output);

?>