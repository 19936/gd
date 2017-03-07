<?php

if(isset($_FILES['image'])){
$errors= array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];

$expensions= array("jpeg","jpg","png");

    session_start();
    if (!isset($_SESSION['file'])) {
        $_SESSION['file'] = $file_name;
    }

if($file_size > 2097152) {
$errors[]='File size must be excately 2 MB';
}

if(empty($errors)==true) {
move_uploaded_file($file_tmp,"../images/".$file_name);
echo 'succes';
header('Location: ../index.php?action=show');
}else{
print_r($errors);
}

}


?>