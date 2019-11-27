<?php
function dbconnect(){

    $sql=mysqli_connect("localhost","root","","admin_panel");
  
    if($sql){
  
        return $sql;
    }else{
  
        return false;
    }
  
  }
$conn=dbconnect();
  $query_select = "SELECT * FROM `images`";
$result_select = mysqli_query($conn,$query_select) or die(mysql_error());
$rows = array();
while($row = mysqli_fetch_array($result_select))

    $rows[] = $row['images_name'];
     print_r($rows);
    
















?>