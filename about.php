<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MAKOWELD - O Nas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XRBY41W6e6W4fWSo3eIQ1+r6KoiB84IzjReFdRJ4/nyZ8lHKEfEvOg1R9scCTg/C6DDLu5fcd1b2QAHN9h0Sjw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
</head>
<style>

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

.about-section{
    padding: 60px 0;
}

.team-section{
    padding: 60px 0;
}

.facilities-section{
    background-color: #e9ecef;
    padding: 60px 0;
    transition: background-color 0.3s ease;
}

.dark-mode .facilities-section{
    background-color: #1e1e1e;
}

.about-section .about-img{
    transition: transform 0.5s ease;
}
.about-section .about-img:hover{
    transform: scale(1.05);
}

.about-btn{
    transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
}
.dark-mode .about-btn{
    border-color: #ffffff;
    color: #ffffff;
}
.dark-mode .about-btn:hover{
    background-color: #555555;
    border-color: #555555;
    color: #ffffff;
}

.light-mode .about-btn{
    border-color: #000000;
    color: #000000;
}
.light-mode .about-btn:hover{
    background-color: #ddd;
    border-color: #ddd;
    color: #000000;
}

.services-section{
    transition: background-color 0.3s ease;
}

.light-mode .services-section{
    background-color: #f1f1f1;
    color: #000000;
}

.dark-mode .services-section{
    background-color: #2c2c2c;
    color: #ffffff;
}

.service-card{
    background-color: #ffffff;
    color: #000000;
    border-radius: 8px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

.service-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.dark-mode .service-card{
    background-color: #2c2c2c;
    color: #ffffff;
}

.service-icon{
    transition: transform 0.3s ease;
}

.cta-section{
    background: #f8f9fa;
    color: #000000;
    text-align: center;
    transition: background 0.3s ease, color 0.3s ease;
}

.dark-mode .cta-section{
    background: #1e1e1e;
    color: #ffffff;
}

.cta-btn{
    transition: background-color 0.3s ease, transform 0.3s ease;
    border-radius: 20px;
}
.cta-btn:hover{
    background-color: #333;
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

.login-container{
    height: 100vh;
    background: linear-gradient(135deg, #e2e2e2 0%, #c9d6ff 100%);
    position: relative;
}

.dark-mode .login-container{
    background: linear-gradient(135deg, #333333 0%, #555555 100%);
}

.login-card{
    background: #ffffff;
    border-radius: 15px;
    padding: 2rem;
    min-width: 300px;
    max-width: 400px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    position: relative;
    overflow: hidden;
    transition: background 0.3s ease, color 0.3s ease;
}

.dark-mode .login-card{
    background: #2c2c2c;
    color: #ffffff;
}

.form-login, .form-register{
    transition: opacity 0.3s, transform 0.3s;
}

.toggle-form{
    color: #007bff;
    cursor: pointer;
    text-decoration: underline;
}

.dark-mode .toggle-form{
    color: #66aaff;
}

.alert-box{
    position: absolute;
    top: -80px;
    left: 50%;
    transform: translateX(-50%);
    background: #ffffff;
    padding: 1rem 2rem;
    border-radius: 10px;
    color: #000000;
    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    z-index: 10;
}

.success-alert{
    background: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.error-alert{
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.dark-mode .success-alert{
    background: #1e5128;
    border: 1px solid #145418;
    color: #d4fcd5;
}

.dark-mode .error-alert{
    background: #581b1e;
    border: 1px solid #a33a3f;
    color: #f8d7da;
}

.form-control:focus{
    box-shadow: 0 0 5px rgba(0,0,255,0.3);
}

.btn-primary{
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.btn-primary:hover{
    background-color: #0056b3 !important;
    transform: scale(1.02);
}

.dark-mode label,.dark-mode h2{
    color: #ffffff;
}

body{
    transition: background-color 0.3s ease, color 0.3s ease;
}

.dark-mode .team-member{
    background-color: #2c2c2c;
    color: #ffffff;
    border: none;
}

.dark-mode .team-member .card-title,
.dark-mode .team-member .card-text{
    color: #ffffff;
}

.team-member{
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.team-member:hover{
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}
</style>

<body class="light-mode">
<!--navigation bar-->
<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
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
          <a class="nav-link active" href="about.php">O Nas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="offer.php">Oferta</a>
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

<!--about section-->
<section class="about-section py-5">
    <div class="container" data-aos="fade-up" data-aos-offset="150">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <img src="images/o_nas.jpg" alt="O nas" class="img-fluid rounded shadow about-img">
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="mb-3">O Naszym Zakładzie</h2>
                <p>Zakład Tokarsko-Ślusarski MAKO-WELD to firma z wieloletnim doświadczeniem w branży metalowej. Specjalizujemy się w precyzyjnej obróbce tokarskiej oraz usługach ślusarskich, dostarczając naszym klientom najwyższej jakości produkty i rozwiązania dostosowane do ich indywidualnych potrzeb.</p>
                <p>Nasza misja to dostarczanie innowacyjnych i trwałych rozwiązań metalowych, które wspierają rozwój naszych klientów. Dzięki nowoczesnemu sprzętowi oraz wykwalifikowanej kadrze jesteśmy w stanie sprostać nawet najbardziej wymagającym projektom.</p>
                <p>W MAKO-WELD stawiamy na jakość, precyzję oraz terminowość realizacji zleceń. Nasz zespół ekspertów jest zawsze gotowy do podjęcia się nowych wyzwań, zapewniając kompleksową obsługę od etapu projektowania po finalną realizację produktu.</p>
                <a href="contact.php" class="btn btn-outline-dark mt-3 about-btn">Skontaktuj się z nami</a>
            </div>
        </div>
    </div>
</section>

<!--team section-->
<section class="team-section py-5">
    <div class="container" data-aos="fade-up" data-aos-offset="150">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2>Nasz Zespół</h2>
            <p class="text-muted">Poznaj naszych ekspertów</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card team-member">
                    <img src="images/team1.jpg" class="card-img-top" alt="Jan Kowalski">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jan Kowalski</h5>
                        <p class="card-text">Kierownik Zakładu</p>
                        <p class="card-text">Z ponad 20-letnim doświadczeniem w branży, Jan kieruje zespołem z pasją i zaangażowaniem, dbając o najwyższą jakość usług.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card team-member">
                    <img src="images/team2.jpg" class="card-img-top" alt="Anna Nowak">
                    <div class="card-body text-center">
                        <h5 class="card-title">Anna Nowak</h5>
                        <p class="card-text">Specjalistka ds. Ślusarstwa</p>
                        <p class="card-text">Anna odpowiada za precyzyjne wykonanie elementów ślusarskich, wykorzystując najnowsze technologie i materiały.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card team-member">
                    <img src="images/team3.jpg" class="card-img-top" alt="Piotr Wiśniewski">
                    <div class="card-body text-center">
                        <h5 class="card-title">Piotr Wiśniewski</h5>
                        <p class="card-text">Inżynier Prototypowania</p>
                        <p class="card-text">Piotr jest odpowiedzialny za tworzenie innowacyjnych prototypów, które pomagają naszym klientom w realizacji ich projektów.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--facilities section-->
<section class="facilities-section py-5">
    <div class="container" data-aos="fade-up" data-aos-offset="150">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2>Nasze Zaplecze</h2>
            <p class="text-muted">Nowoczesne technologie i wyposażenie</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <img src="images/facility1.jpg" alt="Nowoczesny Tokarek" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                <h4>Nowoczesne Maszyny Tokarskie</h4>
                <p>Posiadamy najnowsze maszyny tokarskie, które umożliwiają precyzyjną obróbkę metali w różnych gatunkach i rozmiarach. Dzięki temu jesteśmy w stanie realizować zlecenia o wysokich wymaganiach jakościowych.</p>
                <h4>Zaawansowane Technologie Ślusarskie</h4>
                <p>Nasze zaplecze ślusarskie wyposażone jest w zaawansowane narzędzia i urządzenia, które pozwalają na tworzenie trwałych i funkcjonalnych elementów metalowych dostosowanych do potrzeb klienta.</p>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<footer class="footer-section py-4">
    <div class="container text-center">
        <p class="mb-0">©<?php echo date("Y"); ?> MAKO-WELD. Wszelkie prawa zastrzeżone.</p>
        <div class="mt-2">
            <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="me-3"><i class="fab fa-linkedin fa-lg"></i></a>
            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!--animations-->
<script>
  AOS.init({
    duration: 1000,
    offset: 100,
    once: true
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" integrity="sha512-Vr1XfkDDFy7r7Qp1KJGc/WjF8Gi5LSG3zQVIG8Fdjve3KkSxUlCt6+Sgj0gW4T6VuIySj9RnBYNQsbWr2hk2SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    }else{
      body.classList.remove('dark-mode');
      body.classList.add('light-mode');
      localStorage.setItem('theme', 'light');
    }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded',function(){
    const serviceIcons=document.querySelectorAll('.service-icon');
    serviceIcons.forEach(icon=>{
      icon.addEventListener('mouseenter',()=>{
        gsap.to(icon, { y: -10, scale: 1.1, duration: 0.3 });
      });
      icon.addEventListener('mouseleave',()=>{
        gsap.to(icon, { y: 0, scale: 1, duration: 0.3 });
      });
    });
  });
</script>
</body>
</html>
