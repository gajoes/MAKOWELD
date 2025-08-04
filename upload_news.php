<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !==true){
    header("Location: admin.php");
    exit();
}

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !==$_SESSION['csrf_token']){
    die("Nieprawidłowy token CSRF.");
}

require_once __DIR__ . '/../config/db.php';
$conn=db_connect();


if ($_SERVER['REQUEST_METHOD']==='POST'){
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';


    if (empty($title) || empty($content)){
        die("Tytuł i treść są wymagane.");
    }

    if (mb_strlen($title)>255){
        die("Tytuł jest za długi (maks. 255 znaków).");
    }

    $safeTitle=htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeContent=htmlspecialchars($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $stmt=$conn->prepare("INSERT INTO news (title, content, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss",$safeTitle,$safeContent);

    if ($stmt->execute()){
        $news_id=$stmt->insert_id;

        $ip=$_SERVER['REMOTE_ADDR'];

        $log=$conn->prepare("INSERT INTO news_logs (news_id, title, ip_address) VALUES (?,?,?)");
        $log->bind_param("iss",$news_id,$safeTitle,$ip);
        $log->execute();
        $log->close();
    } else {
        die("Błąd zapisu do bazy danych.");
    }
    $stmt->close();
}
$conn->close();

header("Location: admin.php");
exit();