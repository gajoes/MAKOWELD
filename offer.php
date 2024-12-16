<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MAKO-WELD - Oferta</title>
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
            max-height: 150px;
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
    </style>
</head>
<body class="light-mode">
<!--navigation bar-->
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
          <a class="nav-link" href="index.php">Strona Główna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">O Nas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="offer.php">Oferta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Kontakt</a>
        </li>
      </ul>
      
      <!--theme switch-->
      <div class="form-check form-switch ms-3">
        <input class="form-check-input" type="checkbox" id="themeToggle" />
        <label class="form-check-label" for="themeToggle">Tryb ciemny</label>
      </div>
    </div>
  </div>
</nav>

<header class="hero-section d-flex align-items-center" id="top">
    <div class="overlay-gradient"></div>
    <div class="container text-center hero-text-container">
        <div class="hero-content position-relative" data-aos="fade-in">
            <h1 class="display-4 fw-bold hero-title">Nasza Oferta</h1>
            <p class="lead mt-3">Wysokiej jakości usługi tokarsko-ślusarskie dostosowane do Twoich potrzeb.</p>
            <a href="#services" class="btn btn-primary btn-lg mt-4 cta-btn">Zobacz Usługi</a>
        </div>
    </div>
</header>

<!--services-->
<section class="services-section py-5" id="services" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Nasze Usługi</h2>
            <p class="text-muted">Profesjonalne rozwiązania tokarsko-ślusarskie dla każdego projektu.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="images/usluga1.jpg" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4>Usługa 1</h4>
                    <p>Opis usługi 1.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="images/usluga2.jpg" alt="Usługa 2" class="img-fluid mb-3 service-image">
                    <h4>Usługa 2</h4>
                    <p>Opis usługi 2.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="images/usluga3.jpg" alt="Usługa 3" class="img-fluid mb-3 service-image">
                    <h4>Usługa 3</h4>
                    <p>Opis usługi 3.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="images/usluga4.jpg" alt="Usługa 4" class="img-fluid mb-3 service-image">
                    <h4>Usługa 4</h4>
                    <p>Opis usługi 4.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="images/usluga5.jpg" alt="Usługa 5" class="img-fluid mb-3 service-image">
                    <h4>Usługa 5</h4>
                    <p>Opis usługi 5.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="images/usluga6.jpg" alt="Usługa 6" class="img-fluid mb-3 service-image">
                    <h4>Usługa 6</h4>
                    <p>Opis usługi 6.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section py-5 text-center" data-aos="fade-in">
    <div class="container">
        <h2 class="mb-3">Chcesz wycenę?</h2>
        <p class="mb-4">Skontaktuj się z nami, a my pomożemy Ci w realizacji Twojego projektu.</p>
        <a href="contact.php" class="btn btn-primary btn-lg">Skontaktuj się</a>
    </div>
</section>

<!--footer-->
<footer class="footer-section py-4">
    <div class="container text-center">
        <p class="mb-0">©<?php echo date("Y"); ?> MAKO-WELD. Wszelkie prawa zastrzeżone.</p>
    </div>
</footer>

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
    if(toggle.checked) {
      body.classList.remove('light-mode');
      body.classList.add('dark-mode');
      localStorage.setItem('theme','dark');
    } else {
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
        gsap.to(image, { scale: 1.05, duration: 0.3 });
      });
      image.addEventListener('mouseleave',()=>{
        gsap.to(image, { scale: 1, duration: 0.3 });
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
</body>
</html>
