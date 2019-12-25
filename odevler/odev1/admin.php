<?php
session_start();
if (!$_SESSION['username']=='admin'){

    header("Location:index.php");

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <title>Admin Panel</title>
</head>
<style>
    *{

        margin: 0px;
        padding:0px;
    }
    body {
        font-family: "Lato", sans-serif;
    }
    
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #314450;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
        transition: 0.3s;
       
    }
    
    .sidenav a:hover {
        color: #f1f1f1;
    }
    
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
    
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
        .sidenav a {
            font-size: 18px;
        }
    }

    .a-tag{
        background-color:#314450;
        margin-top:10px;

    }

    .a-tag:hover{

        background-color:#86959f;
    }

    #top-menu{

        background-color:#6fb3df;
    }



    .logout{
       color:white;
       
       padding:0px;
       margin-top:10px;
       cursor:pointer;
       text-decoration: none;
      
    }
    .logout:hover{

        color:black;
        text-decoration: none;
    }

    .admin{
        color:white;
       margin-right:20px;
    
       padding:0px;
       margin-top:10px;
       
       cursor:pointer;
       text-decoration: none;

    }
    .top{

        background-color:#314450;
        width:100%;
        height:14px;
       
    }

    #users-sayi{

        background-color: #b2b4b6;
       width:40%;
        height:60px; 
        margin-top:10px;
        border-style:solid;
        margin-left:236px;
    }
    #users-sayi p{

        padding:10px;
        font-size:20px;
        
    }
    .shows{

        width:90px;
        height:30px;
        background-color:#72777b;
        border-width:0px;
        float:right;
        margin-top:0px;
        margin-right:4px;
        position:absolute;
    }

    .kullanici-show{

        display:none;
    }

.ekle-btn{

    width:90px;
        height:30px;
        background-color:#72777b;
        border-width:0px;
        margin-left:30px;
}

#user-ekle{

    background-color:red;
    margin-top:100px;
}

.aa{

    margin-left:auto;
    margin-right:auto;
    margin-top:100px;
    display:none;
}

.inputs {

    width:300px;
    height:30px;
    margin-top:10px;
    
}

.input-error{

    color:red;
    display:inline-block;
    margin-top:100px;
  margin-left:250px;
  font-size:20px;
}

.input-success{

color:red;
display:inline-block;
margin-top:100px;
margin-left:250px;
font-size:20px;
}
.kullanici-ekle-btn{

    width:80px;
    height:40px;
    margin-top:10px;
    border-radius:5px;
    border-width:0px;
}



 
</style>

<body>
<div class="top"></div>
    <div class="container-fluid">
        <div class="row">

            

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a class='a-tag' href="img_edit.php">Images</a>
                <a class='a-tag' href="#">Texts</a>
                
                <a class='a-tag' href="#">Contact</a>
            </div>

            <div class="col-10" id='top-menu'>
           <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
            </div>
            <div class="col-2"  id='top-menu'>
                    <a class='admin' href='test2.php'><?php  echo $_SESSION['username']; ?></a>
                    <a class='logout' href='exit.php'>Logout</a>
            </div>


           
<div class='col-12' id="users-sayi">

        <p>Kullanıcı sayı : <?php echo k_sayisi(); ?> </p>
        <p class='kullanici-show'>Kullanıcılar : <?php if($_SESSION['rutbe']=='admin'){echo kullanicilar();}else{echo "Bu yetkiye sahip değilsiniz!";} ?>  
        
        <?php if($_SESSION['rutbe']=='admin'){ echo "<button class='ekle-btn'>Ekle</button>"; }?>
        </p>
        <button class='shows'>Göster</button>

        
</div>



<div class="aa">
    <form action="" method="post">
<input class='inputs' type='text' placeholder='Adı' autocomplete='off' name='ad'><br>
<input class='inputs' type='text' placeholder='Soyadı' autocomplete='off' name='soyad'><br>
<input class='inputs' type='text' placeholder='Kullanıcı adı' autocomplete='off' name='k_adi'><br>
<input class='inputs' type='email' placeholder='Email' autocomplete='off' name='email'><br>
<input class='inputs' type='password' placeholder='Password' autocomplete='off' name='password'><br>
<input class='inputs' type='password' placeholder='Confirm Password' autocomplete='off' name='confirm_password'><br>
<select name="rutbe">
<option value="admin">Admin</option>
<option value="user">User</option>
</select>
<button class='kullanici-ekle-btn'>Ekle</button>
</form>



</div>












            
           


        </div>
    </div>













    <script src='js/jquery-3.4.1.min.js'></script>
            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }

                $(document).ready(function(){

                    $(".kullanici-show").hide();
                        $(".shows").click(function(){
                            $(".kullanici-show").css("display","block");
                            $("#users-sayi").animate({height:"120px"},500);

                        });

                        $(".yeniden").click(function(){
                            $(".aa").css("display","block");
                            $(".input-error").css("display","none");
                            $(".yeniden").css("display","none");

                        });

                        $(".ekle-btn").click(function(){
                            $(".aa").css("display","block");
                            

                        });

                      


                })


            </script>
</body>

</html>
<?php

function dbconnect(){

$sql=mysqli_connect("localhost","root","","admin_panel");

if($sql){

    return $sql;
}else{

    return false;
}

}

function k_sayisi(){
    $conn=dbconnect();
    $sql="SELECT * FROM users";
    $result=mysqli_query($conn,$sql);
    echo mysqli_num_rows($result);


}

function kullanicilar(){
    $conn=dbconnect();
    $sql="SELECT adi FROM users";
    $result=mysqli_query($conn,$sql);
    while($cek=mysqli_fetch_array($result))

    echo " " . $cek['adi'];

}

if(isset($_POST['ad'])){

    $ad=htmlspecialchars($_POST['ad']);
    $soyad=htmlspecialchars($_POST['soyad']);
    $k_adi=htmlspecialchars($_POST['k_adi']);
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $confirm_password=htmlspecialchars($_POST['confirm_password']);
    $rutbe=$_POST['rutbe'];

    if(empty($ad) || empty($soyad) || empty($k_adi) || empty($email) || empty($password) || empty($confirm_password)){

        echo "<p class='input-error'>Alanlar boş olamaz!</p>";?> <a class='yeniden' href='#'>Yeniden Dene</a><?php

    }else{

        if($password != $confirm_password){

            echo "<p class='input-error'>Passwordlar aynı diğil !</p>";?> <a class='yeniden' href='#'>Yeniden Dene</a><?php
        }else{

            $conn=dbconnect();
            $kullanici_sorgulama="SELECT * from `users` where `k_adi`='$k_adi'";
            $results=mysqli_query($conn,$kullanici_sorgulama);
            $counts=mysqli_num_rows($results);
            if($counts>0){

                 echo "<p class='input-error'>Bu Kullanici adi alinamaz !</p>";?> <a class='yeniden' href='#'>Yeniden Dene</a><?php

            }else{
                
            $password=password_hash($password,PASSWORD_DEFAULT,['cost' => 12]);
            $conn=dbconnect();
            $sql="INSERT into users (`adi`,`soyadi`,`k_adi`,`rutbe`,`email`,`password`) VALUES ('$ad','$soyad','$k_adi','$rutbe','$email','$password')";

            $result=mysqli_query($conn,$sql);

            if($result){

                echo "<p class='input-success'>Kullanıcı Eklendi !</p>";
                
            }else{

                echo "<p class='input-error'>Hata oldu !</p>";?> <a class='yeniden' href='#'>Yeniden Dene</a><?php
            }
        
            }


        }

    }

  


}


?>