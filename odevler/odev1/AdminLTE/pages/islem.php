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

$conn=dbconnect();


    
    





if (isset($_POST['id'])) {


    $id=$_POST['id'];
    $img_extends=['.png','.jpg','.jpeg','.gif'];
    $max_boyut=500000;
    $resim_boyutu=$_FILES['dosya']['size'];
    $resim_adi=$_FILES['dosya']['name'];
    $uzanti=explode(".",$resim_adi);
    $uzanti=".".end($uzanti);
    $names=rand(0,99999999).$uzanti;
    $dosya_yolu='resimler/'.$names;
    if ($resim_boyutu > $max_boyut) {

        echo "Resim boyutu buyuk";
    } else {

    if (in_array($uzanti, $img_extends)) {

        if (is_uploaded_file($_FILES['dosya']['tmp_name'])) {

            $move=move_uploaded_file($_FILES['dosya']['tmp_name'], $dosya_yolu);

            if ($move) {
                echo "<script>alert('dosya yuklendi')</script>" ;

                $sql="UPDATE images SET images_name='resimler/$names' Where id=$id";
                $sorgu=mysqli_query($conn,$sql);               
            }   
        } else {

            echo "hata oldu !";
        }

    } else {
        echo "<script>alert('Hata yalniz Resim yukleyin!')</script>";
}
}    



}







?>