<?php


$conn = mysqli_connect('localhost','root','','test');

$name = $_POST['d_name'];
$age = $_POST['d_age'];
$phone = $_POST['d_phone'];

$sql = "INSERT into student(name,age,phone)VALUES('$name','$age','$phone')";
$query = mysqli_query($conn,$sql);

$output =array();
 if($query)
 {   
     $sql_select = "SELECT * FROM student";
     $sel_query =  mysqli_query($conn,$sql_select);
     while($row = mysqli_fetch_array($sel_query))
     {
        $output[] = $row;
     }
     echo json_encode($output);
    //  echo json_encode("Data Inserted Successfully");
 }
 else
 {
    echo json_encode("Error in the code");
 }
////////////////////')

?>