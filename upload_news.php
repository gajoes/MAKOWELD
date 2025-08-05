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
    $conn = db_connect();
    
    function translate($text, $targetLang = 'en'){
        $apiKey='AIzaSyCXomBN774BsxQBvbdcm9UvncrBzAfUFaU';
        $url='https://translation.googleapis.com/language/translate/v2';
    
        $data=[
            'q' =>$text,
            'target' =>$targetLang,
            'format' =>'text',
            'key' =>$apiKey,
        ];
    
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response=curl_exec($ch);
        curl_close($ch);
    
        $json=json_decode($response, true);
        if (isset($json['data']['translations'][0]['translatedText'])){
            return $json['data']['translations'][0]['translatedText'];
        }else{
        return '';
    }
    
    }
    
    if ($_SERVER['REQUEST_METHOD']==='POST' && !isset($_POST['confirm_translation'])){
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        $content = isset($_POST['content']) ? trim($_POST['content']) : '';
    
        if (empty($title) || empty($content)){
            die("Tytuł i treść są wymagane.");
        }
    
        if (mb_strlen($title)>255){
            die("Tytuł jest za długi (maks. 255 znaków).");
        }
    
        $title_en=translate($title);
        $content_en=translate($content);
        ?>
        <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <title>Edytuj tłumaczenie</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        </head>
        <body class="container py-5">
            <h2 class="mb-4">Sprawdź i edytuj tłumaczenie</h2>
            <form method="post" action="upload_news.php" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <input type="hidden" name="confirm_translation" value="1">
                <input type="hidden" name="title" value="<?= htmlspecialchars($title) ?>">
                <input type="hidden" name="content" value="<?= htmlspecialchars($content) ?>">
    
                <div class="mb-3">
                    <label class="form-label">Tytuł (EN):</label>
                    <input type="text" name="title_en" class="form-control" value="<?= htmlspecialchars($title_en) ?>" required>
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Treść (EN):</label>
                    <textarea name="content_en" class="form-control" rows="6" required><?= htmlspecialchars($content_en) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Zdjęcie (opcjonalnie):</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
    
                <button type="submit" class="btn btn-primary">Zapisz do bazy</button>
                <a href="admin.php" class="btn btn-secondary ms-2">Anuluj</a>
            </form>
        </body>
        </html>
        <?php
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['confirm_translation'])){
        $title=isset($_POST['title']) ? trim($_POST['title']) : '';
        $content=isset($_POST['content']) ? trim($_POST['content']) : '';
        $title_en=isset($_POST['title_en']) ? trim($_POST['title_en']) : '';
        $content_en=isset($_POST['content_en']) ? trim($_POST['content_en']) : '';
    
        if (empty($title) || empty($content) || empty($title_en) || empty($content_en)){
            die("Wszystkie pola są wymagane.");
        }
        if (mb_strlen($title)>255 || mb_strlen($title_en)>255){
            die("Tytuł PL lub EN jest za długi (maks. 255 znaków).");
        }
    
        $safeTitle=htmlspecialchars($title, ENT_QUOTES | ENT_HTML5,'UTF-8');
        $safeContent=htmlspecialchars($content, ENT_QUOTES | ENT_HTML5,'UTF-8');
        $safeTitleEN=htmlspecialchars($title_en, ENT_QUOTES | ENT_HTML5,'UTF-8');
            $safeContentEN=htmlspecialchars($content_en, ENT_QUOTES | ENT_HTML5,'UTF-8');
    
            $imagePath=null;
            
            if (isset($_FILES['image']) && $_FILES['image']['error']===UPLOAD_ERR_OK){
                $allowedTypes=['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $fileType=mime_content_type($_FILES['image']['tmp_name']);
            
                if (!in_array($fileType, $allowedTypes)){
                    die("Nieobsługiwany format obrazu.");
                }
                $uploadDir = dirname(__DIR__).'/uploads/';
                if (!is_dir($uploadDir)){
                    mkdir($uploadDir, 0755, true);
                }
                $filename=uniqid('img_', true).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $targetPath=$uploadDir.$filename;
            
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    die("Błąd zapisu pliku.");
                }
                $imagePath='image.php?file='.$filename;
            }
    
        $stmt=$conn->prepare("INSERT INTO news (title,content,title_en,content_en,image_path,created_at) VALUES (?,?,?,?,?, NOW())");
        $stmt->bind_param("sssss",$safeTitle,$safeContent,$safeTitleEN,$safeContentEN,$imagePath);
    
    
        if ($stmt->execute()){
            $news_id =$stmt->insert_id;
            $ip=$_SERVER['REMOTE_ADDR'];
            $log=$conn->prepare("INSERT INTO news_logs (news_id,title,ip_address) VALUES (?,?,?)");
            $log->bind_param("iss",$news_id,$safeTitle,$ip);
            $log->execute();
            $log->close();
        } else {
            die("Błąd zapisu do bazy danych.");
        }
        $stmt->close();
        $conn->close();
    
        header("Location: admin.php");
        exit();
    }
    ?>
