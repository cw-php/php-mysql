<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <title>Login</title>
</head>
<style>

body{

    background-image:url('resimler/11.jpg');
    background-repeat: no-repeat;


}

.zz {

    margin-top:200px;
    background-color:#d4c8c6;
    opacity:0.8;
    width:500px;
    margin-left:auto;
    margin-right:auto;
    height:300px;
}

.input {

    width:300px;
    height:40px;
    border-radius:10px;
}

.admin_panel{

    padding:20px;
    font-size:30px;
}

.button{

    width:80px;
    height:40px;
}




</style>
<body>
    

<div class="container-fluid">
    <div class="row">
    
    <div  class="col-12 text-center">

<div class="zz">
        <form action="" method="post">
        
        <p class='admin_panel'>Admin Login Panel</p>

        <input class='input' type='text' name='username' placeholder='Username....' autocomplete='off'><br>
        <input class='input' type='password' name='parola' placeholder='Password....' autocomplete='off'><br>
        <input class='button' type='submit' value='Giriş Yap'>


        
        
        </form> 
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
        global $conn;


if (isset($_POST['username']) || isset($_POST['parola'])){

$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
$parola=htmlspecialchars($_POST['parola'],ENT_QUOTES);


if (empty($username) || empty($parola)){

    echo "Username ve ya Parola boş olamaz";

}else{

$username = mysqli_real_escape_string($conn,$_POST['username']);
$parola = mysqli_real_escape_string($conn,$_POST['parola']);



    $sql="SELECT * FROM `users` where `k_adi`='$username'";
    $conn=dbconnect();
    
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);

    if($count>0){

        $sql2="SELECT `password` from `users` where `k_adi`='$username'";
        $result2=mysqli_query($conn,$sql2);
        while($cek=mysqli_fetch_array($result2)){

                $db_password=$cek['password'];
                
                

        }
        
        
            if(password_verify($parola,$db_password)){

                $rutbe_sql="SELECT `rutbe` from `users` Where `k_adi`='$username'";
                $rutbe_result=mysqli_query($conn,$rutbe_sql);
                while($rutbe_cek=mysqli_fetch_array($rutbe_result)){

                    $rutbe= $rutbe_cek['rutbe'];
                    
                    
    
            }

                    $_SESSION['oturum']=true;
                    $_SESSION['username']=$username;
                    $_SESSION['rutbe'] = $rutbe;
                    header("Location:AdminLTE/index.php"); 
                    
                    

            }else{

            echo "Hatalı Username ve ya Parola";
            }



    }


    }

    }else{

        echo "Username ve ya Parola yanlış";
    }











?>
        </div>
   
    </div>

    
    </div>
</div>




</body>
</html>


