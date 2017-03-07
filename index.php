<?php

$action = isset($_GET['action'])?$_GET['action']:'home';


        switch($action){

            case 'upload':
                include 'views/upload.php';
                break;

            case 'show':
                include 'include/loadImage.php';
                include 'views/image.php';
                break;
        }

