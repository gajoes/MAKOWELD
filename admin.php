<?php
ini_set('session.cookie_httponly',1);
ini_set('session.use_strict_mode',1);
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off"){
    ini_set('session.cookie_secure',1);
}

session_start();
session_regenerate_id(true);

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token']=bin2hex(openssl_random_pseudo_bytes(32));
}

if (empty($_SERVER['HTTPS'])||$_SERVER['HTTPS']==="off"){
    header("Location: https://" .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']);
    exit();
}

if (!isset($_SESSION['login_attempts'])) $_SESSION['login_attempts']=0;
if (!isset($_SESSION['last_attempt_time'])) $_SESSION['last_attempt_time']=time();

$blocked=false;
if ($_SESSION['login_attempts']>=5){
    $timeSinceLast=time() -$_SESSION['last_attempt_time'];
    if ($timeSinceLast<300) {
        $blocked=true;
    } else {
        $_SESSION['login_attempts']=0;
        $_SESSION['last_attempt_time']=time();
    }
}

require_once __DIR__ . '/../config/db.php';
$conn=db_connect();

if (isset($_POST['login']) && !$blocked){
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !==$_SESSION['csrf_token']){
        die("Nieprawidłowy token.");
    }

    $username=isset($_POST['username']) ? trim($_POST['username']) : '';
    $password=isset($_POST['password']) ? $_POST['password'] : '';

    if (!preg_match('/^[a-zA-Z0-9_]{3,30}$/', $username)){
        $error="Nieprawidłowy format loginu.";
    } else {
        $stmt=$conn->prepare("SELECT password_hash FROM admins WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hash);

        if ($stmt->num_rows===1 && $stmt->fetch() && password_verify($password,$hash)) {
        $old_token=$_SESSION['csrf_token'];

        session_regenerate_id(true);

        $_SESSION['admin_logged_in']=true;
        $_SESSION['login_attempts']=0;
        $_SESSION['csrf_token']=$old_token;
        } else {
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time']=time();
            $error="Nieprawidłowy login lub hasło.";
        }

        $stmt->close();
    }
}

if (isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdn.jsdelivr.net; style-src 'self' https://cdn.jsdelivr.net;">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta http-equiv="X-Frame-Options" content="DENY">
  <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel Administratora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { padding-top: 80px; }
    .admin-form { max-width: 500px; margin: auto; }
    .news-form { max-width: 800px; margin: auto; }
  </style>
</head>
<body class="light-mode">

<nav class="navbar navbar-expand-lg fixed-top custom-navbar bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="index.php">MAKO-WELD</a>
    <div class="ms-auto">
      <?php if (isset($_SESSION['admin_logged_in'])): ?>
      <form method="post">
        <button type="submit" name="logout" class="btn btn-outline-light btn-sm">Wyloguj</button>
      </form>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <?php if (!isset($_SESSION['admin_logged_in'])): ?>
    <h3 class="text-center mb-4">Logowanie administratora</h3>
    <?php if (isset($error)): ?>
      <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($blocked): ?>
      <?php
        $remaining = 300 - (time() - $_SESSION['last_attempt_time']);
        $minutes = floor($remaining / 60);
        $seconds = $remaining % 60;
      ?>
      <div class="alert alert-warning text-center">
        Zbyt wiele nieudanych prób logowania. Spróbuj ponownie za <?= $minutes ?>m <?= $seconds ?>s.
      </div>
    <?php endif; ?>

    <form method="post" class="admin-form border p-4 shadow rounded bg-light">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Login</label>
        <input type="text" name="username" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Hasło</label>
        <input type="password" name="password" class="form-control" required />
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100">Zaloguj się</button>
    </form>

  <?php else: ?>
    <h3 class="text-center mb-4">Dodaj nowy post</h3>
    <form action="upload_news.php" method="post" enctype="multipart/form-data" class="news-form border p-4 shadow rounded bg-light">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
      <div class="mb-3">
        <label for="title" class="form-label">Tytuł</label>
        <input type="text" name="title" id="title" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Treść</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-success w-100">Dodaj aktualność</button>
    </form>
  <?php endif; ?>
</div>

</body>
</html>
