<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title data-pl="MAKOWELD - Oferta" data-en="MAKOWELD - Offer">MAKO-WELD - Oferta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XRBY41W6e6W4fWSo3eIQ1+r6KoiB84IzjReFdRJ4/nyZ8lHKEfEvOg1R9scCTg/C6DDLu5fcd1b2QAHN9h0Sjw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
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
            transition: filter 0.7s ease;
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
            background: #2a2a2a;
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
            box-shadow: 0 -2px 5px rgba(255,255,255,0.05);
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

        .dark-mode .service-image {
        filter: brightness(0) invert(1);
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
      
      <!--theme switch-->
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
            <h1 class="display-4 fw-bold hero-title" data-pl="Nasza Oferta" data-en="Our offer">Nasza Oferta</h1>
            <p class="lead mt-3" data-pl="Wysokiej jakości usługi tokarsko-ślusarskie dostosowane do Twoich potrzeb." data-en="High quality turnery-locksmithery services adjusted to Your demand.">Wysokiej jakości usługi tokarsko-ślusarskie dostosowane do Twoich potrzeb.</p>
            <a href="#services" class="btn btn-primary btn-lg mt-4 cta-btn" data-pl="Zobacz usługi" data-en="View the services">Zobacz Usługi</a>
        </div>
    </div>
</header>

<!--services-->
<section class="services-section py-5" id="services" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <h2 data-pl="Nasze Usługi" data-en="Our services">Nasze Usługi</h2>
            <p class="text-muted" data-pl="Profesjonalne rozwiązania tokarsko-ślusarskie dla każdego projektu." data-en="Professional turnery-locksmithery solutions adjusted to fit every project.">Profesjonalne rozwiązania tokarsko-ślusarskie dla każdego projektu.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                  <img src="img/weld.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                  <img src="img/al.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4 data-pl="Spawanie aluminium" data-en="Aluminium welding">Spawanie aluminium</h4>
                    <p data-pl="Spawanie aluminium to specjalistyczny proces łączenia lekkiego, wytrzymałego i odpornego na korozję metalu." data-en="Aluminum welding is a specialized process of joining lightweight, durable, and corrosion-resistant metal.">Spawanie aluminium to specjalistyczny proces łączenia lekkiego, wytrzymałego i odpornego na korozję metalu.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                  <img src="img/weld.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                  <img src="img/ss.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4 data-pl="Spawanie stali nierdzewnej (stopy niklu)" data-en="Stainless steel welding (nickel alloys)">Spawanie stali nierdzewnej (stopy niklu)</h4>
                    <p data-pl="Spawanie stali nierdzewnej (w tym stopów niklu) to precyzyjny proces łączenia metali odpornych na korozję, wysokie temperatury i działanie chemikaliów." data-en="Welding stainless steel (including nickel alloys) is a precise process of joining metals resistant to corrosion, high temperatures, and chemicals.">Spawanie stali nierdzewnej (w tym stopów niklu) to precyzyjny proces łączenia metali odpornych na korozję, wysokie temperatury i działanie chemikaliów.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                  <img src="img/weld.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                  <img src="img/bs.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4 data-pl="Spawanie stali SG2,SG3" data-en="SG2,SG3 steel welding">Spawanie stali SG2, SG3</h4>
                    <p data-pl="Spawanie stali SG2 i SG3 to popularna metoda łączenia niskowęglowych stali konstrukcyjnych, zapewniająca dobre własności mechaniczne i wysoką jakość spoin." data-en="Welding SG2 and SG3 steel is a common method for joining low-carbon structural steels, offering good mechanical properties and high-quality welds.">Spawanie stali SG2 i SG3 to popularna metoda łączenia niskowęglowych stali konstrukcyjnych, zapewniająca dobre własności mechaniczne i wysoką jakość spoin.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                    <img src="img/turnery.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4 data-pl="Obróbka Tokarska" data-en="Turnering operation">Obróbka Tokarska</h4>
                    <p data-pl="Obróbka tokarska to precyzyjna metoda kształtowania metalu, idealna do tworzenia elementów o wysokiej jakości i dokładności." data-en="Turnery processing is a precise method of shaping metal, ideal for producing high-quality and accurate components.">Obróbka tokarska to precyzyjna metoda kształtowania metalu, idealna do tworzenia elementów o wysokiej jakości i dokładności.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                  <img src="img/locksmithing.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4 data-pl="Ślusarstwo" data-en="Locksmithing">Ślusarstwo</h4>
                    <p data-pl="Ślusarstwo to fachowa obróbka metali, dzięki której powstają solidne i trwałe konstrukcje oraz elementy mechaniczne." data-en="Locksmithing is an advanced metal processing that results in solid and durable structures and mechanical parts.">Ślusarstwo to fachowa obróbka metali, dzięki której powstają solidne i trwałe konstrukcje oraz elementy mechaniczne.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-center shadow">
                  <img src="img/prototype.png" alt="Usługa 1" class="img-fluid mb-3 service-image">
                    <h4 data-pl="Prototypowanie" data-en="Prototyping">Prototypowanie</h4>
                    <p data-pl="Prototypowanie to kluczowy etap tworzenia innowacyjnych produktów, który pozwala szybko przekształcić pomysł w realny model." data-en="Prototyping is a crucial stage in developing innovative products which allows you to quickly turn an idea into a tangible model.">Prototypowanie to kluczowy etap tworzenia innowacyjnych produktów, który pozwala szybko przekształcić pomysł w realny model.</p>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section py-5 text-center" data-aos="fade-in">
    <div class="container">
        <h2 class="mb-3" data-pl="Chcesz wycenę?" data-en="Looking for cost estimation?">Chcesz wycenę?</h2>
        <p class="mb-4" data-pl="Skontaktuj się z nami, a my pomożemy Ci w realizacji Twojego projektu." data-en="Get in touch with us and we will help You with the implementation of your project.">Skontaktuj się z nami, a my pomożemy Ci w realizacji Twojego projektu.</p>
        <a href="contact.php" class="btn btn-primary btn-lg" data-pl="Skontakuj się" data-en="Get in touch with us">Skontaktuj się</a>
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
</body>
</html>