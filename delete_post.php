<?php
require_once __DIR__ . '/../config/db.php';

session_start();
if (!isset($_SESSION['admin_logged_in'])){
    header("Location: dIdn4nDqBTp0xyw.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['post_id'], $_POST['csrf_token'])){
    if ($_POST['csrf_token'] !==$_SESSION['csrf_token']){
        die("Nieprawidłowy token CSRF");
    }

    $postId=(int) $_POST['post_id'];
    $conn=db_connect();

    $stmt=$conn->prepare("SELECT image_path FROM news WHERE id =?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $stmt->bind_result($image);
    $stmt->fetch();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM news WHERE id =?");
    $stmt->bind_param("i",$postId);
    $stmt->execute();
    $stmt->close();

    $uploadPath = realpath(__DIR__ .'/../uploads/' .$image);
        if (!empty($image) && $uploadPath && file_exists($uploadPath)){
            unlink($uploadPath);
        }
    header("Location: dIdn4nDqBTp0xyw.php?deleted=1");
    exit();
}
?>