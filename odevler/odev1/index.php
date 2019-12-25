<?php
function dbconnect()
{
    $sql = mysqli_connect("localhost", "root", "", "admin_panel");
    if($sql)
    {

        return $sql;

    }else
    {

        return false;
    }
}
function sayi ($table, $place) {
        $conn = dbconnect();
        $sql = "SELECT * from `$table` Where `gosterim_yeri` = '$place'";
        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);

        return $rowcount;    
}
function resim($table, $column, $place, $sayi, $id)
{
    $conn = dbconnect();    
    $sql = "SELECT * from `$table` Where `gosterim_yeri`='$place' order by `id` DESC limit $sayi";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);

    return $row[$id][$column];    
}    
function text_title($table, $column, $place, $sayi, $id2)
{
        $conn = dbconnect();    
        $sql = "SELECT * from `$table` Where `gosterim_yeri`='$place' order by `id` DESC limit $sayi";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC); 

        return @$row[$id2][$column];        
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Template</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="AdminLTE/bower_components/Ionicons/css/ionicons.min.css">

        <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
        <style>
            .aLink {
                display: inline-block;
            }
        </style>
    </head>

    <body>

        <div class="top">

        </div>

        <div class="container-fluid" id="zz">
            <div class="row">
                <div id='site-logos' class="col-7">
                    <p id='logo'>GLOBAL
                        <p id='logo' class='buisness'>BUSINESS</p>
                    </p>
                </div>

                <div class="col-5" id='site-menu'>
                    <ul>
                        <li><a href="#" title='HOME'>SERVICE</a></li>
                        <li><a href="login.php" title='LOGIN'>LOGIN</a></li>
                        <li><a href="#" title='CONTACT'>CONTACT</a></li>
                    </ul>
                    <div class="hamburger-btn">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="image">

            <img src='resimler/resim.png'>

        </div>
        <div class="container-fluid" id='mountain-img-div'>
            <div class="row">

<?php

            $count  =2;
            $dizi = array();
            for ($i = 0; $i < $count; $i++) {
                    $id = $i;
                    $verilerr = resim('images', 'images_name', 'Top', 2, $id);                
                    $dizi[$i] = $verilerr;

            }

                $dizi2=array();
            for ($i = 0; $i < $count; $i++) {
                    $id = $i;
                    $verilerr = resim('texts', 'text_title', 'Top1', 2, $id);                
                    $dizi2[$i] = $verilerr;

            }

            for ($i = 0;$i < 2;$i++) {

                echo "<div class='col-xl-6 col-lg-6 col-md-6 col-sm-12' id='div1'>
                <img src='AdminLTE/pages/$dizi[$i]' id='mountain-img-one' class='img-fluid'>
                <div class='' id='img-info'>
                <div class='col-xl-6 col-lg-6 col-md-6 col-sm-12' id='div1'>
                <p>$dizi2[$i]</p>
                </div>
                </div>
                </div>";
            }
?>

            </div>
        </div>

        <div class="container-fluid" id="information-area">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

<?php

                $txt_dizi_title = array();
                $txt_dizi_about = array();

            for ($i = 0; $i < 1; $i++) {                 
                    $id2 = $i;
                    $txt_dizi1 = text_title('texts', 'text_title', 'Top1', 1, $id2);
                    $txt_dizi2 = text_title('texts', 'text_about', 'Top1', 1, $id2);
                    $txt_dizi_title[$i] = $txt_dizi1;
                    $txt_dizi_about[$i] = $txt_dizi2;
            }

?>

                        <p class='There_are_many_variations_of_passages'>
                            <?php  echo $txt_dizi_title[0];?>
                        </p>
                        <p class='There_are_many_variations_of_passages'>
                            <?php  echo $txt_dizi_about[0];?>
                        </p>

                </div>

            </div>
        </div>

        <div class="container-fluid" id="article_area1">
            <div class="row">

<?php

                $img_count = 3;    
                $img_dizi = array();
                $text_title_dizi = array();
                $text_about_dizi = array();

                for ($i = 0; $i < $img_count; $i++) {
                    $id = $i;
                    $id2 = $i;        
                    $veriler_resim = resim('images', 'images_name', 'Middle', 3, $id);
                    $veriler_text_title = text_title('texts', 'text_title', 'Middle1', 3, $id2);
                    $veriler_text_about = text_title('texts', 'text_about', 'Middle1', 3, $id2);
                    $text_title_dizi[$i] = $veriler_text_title;
                    $text_about_dizi[$i] = $veriler_text_about;        
                    $img_dizi[$i] = $veriler_resim;        
                }

                for ($i = 0; $i < 3; $i++) {       
        echo "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-12' >
            <img style='margin-top:10px;' src='AdminLTE/pages/$img_dizi[$i]' class='img-fluid'>
            </div>

        <div  class='col-xl-9 col-lg-9 col-md-8 col-sm-12'> 
        <p>$text_title_dizi[$i]</p>
            <p>$text_about_dizi[$i]</p>

            <input class='Read_More' name='input_name' type='submit' value='Read More'>
        </div> ";
                }

?>

            </div>
        </div>

        <div class="container-fluid" id='email_template'>
            <div class="row">
                <div class="col-12">
<?php
                $txt_dizi_title = array();
                $txt_dizi_about = array();

            for ($i = 0; $i < 1 ; $i++) { 
                    $id2 = $i;
                    $txt_dizi1 = text_title('texts', 'text_title', 'Middle2', 1, $id2);
                    $txt_dizi2 = text_title('texts', 'text_about', 'Middle2', 1, $id2);
                    $txt_dizi_title[$i] = $txt_dizi1;
                    $txt_dizi_about[$i] = $txt_dizi2;

            }

?>

                        <p class='text-center best_business_email_template'>
                            <?php  echo $txt_dizi_title[0];?>
                        </p>
                        <div class='div_template'>
                            <p style='color:white;' class='text-center template_about'>
                                <?php  echo $txt_dizi_about[0];?>
                            </p>
                        </div>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

<?php
                $img_count = 3;    
                $img_dizi = array();
                $text_title_dizi =  array();
                $text_about_dizi = array();
            for ($i = 0; $i < $img_count; $i++) {
                    $id=$i;
                    $id2=$i;        
                    $veriler_resim = resim('images', 'images_name', 'Bottom', 3, $id);
                    $veriler_text_title = text_title('texts', 'text_title', 'Bottom1', 3, $id2);
                    $veriler_text_about = text_title('texts', 'text_about', 'Bottom1', 3, $id2);
                    $text_title_dizi[$i] = $veriler_text_title;
                    $text_about_dizi[$i] = $veriler_text_about;        
                    $img_dizi[$i] = $veriler_resim;     
            }

            for ($i = 0; $i < 3; $i++) {               
                echo "<div class='col-xl-4 col-lg-4 col-md-4 col-sm-12' id='end-job-about-div1'>
                <img src='AdminLTE/pages/$img_dizi[$i]' class='img-fluid' id='end-job-img'>
                <p class='lorem-title'>$text_title_dizi[$i]</p>
                <p class='lorem-about'>$text_about_dizi[$i]</p>
                <input type='submit' value='Read More' id='end-job-input'>
                </div>";
            }

?>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12" id='our_satisfection'>
<?php

                $txt_dizi_title = array();
                $txt_dizi_about = array();

            for ($i = 0; $i < 1; $i++) {                 
                    $id2 = $i;
                    $txt_dizi1 = text_title('texts', 'text_title', 'Bottom2', 1, $id2);
                    $txt_dizi2 = text_title('texts', 'text_about', 'Bottom2', 1, $id2);
                    $txt_dizi_title[$i] = $txt_dizi1;
                    $txt_dizi_about[$i] = $txt_dizi2;
            }
?>

                        <p class='text-center satisfection_ptag1'>
                            <?php  echo $txt_dizi_title[0];?>
                        </p>
                        <p class='text-center  satisfection_ptag2'>
                            <?php  echo $txt_dizi_about[0];?>
                        </p>

                </div>

            </div>
        </div>

        <div class="container-fluid" id='footer-background'>
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id='footer'>

                    <a href=#>KEEP IN TOUCH</a>
                    <a href=#>Who we are</a>
                    <a href=#>Where we are</a>
                    <a href=#>Sroe Location</a>

                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id='footer'>

                    <a href=#>CONTACT US</a>
                    <a href=#>Resource & Links</a>
                    <a href=#>Social Networks</a>
                    <a href=#>Privacy Policy</a>

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" id='footer'>

                    <div class="icons">
                        <p class='follow_us'>Follow us on</p>
<?php

                $conn = dbconnect();
                $sql7 = "SELECT * from `icons`";
                $result7 = mysqli_query($conn,$sql7);
                $row7 = mysqli_fetch_all($result7,MYSQLI_ASSOC);
                $rowcount7 = mysqli_num_rows($result7);

            for ($i = 0;$i < $rowcount7; $i++) {
                    $icon_code = "fa ".$row7[$i]['icon_code'];
                    $icon_link = $row7[$i]['icon_link'];
                    echo "<a class='aLink' target='_blank' href='$icon_link'><i style='color:blue; font-size:40px; margin-left:4px; margin-top:20px;' id='icons' class='$icon_code'></i></a>";

            }

?>

                            <p class='Subscribed'>Un Subscribed Here / Update Profile</p>

                    </div>

                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12" id='copyright-backgrund'>

                    <p class='text-center copyright'>COPYRIGHT @ 2013-FREEPSDIES.COM,ALL RIGHT RESERVED</p>

                </div>
            </div>
        </div>

        <div class="end-footer">

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".hamburger-btn").click(function() {
                    $(".about-website-p-tag").css("margin-top", "220px")
                    $(".hamburger-btn").toggleClass("hamburger-change");
                    $("ul").finish().slideToggle(800);

                });
            });
        </script>

    </body>
    </html>

