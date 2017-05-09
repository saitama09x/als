<?php

$dir = "student/uploader_asset/php/uploads/";
$file = $dir.$_GET['name'];

$filename = explode('.', $_GET['name']);

$newname = $_GET['asname'].'.'.$filename[1];



if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$newname.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

?>