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

$sql="SELECT * FROM `users`";
$result=mysqli_query($conn,$sql);

while($cek=mysqli_fetch_array($result)){

$dizi=["id"=>$cek["id"],"K_adi" => $cek["K_adi"],];
}

function resim_cek($id){
  $conn=dbconnect();
  $sql="SELECT `images_name` from `images` where `id`='$id'";
  $result=mysqli_query($conn,$sql);
  while($cek=mysqli_fetch_array($result)){

      echo $cek['images_name'];
  }      
  }

//resim ekleme fonksiyonu 
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
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Simple Tables</title>
   <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="../../lightbox/src/css/lightbox.css" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
        img {
            width: 100px;
            height: 60px;
        }
        
        .upload-img {
            width: 30px;
            height: 20px;
            cursor: pointer;
        }
        
        .bin {
            width: 30px;
            height: 20px;
            cursor: pointer;
        }
        
      /*  .islem-imgs {
            margin-top: 20px;
        }*/
        
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
        
        #imgs,
        #islem {
            margin-top: 10px;
            background-color: #ececec;

        }
        #islem{

          display: inline-block;
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

        .sidebar{

          margin-top:30px;
        }
    </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
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
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

     
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
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        
        <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview active">
     
          <ul class="treeview-menu">
            <li class="active"><a href="simple.html"><i class="fa fa-image"></i>Images</a></li>
            
          </ul>
        </li>
        

        
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
    
         

      
     <!--resimlerrrrrrrrrrrrrrrrrrrr-->
     <div class="container-fluid">
    <div class="row">
        <div id="id01" class="modal">

            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            </div>

            <div class="container">

                <div class="forms">

                    <form action="" class="modal-content animate" method="post" enctype="multipart/form-data">
                        <input type="file" name="dosya">
                        <input type="submit" value="Upload" name="submit-one" class='upload-btn'>
                    </form>
                </div>

            </div>

        </div>

        <div class="col-9" id='imgs' >
            <a href="../<?php echo  resim_cek(1);?>" data-lightbox="site-resim">
                                    <img src="../<?php echo  resim_cek(2);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png' onclick="document.getElementById('id01').style.display='block'" class='upload-img'>
                <img src='../resimler/rubbish-bin.png' class='bin'>
            </div>
        </div>
        <div class="col-9" id='imgs'>
            <a href="../<?php echo  resim_cek(2);?>" data-lightbox="site-resim">
                                     <img src="../<?php echo  resim_cek(2);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png' onclick="document.getElementById('id01').style.display='block'" class='upload-img'>
                <img src='../resimler/rubbish-bin.png' class='bin'>
            </div>
        </div>
        <!--2 ci hisse-->
        <div class="col-9" id='imgs'>
            <a href="../<?php echo  resim_cek(3);?>" data-lightbox="site-resim">
                                    <img src="../<?php echo  resim_cek(3);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png' onclick="document.getElementById('id01').style.display='block'" class='upload-img'>
                <img src='../resimler/rubbish-bin.png' class='bin'>
            </div>
        </div>
        <div class="col-9" id='imgs' >
            <a href="../<?php echo  resim_cek(4);?>" data-lightbox="site-resim">
                                     <img src="../<?php echo  resim_cek(4);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png ' onclick="document.getElementById('id01 ').style.display='block '" class='upload-img '>
                <img src='../resimler/rubbish-bin.png ' class='bin '>
            </div>
        </div>
        <!--333333333333-->
        <div class="col-9" id='imgs'>
            <a href="../<?php echo  resim_cek(5);?>" data-lightbox="site-resim">
                                    <img src="../<?php echo  resim_cek(5);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png ' onclick="document.getElementById('id01 ').style.display='block '" class='upload-img '>
                <img src='../resimler/rubbish-bin.png ' class='bin '>
            </div>
        </div>
        <div class="col-9" id='imgs'>
            <a href="../<?php echo  resim_cek(6);?>" data-lightbox="site-resim">
                                     <img src="../<?php echo  resim_cek(6);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png ' onclick="document.getElementById('id01 ').style.display='block '" class='upload-img '>
                <img src='../resimler/rubbish-bin.png ' class='bin '>
            </div>
        </div>
        <!--2 ci hisse-->
        <div class="col-9" id='imgs'>
            <a href="../<?php echo  resim_cek(7);?>" data-lightbox="site-resim">
                                    <img src="../<?php echo  resim_cek(7);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png ' onclick="document.getElementById('id01 ').style.display='block '" class='upload-img '>
                <img src='../resimler/rubbish-bin.png ' class='bin '>
            </div>
        </div>
        <div class="col-9" id='imgs'>
            <a href="../<?php echo  resim_cek(8);?>" data-lightbox="site-resim">
                                     <img src="../<?php echo  resim_cek(8);?>">
                                   </a>

        </div>
        <div class="col-3" id='islem'>
            <div class="islem-imgs">
                <img src='../resimler/upload.png ' onclick="document.getElementById('id01 ').style.display='block '" class='upload-img '>
                <img src='../resimler/rubbish-bin.png ' class='bin '>
            </div>
        </div>

    </div>
</div>

<!--resimler sonnnnnnnnnnn-->



        </div>        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
                                                    $(document).ready(function() {

                                                    });

                                                    var modal = document.getElementById('id01');

                                                    // When the user clicks anywhere outside of the modal, close it
                                                    window.onclick = function(event) {
                                                        if (event.target == modal) {
                                                            modal.style.display = "none";
                                                        }
                                                    }
                                                </script>
</body>
</html>
