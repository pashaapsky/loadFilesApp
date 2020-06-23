<?php

$img = explode(',', $_POST['img']);

$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
//var_dump($uploadPath);

foreach ($img as $name){
    unlink($uploadPath . $name);
}

