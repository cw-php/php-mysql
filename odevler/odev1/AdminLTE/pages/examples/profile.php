<?php
session_start();

if(!isset($_SESSION['oturum'])){
  

 header("Location:../login.php");

}else{

 $admin_username=$_SESSION['username'];

}



function dbconnect(){

    $sql=mysqli_connect("localhost","root","","admin_panel");
    
    if($sql){
    
        return $sql;
    }else{
    
        return false;
    }
    
}


$conn=dbconnect();

$sql="SELECT * FROM `users` Where `K_adi`='$admin_username'";
$result=mysqli_query($conn,$sql);




while($cek=mysqli_fetch_array($result)){

$dizi=["Adi"=>$cek["Adi"],"Soyadi" => $cek["Soyadi"],"K_adi" => $cek["K_adi"],"Email" => $cek["email"],"Adress" => $cek["Adress"],"City" => $cek["City"],"Country" => $cek["Country"],"About_me" => $cek["About_me"]];
}




?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
.upload-btn {
                width: 100px;
                height: 38px;
                border-radius: 10px;
                border-width: 0px;
                position: absolute;
                margin-left: 300px;
                margin-top: 8px;
            }
            
            .upload-btn:hover {
                background-color: #404c42;
                color: white;
            }
            
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
            /* Full-width input fields */
            
            input[type=file] {
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 30px;
                display: inline-block;
            }
            /* Set a style for all buttons */
            
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            
            button:hover {
                opacity: 0.8;
            }
            /* Extra styles for the cancel button */
            
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }
            /* Center the image and position the close button */
            
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }
            
            img.avatar {
                width: 40%;
                border-radius: 50%;
            }
            
            .container {
                padding: 16px;
            }
            
            span.psw {
                float: right;
                padding-top: 16px;
            }
            /* The Modal (background) */
            
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;
            }
            /* Modal Content/Box */
            
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%;
                margin-left: 160px;
                /* Could be more or less, depending on screen size */
            }
            /* The Close Button (x) */
            
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }
            /* Add Zoom Animation */
            
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }
            
            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }
                to {
                    -webkit-transform: scale(1)
                }
            }
            
            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }
                to {
                    transform: scale(1)
                }
            }
            /* Change styles for span and cancel button on extra small screens */
            
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
            
            .forms {
                height: 30px;
            }
            
            .upload-btn {
                width: 110px;
                height: 30px;
                border-radius: 6px;
                border-width: 0px;
            }
            
            .sidebar {
                margin-top: 30px;
            }

</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $admin_username;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?php echo $admin_username;?>
                 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="?logout=exit" class="btn btn-default btn-flat">Sign out</a>
                  <?php
                  
                  
                  if(isset($_GET['logout'])){

                    $exit=$_GET['logout'];
                    if($exit=='exit'){

                        session_destroy();
                        header("Location:../../login.php");

                    }



                  }
                  
                  
                  ?>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $admin_username;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
      
          </a>
        </li>
        
        <li>
          <a href="../widgets.php">
          <i class="fa fa-image"></i> <span>Images</span>
           
          </a>
        </li>
        
       
        <li>
          <a href="../editors.php">
          <i class="fa fa-edit"></i> <span>Editors</span>
           
          </a>
        </li>
        
        
        <li>
          <a href="../mailbox.php">
            <i class="fa fa-file-text-o"></i> <span>Texts</span>
      
          </a>
        </li>
        <li class='active'>
          <a href="#">
            <i class="fa fa-user"></i> <span>Profile</span>
      
          </a>
        </li>

        <li>
          <a href="../icons.php">
          <i class="fa fa-archive"></i> <span>Icons</span>
           
          </a>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" style='cursor:pointer;'  onclick="aa()" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $dizi['K_adi']; ?></h3>

              <div id="id01" class="modal">

                                <div class="imgcontainer">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                                </div>

                                <div class="container">

                                    <div class="forms">

                                        <form action="" id='forms' class="modal-content animate" method="post" enctype="multipart/form-data">
                                            <input type="file" name="dosya">
                                            <input type="submit" value="Upload" name="submit" class='upload-btn'>
                                        </form>
                                    </div>

                                </div>

                            </div>

              

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              

              

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $dizi['Adress']?></p>

              <hr>

              

              

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p> <?php echo $dizi['About_me'];?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
             
           

              <div class="tab-pane" id="settings" >
                <form class="form-horizontal" action='' method='post'>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input name='name' type="text" class="form-control" id="inputName" value="<?php echo $dizi['Adi']?>" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label" >Email</label>

                    <div class="col-sm-10">
                      <input name='email' type="email" class="form-control" id="inputEmail" value="<?php echo $dizi['Email']?>" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Surname</label>

                    <div class="col-sm-10">
                      <input name='surname' type="text" class="form-control" id="inputName" value="<?php echo $dizi['Soyadi']?>" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">About</label>

                    <div class="col-sm-10">
                      <textarea name='about_mee' class="form-control" id="inputExperience"  placeholder="Experience"><?php echo $dizi['About_me'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-10">
                      <input name='adress' type="text" class="form-control" id="inputSkills" value="<?php echo $dizi['Adress']?>" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                       
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>

function aa(){

  $("#id01").show();
}

</script>
</body>
</html>


<?php
if(isset($_POST['name'])){
$name=htmlspecialchars($_POST['name'],ENT_QUOTES);
$surname=htmlspecialchars($_POST['surname'],ENT_QUOTES);
$email=htmlspecialchars($_POST['email'],ENT_QUOTES);
$adress=htmlspecialchars($_POST['adress'],ENT_QUOTES);

$about_me=htmlspecialchars($_POST['about_mee'],ENT_QUOTES);

$sql="UPDATE `users` set `Adi`='$name',`Soyadi`='$surname',`Email`='$email',`Adress`='$adress',`City`='$city',`Country`='$country',`About_me`='$about_me' Where `K_adi`='$admin_username'";
$conn=dbconnect();
$result=mysqli_query($conn,$sql);
if($result){

  echo "<script>alert('Bilgiler Güncellendi')</script>";
}else{

  echo "<script>alert('Hata')</script>";
}




}
function resim_ekle($id){
  $conn=dbconnect();
  $img_extends=['.png','.jpg','.jpeg','.gif'];
  $max_boyut=500000;
  $resim_boyutu=$_FILES['dosya']['size'];
  $resim_adi=$_FILES['dosya']['name'];
  $uzanti=explode(".",$resim_adi);
  $uzanti=".".end($uzanti);
  $names=rand(0,99999999).$uzanti;
  $dosya_yolu='resimler/'.$names;
  if($resim_boyutu>$max_boyut){
  
      echo "Resim boyutu buyuk";
  }else{
  
  
  if(in_array($uzanti,$img_extends)){
  
      
      if(is_uploaded_file($_FILES['dosya']['tmp_name'])){
  
          $move=move_uploaded_file($_FILES['dosya']['tmp_name'],$dosya_yolu);
  
          if ($move){
              echo "<script>alert('dosya yuklendi')</script>" ;

              $sql="UPDATE images SET images_name='resimler/$names' Where id=$id";
              $sorgu=mysqli_query($conn,$sql);               
          }   
      }else{
  
          echo "hata oldu !";
      }
      
  }else{
      echo "<script>alert('Hata yalniz Resim yukleyin!')</script>";
}
}    
}


if(isset($_POST['dosya'])){

  echo resim_ekle(83);


}






?>