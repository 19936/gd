<?php

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $expensions= array("jpeg","jpg","png");



    if($file_size > 2097152) {
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}

function LoadImage($filename)
{
    $type = exif_imagetype($filename); // [] if you don't have exif you could use getImageSize()
    $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
    );
    if (!in_array($type, $allowedTypes)) {
        return false;
    }

    switch ($type) {
        case 1 :
            $image = imageCreateFromGif($filename);
            break;
        case 2 :
            $image = imageCreateFromJpeg($filename);
            break;
        case 3 :
            $image = imageCreateFromPng($filename);
            break;
        case 6 :
            $image = imageCreateFromBmp($filename);
            break;
    }
    return $image;

}


$imagefile = 'images/' . $_FILES['image']['name'];
$img = LoadImage($imagefile);
imagejpeg($img, $imagefile);

?>

<form action = "" method = "POST" enctype = "multipart/form-data">
    <input type = "file" name = "image" />
    <input type = "submit"/>


<?php echo '<img src=' . $imagefile . '>' ?>
