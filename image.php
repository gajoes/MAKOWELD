<?php
session_start();

$filename=isset($_GET['file']) ? basename($_GET['file']) : '';
$filepath=dirname(__DIR__).'/uploads/' .$filename;

if (!$filename || strpos($filename, '..') !==false || !$filepath || !file_exists($filepath)){
    http_response_code(404);
    exit('Plik nie istnieje.');
}

$finfo=finfo_open(FILEINFO_MIME_TYPE);
header('Content-Type: '.finfo_file($finfo, $filepath));
header('Content-Length: '.filesize($filepath));
readfile($filepath);
exit();
