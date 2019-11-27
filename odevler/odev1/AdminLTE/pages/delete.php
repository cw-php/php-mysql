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


if(isset($_POST['id'])){

$id=$_POST['id'];
$sql="DELETE  from `texts` where `id`='$id'";
$result=mysqli_query($conn,$sql);
if($result){


    echo "<script>alert('Ugurlu')</script>";
}else{

    echo "<script>alert('Eror')</script>";
}





}




if(isset($_POST['id2'])){

    $id=$_POST['id2'];
    $sql="DELETE  from `images` where `id`='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
    
    
        echo "<script>alert('Ugurlu')</script>";
    }else{
    
        echo "<script>alert('Eror')</script>";
    }
    
    
    
    
    
    }


    if(isset($_POST['icon_id'])){

$icon_id=$_POST['icon_id'];
$sql="DELETE  from `icons` where `id`='$icon_id'";
    $result=mysqli_query($conn,$sql);
    if($result){
    
    
        echo "<script>alert('Ugurlu')</script>";
    }else{
    
        echo "<script>alert('Eror')</script>";
    }



    }


?>