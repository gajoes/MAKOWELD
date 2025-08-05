<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title data-pl="MAKOWELD - O Nas" data-en="MAKOWELD - About Us">MAKOWELD - O Nas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XRBY41W6e6W4fWSo3eIQ1+r6KoiB84IzjReFdRJ4/nyZ8lHKEfEvOg1R9scCTg/C6DDLu5fcd1b2QAHN9h0Sjw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
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

.history-section{
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

.history-section .history-img{
    transition: transform 0.5s ease;
    max-height: 700px;
}
.history-section .history-img:hover{
    transform: scale(1.05);
}

.about-btn{
    transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
}
.dark-mode .about-btn{
    color: #ffffff;
}
.dark-mode .about-btn:hover{
    background-color: #555555;
    color: #ffffff;
}

.light-mode .about-btn{
    color: #ffffff;
}
.light-mode .about-btn:hover{
    background-color: #ddd;
    color: #ffffff;
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

<!--about section-->
<section class="about-section py-5">
    <div class="container" data-aos="fade-up" data-aos-offset="150">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <img src="img/mako.png" alt="O nas" class="img-fluid rounded shadow about-img">
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="mb-3" data-pl="O Naszym Zakładzie" data-en="About Our Company">O Naszym Zakładzie</h2>
                <p data-pl="Zakład Tokarsko-Ślusarski MAKO-WELD to firma z wieloletnim doświadczeniem w branży metalowej. Specjalizujemy się w precyzyjnej obróbce tokarskiej oraz usługach ślusarskich, dostarczając naszym klientom najwyższej jakości produkty i rozwiązania dostosowane do ich indywidualnych potrzeb." data-en="Turnery-Locksmithery company MAKO-WELD is a plant with a lifetime experience in metalworking industry. We specialise in precise turnery as well as locksmithing services. We provide our clients with the highest quality products and new, innovative solutions acommodated to their personal need.">Zakład Tokarsko-Ślusarski MAKO-WELD to firma z wieloletnim doświadczeniem w branży metalowej. Specjalizujemy się w precyzyjnej obróbce tokarskiej oraz usługach ślusarskich, dostarczając naszym klientom najwyższej jakości produkty i rozwiązania dostosowane do ich indywidualnych potrzeb.</p>
                <p data-pl="Nasza misja to dostarczanie innowacyjnych i trwałych rozwiązań metalowych, które wspierają rozwój naszych klientów. Dzięki nowoczesnemu sprzętowi oraz wykwalifikowanej kadrze jesteśmy w stanie sprostać nawet najbardziej wymagającym projektom." data-en="Our goal is to deliver innovative and persistent solutions to metalworking, which support the growth of our clients' businesses. Thanks to our modern technology and professionaly trained team we are able to meet the requirements of every project, no matter how complex it is.">Nasza misja to dostarczanie innowacyjnych i trwałych rozwiązań metalowych, które wspierają rozwój naszych klientów. Dzięki nowoczesnemu sprzętowi oraz wykwalifikowanej kadrze jesteśmy w stanie sprostać nawet najbardziej wymagającym projektom.</p>
                <p data-pl="W MAKO-WELD stawiamy na jakość, precyzję oraz terminowość realizacji zleceń. Nasz zespół ekspertów jest zawsze gotowy do podjęcia się nowych wyzwań, zapewniając kompleksową obsługę od etapu projektowania po finalną realizację produktu." data-en="In MAKO-WELD we place importance on quality, precision and timeliness of the order realization. Our experts is always ready to take up new challenges, whilst delivering complex support starting from the project phase, all the way to final realization of the project.">W MAKO-WELD stawiamy na jakość, precyzję oraz terminowość realizacji zleceń. Nasz zespół ekspertów jest zawsze gotowy do podjęcia się nowych wyzwań, zapewniając kompleksową obsługę od etapu projektowania po finalną realizację produktu.</p>
                <a href="contact.php" class="btn btn-primary mt-3 about-btn" data-pl="Skontaktuj się z nami" data-en="Get in touch with us">Skontaktuj się z nami</a>
            </div>
        </div>
    </div>
</section>

<!--team section-->
<section class="team-section py-5">
    <div class="container" data-aos="fade-up" data-aos-offset="150">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 data-pl="Nasz Zespół" data-en="Our Team">Nasz Zespół</h2>
            <p class="text-muted" data-pl="Poznaj naszych ekspertów" data-en="Meet our experts">Poznaj naszych ekspertów</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card team-member">
                    <img src="images/team1.jpg" class="card-img-top" alt="Magdalena Gajowniczek">
                    <div class="card-body text-center">
                        <h5 class="card-title">Magdalena Gajowniczek</h5>
                        <p class="card-text" data-pl="Prezes zarządu" data-en="Board chairman">Prezes zarządu</p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card team-member">
                    <img src="images/team2.jpg" class="card-img-top" alt="Michał Fałek">
                    <div class="card-body text-center">
                        <h5 class="card-title">Michał Fałek</h5>
                        <p class="card-text" data-pl="Dyrektor zarządzający" data-en="CEO">Dyrektor zarządzający</p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card team-member">
                    <img src="images/team3.jpg" class="card-img-top" alt="Dzmitry Yurchyk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dzmitry Yurchyk</h5>
                        <p class="card-text" data-pl="Kierownik produkcji" data-en="Production manager">Kierownik produkcji</p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card team-member">
                    <img src="images/team3.jpg" class="card-img-top" alt="Jacek Siweruk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jacek Siewruk</h5>
                        <p class="card-text" data-pl="Koordynator ds.produkcji" data-en="Production coordinator">Koordynator ds.produkcji</p>
                        <p class="card-text"></p>
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
            <h2 data-pl="Nasze Zaplecze" data-en="Our facility">Nasze Zaplecze</h2>
            <p class="text-muted" data-pl="Nowoczesne technologie i wyposażenie" data-en="Modern technology and equipment">Nowoczesne technologie i wyposażenie</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <img src="img/maszyna.png" alt="Nowoczesna tokarka" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                <h4 data-pl="Profesjonalne Usługi Spawalnicze" data-en="Professional Welding Services">Profesjonalne Usługi Spawalnicze</h4>
                <p data-pl="Oferujemy kompleksowe usługi spawalnicze. Nasz doświadczony zespół spawaczy zapewnia trwałe i estetyczne spoiny, spełniające najwyższe normy jakościowe." data-en="We offer complex welding services. Our experienced welding team ensures durable and aesthetic welds that meet the highest quality standards.">Oferujemy kompleksowe usługi spawalnicze. Nasz doświadczony zespół spawaczy zapewnia trwałe i estetyczne spoiny, spełniające najwyższe normy jakościowe.</p>
                <h4 data-pl="Nowoczesne Maszyny Tokarskie" data-en="Modern Turnery Machines">Nowoczesne Maszyny Tokarskie</h4>
                <p data-pl="Posiadamy najnowsze maszyny tokarskie, które umożliwiają precyzyjną obróbkę metali w różnych gatunkach i rozmiarach. Dzięki temu jesteśmy w stanie realizować zlecenia o wysokich wymaganiach jakościowych." data-en="We possess the newest turnery machines, which allow us precise metal processing in different grades and sizes. Thanks to these machines we are able to realize orders of high quality requirement.">Posiadamy najnowsze maszyny tokarskie, które umożliwiają precyzyjną obróbkę metali w różnych gatunkach i rozmiarach. Dzięki temu jesteśmy w stanie realizować zlecenia o wysokich wymaganiach jakościowych.</p>
                <h4 data-pl="Zaawansowane Technologie Ślusarskie" data-en="Highly Advanced Locksmithery Technology">Zaawansowane Technologie Ślusarskie</h4>
                <p data-pl="Nasze zaplecze ślusarskie wyposażone jest w zaawansowane narzędzia i urządzenia, które pozwalają na tworzenie trwałych i funkcjonalnych elementów metalowych dostosowanych do potrzeb klienta." data-en="Our locksmithery department is equiped with highly advanced tools and machines, which allow us to create persistent and functional metal elements, that fit our client's requirements.">Nasze zaplecze ślusarskie wyposażone jest w zaawansowane narzędzia i urządzenia, które pozwalają na tworzenie trwałych i funkcjonalnych elementów metalowych dostosowanych do potrzeb klienta.</p>
                <a href="offer.php" class="btn mt-4 btn-primary hero-cta" data-aos="zoom-in" data-aos-delay="400" data-pl="Dowiedz się więcej" data-en="Find out more">Dowiedz się więcej</a>
            </div>
        </div>
    </div>
</section>

<section class="history-section py-5">
    <div class="container" data-aos="fade-up" data-aos-offset="150">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <img src="img/budowa.png" alt="O nas" class="img-fluid rounded shadow history-img">
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="mb-3" data-pl="Nasza Historia" data-en="Our History">Nasza Historia</h2>
                <p data-pl="Firma Mako Weld Sp. z o.o. swój początek datuje na 7 stycznia 2021 roku.Aby zrozumieć jej genezę powstania należy sięgnąć do roku 1994, w którym to Adam Gryczewski wraz z małżonką postanowił otworzyć działalność gospodarczą o nazwie - Zakład Tokarsko Ślusarski „Jolanta i Adam”." data-en="The company Mako Weld Sp. z o.o. traces its origins back to January 7, 2021. To understand its beginnings, one must go back to the year 1994, when Adam Gryczewski, together with his wife, decided to start a business under the name Zakład Tokarsko Ślusarski „Jolanta i Adam”.".>Firma Mako Weld Sp. z o.o. swój początek datuje na 7 stycznia 2021 roku.Aby zrozumieć jej genezę powstania należy sięgnąć do roku 1994, w którym to Adam Gryczewski wraz z małżonką postanowił otworzyć działalność gospodarczą o nazwie - Zakład Tokarsko Ślusarski „Jolanta i Adam”.</p>
                <p data-pl="Wówczas firma zajmowała się tylko obróbką skrawaniem i naprawą pojazdów silnikowych.Już w roku 1995 podpisane zostały długoterminowe i obowiązujące do dziś umowy z firmami ZENTIS i KAVIS na produkcję oraz remonty urządzeń przemysłu spożywczego. W roku 1999 zapadła decyzja o zatrudnieniu pierwszego pracownika i poszerzono zakres działalności o spawanie konstrukcji stalowych. Firma wraz z upływem lat i wzrostem zatrudnienia otrzymywała coraz bardziej odpowiedzialne zlecenia, aż do roku 2008, kiedy to po negocjacjach i długich rozmowach nawiązano współpracę z firmą STADLER Polska. Współpraca ta spowodowała jeszcze szybszy rozwój i konieczność wprowadzenia do firmy nowych technologii i urządzeń do spawania aluminium i stali nierdzewnych." data-en="At that time, the company focused solely on machining and motor vehicle repairs. As early as 1995, long-term contracts were signed-with ZENTIS and KAVIS-for the production and repair of food industry equipment, and these agreements remain in effect to this day. In 1999, the decision was made to hire the first employee, and the company expanded its operations to include the welding of steel structures. Over the years, as the workforce grew, the company received increasingly demanding and responsible assignments. This progression culminated in 2008, when-after negotiations and lengthy discussions-a cooperation agreement was established with STADLER Polska. This partnership significantly accelerated the company’s growth and led to the introduction of new technologies and equipment for welding aluminum and stainless steel.">Wówczas firma zajmowała się tylko obróbką skrawaniem i naprawą pojazdów silnikowych.Już w roku 1995 podpisane zostały długoterminowe i obowiązujące do dziś umowy z firmami ZENTIS i KAVIS na produkcję oraz remonty urządzeń przemysłu spożywczego.W roku 1999 zapadła decyzja o zatrudnieniu pierwszego pracownika i poszerzono zakres działalności o spawanie konstrukcji stalowych. Firma wraz z upływem lat i wzrostem zatrudnienia otrzymywała coraz bardziej odpowiedzialne zlecenia, aż do roku 2008, kiedy to po negocjacjach i długich rozmowach nawiązano współpracę z firmą STADLER Polska. Współpraca ta spowodowała jeszcze szybszy rozwój i konieczność wprowadzenia do firmy nowych technologii i urządzeń do spawania aluminium i stali nierdzewnych.</p>
                <p data-pl="Rok 2015 przyniósł kolejne zmiany, firma sprostała wymaganiom normy PN-EN 15085 „System Jakości dla spawania pojazdów szynowych”, a rok później wykonano kolejny krok i postanowiono wdrożyć kolejny system jakości dla normy PN EN 1090-2 „Wykonanie konstrukcji stalowych i aluminiowych”. Od roku 2020 firma posiada system zarządzania jakością DIN EN ISO 9001. Kolejnym krokiem jest poszerzenie współpracy z innymi firmami przemysłu kolejowego i transportu publicznego." data-en="The year 2015 brought further changes, as the company met the requirements of the PN-EN 15085 standard, „Quality Requirements for Welding of Railway Vehicles and Components”. A year later, another step was taken with the decision to implement a new quality system in accordance with the PN-EN 1090-2 standard, „Execution of Steel and Aluminium Structures”. Since 2020, the company has operated under a quality management system compliant with DIN EN ISO 9001. The next step is to expand cooperation with other companies in the railway and public transportation industries.">Rok 2015 przyniósł kolejne zmiany, firma sprostała wymaganiom normy PN-EN 15085 „System Jakości dla spawania pojazdów szynowych”, a rok później wykonano kolejny krok i postanowiono wdrożyć kolejny system jakości dla normy PN EN 1090-2 „Wykonanie konstrukcji stalowych i aluminiowych”. Od roku 2020 firma posiada system zarządzania jakością DIN EN ISO 9001. Kolejnym krokiem jest poszerzenie współpracy z innymi firmami przemysłu kolejowego i transportu publicznego.</p>
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
        gsap.to(icon,{ y: -10,scale: 1.1,duration: 0.3 });
      });
      icon.addEventListener('mouseleave',()=>{
        gsap.to(icon,{ y: 0,scale: 1,duration: 0.3 });
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