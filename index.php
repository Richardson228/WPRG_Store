<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Nutrition</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <div class="header-top">
            <div class="header-promotion">
                <h2 class="header-promotion-text" data-key="promotion">
                    Darmowa dostawa przez DPD od <span class="header-promotion-price">89,00 zł</span>
                </h2>
            </div>
        </div>
        <div class="header-bottom container">
            <a href="/" class="header-logo" title="Mark Nutrition">
                <img src="/images/logo.png" alt="Mark Nutrition Logo" width="150" class="header-logo-img"
                    loading="lazy">
            </a>
            <nav class="header-menu">
                <ul class="header-menu-list">
                    <li class="header-menu-item">
                        <a href="/catalog.php" class="header-menu-link is-current" data-key="menu.catalog">Katalog</a>
                    </li>
                    <li class="header-menu-item">
                        <a href="#contact" class="header-menu-link" data-key="menu.blog">Blog</a>
                    </li>
                    <li class="header-menu-item">
                        <a href="/" class="header-menu-link" data-key="menu.about">O nas</a>
                    </li>
                    <li class="header-menu-item">
                        <a href="#contact" class="header-menu-link" data-key="menu.contact">Kontakty</a>
                    </li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="/" class="header-login" title="Konto">
                    <img src="/icon/user.png" alt="user logo" width="50">
                </a>
                <a href="/" class="header-cart" title="Koszyk">
                    <img src="/icon/cart.png" alt="cart logo" width="50">
                </a>
                <div class="header-language">
                <div class="dropdown">
                    <button class="dropdown-toggle">
                        <img src="/icon/poland.png" alt="Polski" width="40">
                    </button>
                    <div class="dropdown-menu">
                        <button class="language-btn" data-lang="pl"><img src="/icon/poland.png" alt="Polski"
                                width="30"></button>
                        <button class="language-btn" data-lang="en"><img src="/icon/united-states.png" alt="English"
                                width="30"></button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </header>
    <main class="content">
        <section class="slider">
            <div class="slider-container">
                <div class="slide">
                    <img src="/images/slider-image1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="/images/slider-image2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="/images/slider-image3.jpg" alt="">
                </div>
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
            <div class="slider-dots">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </section>
        <section class="advantages container">
            <div class="advantages-container">
                <div class="advantages-item">
                    <img class="advantage-image" src="/images/delivery.png" alt="">
                    <p data-key="advantages.delivery">Dostawa w ciągu 3 dni roboczych</p>
                </div>
                <div class="advantages-item">
                    <img class="advantage-image" src="/images/benefit.png" alt="">
                    <p data-key="advantages.prices">Najniższe ceny wśród konkurentów</p>
                </div>
                <div class="advantages-item">
                    <img class="advantage-image" src="/images/discount.png" alt="">
                    <p data-key="advantages.discounts">Częste kupony i zniżki</p>
                </div>
                <div class="advantages-item">
                    <img class="advantage-image" src="/images/support.png" alt="">
                    <p data-key="advantages.support">Responsywna pomoc techniczna</p>
                </div>
            </div>
        </section>
        <section class="chapter bestsellers">
            <div class="chapter-text">
                <h2 data-key="bestsellers">BESTSELLERY</h2>
            </div>
            <div class="chapter-line"></div>
        </section>
        <section class="products-list">
            <?php
            $bestsellerIds = array(4, 5, 12, 9);
            $bestsellerIdsString = implode(',', $bestsellerIds);
            $ids = $bestsellerIdsString;

            include 'php/get_products.php';
            ?>
        </section>
        <section class="chapter news">
            <div class="chapter-text">
                <h2 data-key="news">NOWOŚCI</h2>
            </div>
            <div class="chapter-line"></div>
        </section>
        <section class="products-list">
            <?php
            $bestsellerIds = array(20, 2, 14, 7);
            $bestsellerIdsString = implode(',', $bestsellerIds);
            $ids = $bestsellerIdsString;

            include 'php/get_products.php';
            ?>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-info">
            <ul class="footer-list">
                <li class="footer-list-item"><a href="/" data-key="faq">FAQ</a></li>
                <li class="footer-list-item"><a href="/" data-key="about.us">O NAS</a></li>
                <li class="footer-list-item"><a href="#contact" data-key="contacts">KONTAKT</a></li>
                <li class="footer-list-item"><a href="/assets/policy.pdf" download data-key="privacy.policy">POLITYKA PRYWATNOŚCI</a></li>
                <li class="footer-list-item"><a href="/" data-key="rules">REGULAMIN</a></li>
            </ul>
        </div>
        <div class="location">
            <p data-key="location">NASZA LOKALIZACJA</p>
            <div id="map" style="height: 400px; min-width: 200px; width: 100%"></div>
            <div id="map" class="map-container"></div>

            <script>
                function initMap() {
                    var shopLocation = { lat: 54.5189, lng: 18.5503 }; 
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: shopLocation,
                        zoom: 15 
                    });

                    var marker = new google.maps.Marker({
                        position: shopLocation,
                        map: map,
                        title: 'Mark Nutrition'
                    });
                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAajefqBMu7z4jmdpBFYxYHGySdDwnYt2E&callback=initMap">
            </script>
        </div>
        <div class="social-media">
            <p data-key="serve.us">OBSERWUJ NAS</p>
            <div class="social-media-icons">
                <a href="/"><img src="/icon/instagram.png" alt="instagram icon"></a>
                <a href="/"><img src="/icon/facebook.png" alt="facebook icon"></a>
                <a href="/"><img src="/icon/twitter.png" alt="twitter icon"></a>
                <a href="/"><img src="/icon/youtube.png" alt="youtube icon"></a>
                <a href="https://github.com/Richardson228"><img src="/icon/github.png" alt="github icon"></a>
            </div>
        </div>
        <div id="contact" class="contact">
            <a href="mailto:mark-nutrition@gmail.com">mark-nutrition@gmail.com</a>
            <a href="tel:+48123456789">+48 123 456 789</a>
        </div>
    </footer>
    <script src="translations.js"></script>
    <script src="script.js"></script>
</body>

</html>