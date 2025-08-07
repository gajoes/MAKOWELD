<?php
ini_set('session.cookie_httponly',1);
ini_set('session.use_strict_mode',1);
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !=="off"){
    ini_set('session.cookie_secure',1);
}
session_start();
session_regenerate_id(true);

if (!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token']=bin2hex(openssl_random_pseudo_bytes(32));
}
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS']==="off"){
    header("Location: https://" .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']);
    exit();
}

if (!isset($_SESSION['login_attempts'])) $_SESSION['login_attempts']=0;
if (!isset($_SESSION['last_attempt_time'])) $_SESSION['last_attempt_time']=time();

$blocked=false;
if ($_SESSION['login_attempts'] >=5){
    $timeSinceLast=time() -$_SESSION['last_attempt_time'];
    if ($timeSinceLast<300){
        $blocked=true;
    } else {
        $_SESSION['login_attempts']=0;
        $_SESSION['last_attempt_time']=time();
    }
}

require_once __DIR__ . '/../config/db.php';
$conn=db_connect();

if (isset($_POST['login']) && !$blocked){
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Nieprawidłowy token.");
    }
    $username=trim(isset($_POST['username']) ? $_POST['username'] : '');
    $password=isset($_POST['password']) ? $_POST['password'] : '';

    if (!preg_match('/^[a-zA-Z0-9_]{3,30}$/',$username)){
        $error="Nieprawidłowy format loginu.";
    } else {
        $stmt=$conn->prepare("SELECT password_hash FROM admins WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hash);

        if ($stmt->num_rows===1 && $stmt->fetch() && password_verify($password,$hash)){
            $old_token=$_SESSION['csrf_token'];
            session_regenerate_id(true);
            $_SESSION['admin_logged_in']=true;
            $_SESSION['admin_username']=$username;
            $_SESSION['login_attempts']=0;
            $_SESSION['csrf_token']=$old_token;
        }else{
            $_SESSION['login_attempts']++;
            $_SESSION['last_attempt_time']=time();
            $error = "Nieprawidłowy login lub hasło.";
        }
        $stmt->close();
    }
}

if (isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Location: dIdn4nDqBTp0xyw.php");
    exit();
}

if (isset($_POST['update_post']) && isset($_SESSION['admin_logged_in'])){
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']){
        die("Nieprawidłowy token CSRF");
    }
    $postId=(int) $_POST['post_id'];
    require_once __DIR__ . '/../config/db.php';

function translate($text, $targetLang='en'){
    $apiKey='AIzaSyCXomBN774BsxQBvbdcm9UvncrBzAfUFaU';
    $url='https://translation.googleapis.com/language/translate/v2';

    $data=[
        'q'=>$text,
        'target'=>$targetLang,
        'format'=>'text',
        'key'=>$apiKey,
    ];

    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response=curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);
    if (isset($json['data']['translations'][0]['translatedText'])) {
        return $json['data']['translations'][0]['translatedText'];
    } else {
        return '';
    }
}

    $title=trim($_POST['title']);
    $content=trim($_POST['content']);
    $title_en=trim(isset($_POST['title_en']) ? $_POST['title_en'] : '');
    $content_en=trim(isset($_POST['content_en']) ? $_POST['content_en'] : '');

    if (!empty($title) && !empty($content)) {
        if (empty($title_en)) $title_en=translate($title);
        if (empty($content_en)) $content_en=translate($content);

        $stmt = $conn->prepare("UPDATE news SET title=?, content=?, title_en=?, content_en=? WHERE id=?");
        $stmt->bind_param("ssssi", $title, $content, $title_en, $content_en, $postId);
        $stmt->execute();
        $stmt->close();

        header("Location: dIdn4nDqBTp0xyw.php?updated=1");
        exit();
    }
}

$editPost=null;
if (isset($_GET['edit']) && isset($_SESSION['admin_logged_in'])){
    $postId=(int) $_GET['edit'];
    $stmt = $conn->prepare("SELECT id, title, content, title_en, content_en FROM news WHERE id=?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result=$stmt->get_result();
    $editPost=$result->fetch_assoc();
    $stmt->close();
}

$allPosts =[];
if (isset($_SESSION['admin_logged_in'])){
    $searchTerm=trim(isset($_GET['search']) ? $_GET['search'] : '');
    $searchDate=trim(isset($_GET['date']) ? $_GET['date'] : '');

    if ($searchTerm!=='' && $searchDate!==''){
        $stmt=$conn->prepare("SELECT id,title,content,created_at FROM news WHERE title LIKE CONCAT('%',?,'%') AND DATE(created_at) =? ORDER BY created_at DESC");
        $stmt->bind_param("ss", $searchTerm, $searchDate);
    } elseif ($searchTerm !=='') {
        $stmt=$conn->prepare("SELECT id, title,content,created_at FROM news WHERE title LIKE CONCAT('%',?,'%') ORDER BY created_at DESC");
        $stmt->bind_param("s", $searchTerm);
    } elseif ($searchDate !=='') {
        $stmt=$conn->prepare("SELECT id,title,content,created_at FROM news WHERE DATE(created_at)=? ORDER BY created_at DESC");
        $stmt->bind_param("s",$searchDate);
    } else {
        $stmt=$conn->prepare("SELECT id, title, content, created_at, added_by FROM news ORDER BY created_at DESC");
    }
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result) {
        while ($row=$result->fetch_assoc()){
            $allPosts[]=$row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdn.jsdelivr.net; style-src 'self' https://cdn.jsdelivr.net;">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta http-equiv="X-Frame-Options" content="DENY">
  <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Administratora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
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

<div class="container mt-5 pt-5 pb-5">
<?php if (!isset($_SESSION['admin_logged_in'])): ?>
  <h3 class="text-center mb-4">Logowanie administratora</h3>
  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= $error ?></div>
  <?php endif; ?>
  <?php if ($blocked): ?>
    <?php
      $remaining=300-(time()-$_SESSION['last_attempt_time']);
      $minutes=floor($remaining/60);
      $seconds=$remaining % 60;
    ?>
    <div class="alert alert-warning text-center">
      Zbyt wiele prób logowania. Spróbuj ponownie za <?= $minutes ?>m <?= $seconds ?>s.
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
  <?php if ($editPost): ?>
    <h3 class="text-center mb-4">Edytuj post</h3>
    <form method="post" class="news-form border p-4 shadow rounded bg-light">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
      <input type="hidden" name="post_id" value="<?=$editPost['id'] ?>">
      <div class="mb-3">
  <label for="title" class="form-label">Tytuł (PL)</label>
  <input type="text" name="title" class="form-control" value="<?=htmlspecialchars($editPost['title']) ?>" required>
</div>
  <div class="mb-3">
    <label for="content" class="form-label">Treść (PL)</label>
    <textarea name="content" class="form-control" rows="5" required><?=htmlspecialchars($editPost['content']) ?></textarea>
  </div>
  <div class="mb-3">
    <label for="title_en" class="form-label">Tytuł (EN) - Jeżeli chcesz automatyczne tłumaczenie to usuń treść poniżej.</label>
    <input type="text" name="title_en" class="form-control" value="<?=htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : '') ?>">
  </div>
  <div class="mb-3">
    <label for="content_en" class="form-label">Treść (EN) - Jeżeli chcesz automatyczne tłumaczenie to usuń treść poniżej.</label>
    <textarea name="content_en" class="form-control" rows="5" ><?=htmlspecialchars(isset($editPost['content_en']) ? $editPost['content_en'] : '') ?></textarea>
  </div>
      <button type="submit" name="update_post" class="btn btn-warning w-100">Zapisz zmiany</button>
    </form>
  <?php else: ?>
    <h3 class="text-center mb-4">Dodaj nowy post</h3>
    <?php if (isset($_GET['deleted'])): ?>
      <div id="deleteAlert" class="alert alert-success text-center">
        Post został usunięty.
      </div>
    <?php endif; ?>
      <?php if (isset($_GET['updated'])): ?>
      <div id="updateAlert" class="alert alert-success text-center">
        Post został zaktualizowany.
      </div>
    <?php endif; ?>
      <?php if (isset($success)): ?>
        <div class="alert alert-success text-center"><?=$success ?></div>
      <?php endif; ?>
      <?php if (isset($_GET['success']) && $_GET['success']==1): ?>
    <div id="popup-success" class="alert alert-success text-center">
      Post został pomyślnie dodany!
    </div>
  <?php endif; ?>
    <form action="upload_news.php" method="post" enctype="multipart/form-data" class="news-form border p-4 shadow rounded bg-light">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
      <div class="mb-3">
        <label for="title" class="form-label">Tytuł</label>
        <input type="text" name="title" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Treść</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-success w-100">Dodaj aktualność</button>
    </form>
  <?php endif; ?>
  <hr class="my-5">
  <h4 class="text-center">Lista postów</h4>
  <form method="get" class="row g-3 align-items-center mb-3">
    <div class="col-auto">
      <input type="text" name="search" class="form-control" placeholder="Szukaj po tytule" value="<?=htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : '') ?>">
    </div>
    <div class="col-auto">
      <input type="date" name="date" class="form-control" value="<?=htmlspecialchars(isset($_GET['date']) ? $_GET['date'] : '') ?>"  >
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Szukaj</button>
      <a href="dIdn4nDqBTp0xyw.php" class="btn btn-secondary">Wyczyść</a>
    </div>
  </form>

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tytuł</th>
        <th>Data</th>
        <th>Dodany przez</th>
        <th>Akcje</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($allPosts as $post): ?>
        <tr>
          <td><?= $post['id'] ?></td>
          <td><?= htmlspecialchars($post['title']) ?></td>
          <td><?= date('d-m-Y',strtotime($post['created_at'])) ?></td>
          <td><?= isset($post['added_by']) ? htmlspecialchars($post['added_by']) : '–' ?></td>
          <td style="white-space: nowrap; width: 1%;">
            <div class="d-flex flex-wrap gap-1 justify-content-center">
              <a href="dIdn4nDqBTp0xyw.php?edit=<?= $post['id'] ?>" class="btn btn-sm btn-warning px-2">Edytuj</a>
              <form method="post" action="delete_post.php" onsubmit="return confirm('Czy na pewno chcesz usunąć ten post?');" style="display:inline;">
                <input type="hidden" name="post_id" value="<?=$post['id'] ?>">
                <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_SESSION['csrf_token']) ?>">
                <button type="submit" class="btn btn-sm btn-danger px-2">Usuń</button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
</div>
<script src="alerts/alerts.js"></script>
</body>
</html>