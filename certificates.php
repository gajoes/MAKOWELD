<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title data-pl="MAKOWELD - Oferta" data-en="MAKOWELD - Offer">MAKO-WELD - Oferta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XRBY41W6e6W4fWSo3eIQ1+r6KoiB84IzjReFdRJ4/nyZ8lHKEfEvOg1R9scCTg/C6DDLu5fcd1b2QAHN9h0Sjw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <style>
        body.light-mode{
            background-color: #ffffff;
            color: #000000;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        body.dark-mode{
            background-color: #121212;
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        a{
            text-decoration: none;
            color: inherit;
        }
        
        a:hover{
            text-decoration: underline;
        }
        
        .custom-navbar{
            background-color: transparent;
            transition: background-color 0.3s ease;
        }
        
        .light-mode .custom-navbar{
            background-color: #f8f9fa;
        }
        
        .light-mode .navbar-brand,
        .light-mode .nav-link,
        .light-mode .navbar-toggler-icon,
        .light-mode .form-check-label{
            color: #000000 !important;
        }
        
        .light-mode .nav-link.btn-primary{
            color: black !important;
            box-shadow: none !important;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            text-decoration: none;
        }
        .light-mode .nav-link.btn-primary:hover{
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
            box-shadow: 0 0 10px rgba(0,0,255,0.5);
            text-decoration: none !important;
        }
        
        .dark-mode .custom-navbar{
            background-color: #333333;
        }
        
        .dark-mode .navbar-brand,
        .dark-mode .nav-link,
        .dark-mode .navbar-toggler-icon,
        .dark-mode .form-check-label{
            color: #ffffff !important;
        }
        
        .dark-mode .navbar-toggler-icon{
            filter: invert(1);
        }
        
        .dark-mode .nav-link.btn-primary{
            color: #ffffff !important;
            text-decoration: none;
            box-shadow: none !important;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }
        .dark-mode .nav-link.btn-primary:hover{
            background-color: #1645a3 !important;
            border-color: #1645a3 !important;
            box-shadow: 0 0 10px rgba(0,0,255,0.5);
            text-decoration: none !important;
        }
        
        .hero-section{
            position: relative;
            height: 60vh;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            background: url('images/hero_offer.jpg') no-repeat center center/cover;
        }
        
        .overlay-gradient{
            position: absolute;
            top:0; left:0;
            width:100%; height:100%;
            z-index: -1;
            pointer-events: none;
            transition: background 0.3s ease;
        }
        
        .light-mode .overlay-gradient{
            background: rgba(255,255,255,0.3);
        }
        
        .dark-mode .overlay-gradient{
            background: rgba(0,0,0,0.3);
        }
        
        .hero-content{
            z-index: 1;
        }
        
        .services-section{
            padding: 4rem 0;
            background-color: inherit;
            transition: background-color 0.3s ease;
        }
        
        .light-mode .services-section{
            background-color: #f9f9f9;
        }
        
        .dark-mode .services-section{
            background-color: #1a1a1a;
        }
        
        .service-card{
            background-color: #ffffff;
            color: #000000;
            border-radius: 10px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .dark-mode .service-card{
            background-color: #2c2c2c;
            color: #ffffff;
        }
        
        .service-card:hover{
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
        }
        
        .service-card img{
            max-height: 450px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .service-card:hover img{
            transform: scale(1.05);
        }
        
        .cta-section{
            background: #e9ecef;
            color: #000000;
            text-align: center;
            padding: 3rem 0;
            transition: background 0.3s ease, color 0.3s ease;
        }
        
        .dark-mode .cta-section{
            background: #333333;
            color: #ffffff;
        }
        
        .cta-btn{
            border-radius: 30px;
            padding: 0.75rem 2rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        
        .cta-btn:hover{
            background-color: #0056b3;
            transform: scale(1.05);
        }
        
        .footer-section{
            background-color: #f1f1f1;
            text-align: center;
            color: #000000;
            padding: 1.5rem 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .dark-mode .footer-section{
            background-color: #333333;
            color: #ffffff;
        }
        
        .text-muted{
            color: #6c757d !important;
        }
        
        .dark-mode .text-muted{
            color: #cccccc !important;
        }
        
        body{
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .blur{
            filter: blur(4px);
            transition: filter 0.3s ease;
        }
        .hero-bg-video{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
        opacity: 0.5;
        }
        .modal-custom{
        background-color: #ffffff;
        color: #000000;
        transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dark-mode .modal-custom{
        background-color: #2c2c2c;
        color: #ffffff;
        }

        .dark-mode .modal-header .btn-close{
        filter: invert(1);
        }
    </style>
</head>
<body class="light-mode">
<!--navbar-->
<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <i class="fas fa-tools"></i> MAKO-WELD
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Przełącznik nawigacji">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item">
          <a class="nav-link active" href="index.php" data-pl="Strona Główna" data-en="Main Page">Strona Główna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php" data-pl="O Nas" data-en="About Us">O Nas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="offer.php" data-pl="Oferta" data-en="Offer">Oferta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="certificates.php" data-pl="Certyfikaty" data-en="Certificates">Certyfikaty</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php" data-pl="Aktualności" data-en="News feed">Aktualności</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" data-pl="Kontakt" data-en="Contact">Kontakt</a>
        </li>
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

<header class="hero-section d-flex align-items-center" id="top">
    <div class="overlay-gradient"></div>
    <div class="container text-center hero-text-container">
        <div class="hero-content position-relative" data-aos="fade-in">
            <h1 class="display-4 fw-bold hero-title" data-pl="Nasze certyfikaty" data-en="Our certificates">Nasze certyfikaty</h1>
            <p class="lead mt-3" data-pl="Potwierdzenie pełnego profesjonalizmu naszej firmy." data-en="Confirmation of our professionalism.">Potwierdzenie pełnego profesjonalizmu naszej firmy.</p>
            <a href="#services" class="btn btn-primary btn-lg mt-4 cta-btn" data-pl="Zobacz Certyfikaty" data-en="View the Certificates">Zobacz Certyfikaty</a>
        </div>
    </div>
    <video autoplay muted loop playsinline class="hero-bg-video">
       <source src="./img/weld.mp4" type="video/mp4">
    </video>
</header>

<section class="services-section py-5" id="services" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <h2 data-pl="Posiadane certyfikaty" data-en="Our certificates">Posiadane certyfikaty</h2>
            <p class="text-muted" data-pl="Szlifujemy nasze umiejętności, dla Twojej wygody." data-en="We hone our skills, for Your comfort.">Szlifujemy nasze umiejętności, dla Twojej wygody.</p>
        </div>
        <div class="row g-4">
    <div class="col-md-4">
        <div class="service-card text-center shadow" data-bs-toggle="modal" data-bs-target="#modalCertyfikat1">
            <img src="img/cer1.png" alt="Certyfikat1" class="img-fluid mb-3 service-image">
            <h4>EN 15085-2 CL2 w dziedzinie działalności P</h4>
            <p>Spawanie pojazdów szynowych i części pojazdów.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="service-card text-center shadow" data-bs-toggle="modal" data-bs-target="#modalCertyfikat2">
            <img src="img/cer2.png" alt="Certyfikat2" class="img-fluid mb-3 service-image">
            <h4>EN ISO 9001:2015</h4>
            <p>Wytwarzanie konstrukcji stalowych i aluminiowych oraz elementów maszyn i urządzeń dla produkcji pojazdów szynowych i przemysłu spożywczego. Obróbka mechaniczna, plastyczna, spawanie i lutowanie.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="service-card text-center shadow" data-bs-toggle="modal" data-bs-target="#modalCertyfikat3">
            <img src="img/cer3.png" alt="Certyfikat3" class="img-fluid mb-3 service-image">
            <h4>EN ISO 3834-3:2021</h4>
            <p>Produkcja elementów spawanych do pojazdów szynowych.</p>
        </div>
    </div>
</div>
    </div>
</section>

<!--footer-->
<footer class="footer-section py-4">
    <div class="container text-center">
        <p class="mb-0">
            &copy;<?php echo date("Y"); ?> <span data-pl="MAKO-WELD. Wszelkie prawa zastrzeżone." data-en="MAKO-WELD. All rights reserved."></span>
        </p>
    </div>
</footer>

<!-- modals -->
<div class="modal fade" id="modalCertyfikat1" tabindex="-1" aria-labelledby="modalCertyfikat1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body text-center">
        <img src="img/cer1.png" alt="Certyfikat" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCertyfikat2" tabindex="-1" aria-labelledby="modalCertyfikat2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body text-center">
        <img src="img/cer2.png" alt="Certyfikat" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCertyfikat3" tabindex="-1" aria-labelledby="modalCertyfikat3Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
      </div>
      <div class="modal-body text-center">
        <img src="img/cer3.png" alt="Certyfikat" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" integrity="sha512-Vr1XfkDDFy7r7Qp1KJGc/WjF8Gi5LSG3zQVIG8Fdjve3KkSxUlCt6+Sgj0gW4T6VuIySj9RnBYNQsbWr2hk2SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  AOS.init({
    duration: 1000,
    offset: 100,
    once: true
  });
</script>

<script>
  const toggle=document.getElementById('themeToggle');
  const body=document.body;

  if(localStorage.getItem('theme')==='dark'){
    body.classList.remove('light-mode');
    body.classList.add('dark-mode');
    toggle.checked=true;
  }

  toggle.addEventListener('change',()=>{
    if(toggle.checked){
      body.classList.remove('light-mode');
      body.classList.add('dark-mode');
      localStorage.setItem('theme','dark');
    } else{
      body.classList.remove('dark-mode');
      body.classList.add('light-mode');
      localStorage.setItem('theme', 'light');
    }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    const serviceImages=document.querySelectorAll('.service-image');
    const serviceCards=document.querySelectorAll('.service-card');

    serviceImages.forEach(image=>{
      image.addEventListener('mouseenter',()=>{
        gsap.to(image,{ scale: 1.05,duration: 0.3 });
      });
      image.addEventListener('mouseleave',()=>{
        gsap.to(image, { scale: 1,duration: 0.3 });
      });
    });

    serviceCards.forEach(card=>{
      card.addEventListener('mouseenter',()=>{
        serviceCards.forEach(otherCard=>{
          if(otherCard !==card){
            otherCard.classList.add('blur');
          }
        });
      });

      card.addEventListener('mouseleave',()=>{
        serviceCards.forEach(otherCard=>{
          if(otherCard!==card){
            otherCard.classList.remove('blur');
          }
        });
      });
    });
  });
</script>
<script>
const switchLang=lang =>{
  document.querySelectorAll('[data-pl]').forEach(el =>{
    el.textContent=el.getAttribute('data-'+lang);
  });
};

document.getElementById('langToggle').addEventListener('change',e =>{
  const lang=e.target.value;
  localStorage.setItem('lang',lang);
  switchLang(lang);
});

window.addEventListener('DOMContentLoaded',() =>{
  const lang=localStorage.getItem('lang') || 'pl';
  document.getElementById('langToggle').value=lang;
  switchLang(lang);
});
</script>

<script>
  const modalImage=document.getElementById('modalCertificateImage');
  const certificateModal=document.getElementById('certificateModal');

  document.querySelectorAll('[data-bs-target="#certificateModal"]').forEach(link=>{
    link.addEventListener('click',function (){
      const imageSrc=this.getAttribute('data-image');
      modalImage.setAttribute('src',imageSrc);
    });
  });
</script>

</body>
</html>
