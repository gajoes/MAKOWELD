<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-pl="MAKO-WELD - Kontakt" data-en="MAKO-WELD - Contact">MAKO-WELD - Kontakt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        body > main {
            flex: 1;
        }

        body.light-mode{
            background-color: #ffffff;
            color: #000000;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-top: 80px;
        }

        body.dark-mode{
            background-color: #121212;
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-top: 80px;
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

        .dark-mode .custom-navbar{
            background-color: #333333;
        }

        .light-mode .navbar-brand,
        .light-mode .nav-link,
        .light-mode .navbar-toggler-icon,
        .light-mode .form-check-label{
            color: #000000 !important;
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

        .contact-section{
            padding: 60px 0;
        }

        .social-icons{
            text-align: center;
            margin-top: 30px;
        }

        .social-icons a{
            font-size: 2.5rem;
            margin: 0 15px;
            transition: transform 0.3s ease, color 0.3s ease;
            color: #000000;
        }

        .dark-mode .social-icons a{
            color: #ffffff;
        }

        .social-icons a:hover{
            color: #0d6efd;
            transform: scale(1.2);
        }

        .map-container{
            position: relative;
            overflow: hidden;
            padding-top: 56.25%;
            margin-top: 30px;
        }

        .map-container iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
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

        @media (max-width: 768px){
            .social-icons a {
                margin: 0 10px;
                font-size: 2rem;
            }
        }
    </style>
</head>
<body class="light-mode">
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          MAKO-WELD
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                aria-label="Przełącznik nawigacji">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav me-3">
            <li class="nav-item">
              <a class="nav-link" href="index.php" data-pl="Strona Główna" data-en="Main Page">Strona Główna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php" data-pl="O Nas" data-en="About Us">O Nas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="offer.php" data-pl="Oferta" data-en="Offer">Oferta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.php" data-pl="Kontakt" data-en="Contact">Kontakt</a>
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

    <main>
      <section class="contact-section py-5">
          <div class="container" data-aos="fade-up" data-aos-offset="150">
              <div class="row">
                  <div class="col-md-6 mb-4" data-aos="fade-right" data-aos-duration="1000">
                      <h2 class="mb-4" data-pl="Skontaktuj się z nami" data-en="Get in touch with us">Skontaktuj się z nami</h2>
                      <p data-pl="ul. Gajowa 16, 08-110 Siedlce" data-en="Gajowa 16 St. 08-110 Siedlce"><i class="fas fa-map-marker-alt me-2"></i> ul. Gajowa 16, 08-110 Siedlce</p>
                      <p><i class="fas fa-phone me-2"></i> +48 728 343 103</p>
                      <p><i class="fas fa-envelope me-2"></i> 
                          <a href="mailto:m.gajowniczek@makoweld.com">m.gajowniczek@makoweld.com</a>
                      </p>
                      <p><i class="fas fa-clock me-2"></i> Pon - Pt: 08:00 - 16:00</p>
                  </div>
                  <div class="col-md-6 mb-4" data-aos="fade-left" data-aos-duration="1000">
                      <h2 class="mb-4" data-pl="Śledź nas w mediach społecznościowych" data-en="Follow us on social media">Śledź nas w mediach społecznościowych</h2>
                      <div class="social-icons">
                          <a href="https://www.facebook.com/profile.php?id=61562463804658" target="_blank" class="facebook" data-aos="fade-in"><i class="fab fa-facebook-square"></i></a>
                          <a href="https://www.instagram.com/yourprofile" target="_blank" class="instagram" data-aos="fade-in" data-aos-delay="200"><i class="fab fa-instagram-square"></i></a>
                      </div>
                  </div>
              </div>
              <!--map-->
              <div class="row">
                  <div class="col-12" data-aos="zoom-in" data-aos-duration="1000">
                      <h2 class="text-center mb-4" data-pl="Znajdź nas" data-en="Find us">Znajdź nas</h2>
                      <div class="map-container">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2449.9798191082364!2d22.20955807650852!3d52.116495971958145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTLCsDA2JzU5LjQiTiAyMsKwMTInNDMuNyJF!5e0!3m2!1spl!2spl!4v1734359786465!5m2!1spl!2spl" 
                          allowfullscreen="" loading="lazy"></iframe>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    </main>

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
    <script>
        AOS.init({
            duration: 1000,
            offset: 150,
            once: true
        });

        const toggle=document.getElementById('themeToggle');
        const body=document.body;

        if (localStorage.getItem('theme')==='dark') {
            body.classList.remove('light-mode');
            body.classList.add('dark-mode');
            toggle.checked=true;
        }

        toggle.addEventListener('change',() =>{
            if (toggle.checked){
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            } else{
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                localStorage.setItem('theme', 'light');
            }
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

        window.addEventListener('DOMContentLoaded',()=> {
            const lang=localStorage.getItem('lang') || 'pl';
            document.getElementById('langToggle').value=lang;
            switchLang(lang);
        });
    </script>
</body>
</html>
