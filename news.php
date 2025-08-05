<?php
require_once __DIR__ . '/../config/db.php';
$conn=db_connect();

$news_items=[];
$result = $conn->query("SELECT title, content, title_en, content_en, created_at, image_path FROM news ORDER BY created_at DESC");
if ($result) {
    while ($row=$result->fetch_assoc()){
        $news_items[]=$row;
    }
}

ini_set('display_errors', 0);
error_reporting(0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../config/php-error.log');

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title data-pl="MAKOWELD - Aktualności" data-en="MAKOWELD - News">MAKOWELD - Aktualności</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
  <style>
html, body {
    height: 100%;
    margin: 0;
}
body {
    display: flex;
    flex-direction: column;
    transition: background-color 0.3s, color 0.3s;
}
main {
    flex: 1;
}
body.light-mode {
    background-color: #ffffff;
    color: #000000;
    padding-top: 80px;
}
body.dark-mode {
    background-color: #121212;
    color: #ffffff;
    padding-top: 80px;
}
a { text-decoration: none; color: inherit; }
a:hover { text-decoration: underline; }

.custom-navbar {
    transition: background-color 0.3s ease;
}
.light-mode .custom-navbar {
    background-color: #f8f9fa;
}
.dark-mode .custom-navbar {
    background-color: #333333;
}
.light-mode .nav-link,
.light-mode .navbar-brand,
.light-mode .form-check-label {
    color: #000 !important;
}
.dark-mode .nav-link,
.dark-mode .navbar-brand,
.dark-mode .form-check-label {
    color: #fff !important;
}
.dark-mode .navbar-toggler-icon { filter: invert(1); }

.news-tile {
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 1rem;
  overflow: hidden;
  background: linear-gradient(145deg, rgba(255,255,255,0.9), rgba(245,245,245,0.9));
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.news-tile:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

.news-tile .card {
  background-color: transparent;
  border: none;
  border-radius: 1rem;
}

.news-tile .card-body {
  padding: 1.5rem;
}

.news-tile .card-title {
  font-size: 1.2rem;
  font-weight: 600;
  margin-bottom: 0.75rem;
}

.news-tile .text-muted {
  font-size: 0.9rem;
}

.dark-mode .modal-content.dark-mode-bg {
    background-color: #2c2c2c;
}
.dark-mode .modal-content.dark-mode-text {
    color: #ffffff;
}

.footer-section {
    background-color: #f1f1f1;
    text-align: center;
    color: #000000;
    padding: 1.5rem 0;
    transition: background-color 0.3s ease, color 0.3s ease;
}
.dark-mode .footer-section {
    background-color: #333;
    color: #ffffff;
}
.dark-mode .text-muted {
    color: #cccccc !important;
}
.dark-mode .news-tile {
  background: linear-gradient(145deg, #1a1a1a, #1e1e1e);
  box-shadow: 0 4px 12px rgba(0,0,0,0.6);
}

.dark-mode .news-tile:hover {
  box-shadow: 0 12px 25px rgba(255,255,255,0.1);
}

.dark-mode .news-tile .card-title {
  color: #ffffff;
}

.dark-mode .news-tile .text-muted {
  color: #cccccc !important;
}
.dark-mode .modal-content {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
}
.dark-mode .modal-header,
.dark-mode .modal-body,
.dark-mode .modal-footer {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
    border-color: #444 !important;
}
.dark-mode .modal-footer .btn {
    background-color: #333 !important;
    border-color: #555 !important;
    color: #fff !important;
}
.dark-mode .modal-footer .btn:hover {
    background-color: #444 !important;
}
.dark-mode .btn-close {
    filter: invert(1);
}
.light-mode #langToggle {
    background-color: #ffffff;
    color: #000000;
    border: 1px solid #ced4da;
}


.dark-mode #langToggle {
    background-color: #2c2c2c;
    color: #ffffff;
    border: 1px solid #555555;
}


#langToggle option {
    background-color: inherit;
    color: inherit;
}

#langToggle {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg fill='%23ccc' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 1rem;
    padding-right: 2rem;
}

.dark-mode #langToggle {
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg fill='%23fff' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
}
  </style>
</head>
<body class="light-mode">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MAKO-WELD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item"><a class="nav-link" href="index.php" data-pl="Strona Główna" data-en="Main Page">Strona Główna</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php" data-pl="O Nas" data-en="About Us">O Nas</a></li>
        <li class="nav-item"><a class="nav-link" href="offer.php" data-pl="Oferta" data-en="Offer">Oferta</a></li>
        <li class="nav-item"><a class="nav-link" href="certificates.php" data-pl="Certyfikaty" data-en="Certificates">Certyfikaty</a></li>
        <li class="nav-item"><a class="nav-link active" href="news.php" data-pl="Aktualności" data-en="News feed">Aktualności</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php" data-pl="Kontakt" data-en="Contact">Kontakt</a></li>
      </ul>
      <div class="form-check form-switch ms-3">
        <input class="form-check-input" type="checkbox" id="themeToggle" />
        <label class="form-check-label" for="themeToggle" data-pl="Tryb ciemny" data-en="Dark mode">Tryb ciemny</label>
      </div>
      <div class="ms-3">
        <select id="langToggle" class="form-select form-select-sm">
          <option value="pl">PL</option>
          <option value="en">EN</option>
        </select>
      </div>
    </div>
  </div>
</nav>

<main>
  <section class="news-section py-5">
    <div class="container-fluid px-lg-5" data-aos="fade-up">
      <div class="text-center mb-5">
        <h2 data-pl="Aktualności" data-en="Newsfeed">Aktualności</h2>
        <p class="text-muted" data-pl="Nowości w MAKO-WELD" data-en="News in MAKO-WELD">Nowości w MAKO-WELD</p>
      </div>
      <div class="d-flex flex-wrap gap-4 justify-content-center">
        <?php foreach ($news_items as $index => $item): 
         $safeTitle = htmlspecialchars($item['title'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
         $safeContent=htmlspecialchars($item['content'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
         $formattedDate=date('d.m.Y H:i',strtotime($item['created_at']));
        ?>

        <?php 
        $safeTitleEN=htmlspecialchars($item['title_en'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safeContentEN=htmlspecialchars($item['content_en'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        ?>
        <div class="col-md-6 col-lg-4 news-tile news-item" data-index="<?=$index ?>" 
             data-title-pl="<?=$safeTitle ?>" 
             data-content-pl="<?=$safeContent ?>" 
             data-title-en="<?=$safeTitleEN ?>" 
             data-content-en="<?=$safeContentEN ?>" 
             data-date="<?=$formattedDate ?>"
             data-image="<?=isset($item['image_path']) ? htmlspecialchars($item['image_path'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : '' ?>"
             style="display: none;">
        
          <div class="card h-100 d-flex flex-column">
            <?php if (!empty($item['image_path'])): ?>
              <img src="<?= htmlspecialchars($item['image_path']) ?>" class="card-img-top" alt="Miniaturka" style="object-fit: cover; height: 200px; width: 100%;">
            <?php endif; ?>
            <div class="card-body flex-grow-1">
            <h5 class="card-title" data-title-pl="<?= $safeTitle ?>" data-title-en="<?= $safeTitleEN ?>"><?= $safeTitle ?></h5>
              <p class="text-muted small"><?= $formattedDate ?></p>
              <p class="text-muted" data-pl="Kliknij, aby zobaczyć więcej" data-en="Click to view more">
                Kliknij, aby zobaczyć więcej
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="text-center mt-4">
        <button id="loadMoreBtn" class="btn btn-primary" data-pl="Pokaż więcej" data-en="Show more">Pokaż więcej</button>
    </div>
  </section>
</main>

<!-- Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-light dark-mode-bg text-dark dark-mode-text">
      <div class="modal-header">
        <h5 class="modal-title" id="newsModalTitle">Szczegóły</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5">
            <img id="newsModalImage" src="" alt="Obraz posta" class="img-fluid rounded w-100" style="object-fit: cover; max-height: 100%;">
          </div>
          <div class="col-md-7 d-flex flex-column justify-content-start">
            <small id="newsModalDate" class="text-muted mb-2"></small>
            <h5 id="newsModalTitleText" class="mb-3"></h5>
            <div id="newsModalContent"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-pl="Zamknij" data-en="Close">Zamknij</button>
      </div>
    </div>
  </div>
</div>


<!-- Footer-->
<footer class="footer-section">
  <div class="container text-center">
    <p class="mb-0">&copy;<?php echo date("Y"); ?> <span data-pl="MAKO-WELD. Wszelkie prawa zastrzeżone." data-en="MAKO-WELD. All rights reserved.">MAKO-WELD. Wszelkie prawa zastrzeżone.</span></p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000, offset: 100, once: true });

  const toggle=document.getElementById('themeToggle');
  const body=document.body;
  if (localStorage.getItem('theme') === 'dark'){
    body.classList.replace('light-mode', 'dark-mode');
    toggle.checked=true;
  }
  toggle.addEventListener('change', () =>{
    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');
    localStorage.setItem('theme',body.classList.contains('dark-mode') ? 'dark' : 'light');
  });

  const switchLang=lang =>{
    document.querySelectorAll('[data-pl]').forEach(el =>{
      el.textContent=el.getAttribute('data-'+lang);
    });
  };
  function updateCardTitles(lang) {
  document.querySelectorAll('.card-title[data-title-pl]').forEach(el => {
    const newTitle = el.getAttribute(`data-title-${lang}`);
    if (newTitle) {
      el.textContent = newTitle;
    }
  });
}
  document.getElementById('langToggle').addEventListener('change', e =>{
    const lang=e.target.value;
    localStorage.setItem('lang',lang);
    switchLang(lang);
    updateCardTitles(lang);
  });
  window.addEventListener('DOMContentLoaded', () =>{
    const lang=localStorage.getItem('lang') || 'pl';
    document.getElementById('langToggle').value=lang;
    switchLang(lang);
    updateCardTitles(lang);
  });

   document.querySelectorAll('.news-tile').forEach(tile =>{
  tile.addEventListener('click',() =>{
    const lang=localStorage.getItem('lang') || 'pl';
    const title=tile.dataset[lang==='en' ? 'titleEn' : 'titlePl'] || '';
    const content=tile.dataset[lang==='en' ? 'contentEn' : 'contentPl'] || '';
    const date=tile.dataset.date || '';
    const image=tile.dataset.image || '';

    document.getElementById('newsModalTitleText').textContent=title;
    document.getElementById('newsModalDate').textContent=date;
    document.getElementById('newsModalContent').innerHTML=content;
    document.getElementById('newsModalImage').src=image;

    const modal = new bootstrap.Modal(document.getElementById('newsModal'));
    modal.show();
  });
});

  const itemsPerPage=6;
let currentPage=1;

function showNewsItems(){
  const items=document.querySelectorAll('.news-item');
  const totalItems=items.length;
  const maxVisible=currentPage * itemsPerPage;

  items.forEach((item, index) =>{
    if (index<maxVisible){
      item.style.display='block';
    }
  });

  if (maxVisible >= totalItems){
    document.getElementById('loadMoreBtn').style.display='none';
  }
}

document.addEventListener('DOMContentLoaded', () =>{
  showNewsItems();
  const lang = localStorage.getItem('lang') || 'pl';
  document.getElementById('langToggle').value=lang;
  switchLang(lang);
  updateCardTitles(lang);
});

document.getElementById('loadMoreBtn').addEventListener('click', () =>{
  currentPage++;
  showNewsItems();
});
</script>
</body>
</html>
