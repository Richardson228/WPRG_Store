<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
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
            <div class="page-text">
                <h2 data-key="menu.catalog">KATALOG</h2>
            </div>
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
    <main class="container">
        <aside class="sidebar">
            <h3 data-key="filters">Filtry</h3>
            <form id="filter-form">
                <div class="filter-section">
                    <label data-key="search.title" for="search">Szukaj</label>
                    <input type="text" id="search" name="search">
                </div>
                <div class="filter-section">
                    <label data-key="filter.category" for="category">Kategoria</label>
                    <select id="category" name="category">
                        <option data-key="filter.category.all" value="">Wszystkie</option>
                        <option value="whey">Whey</option>
                        <option value="casein">Casein</option>
                        <option value="creatine">Creatine</option>
                        <option value="bcaa">BCAA</option>
                        <option value="glutamine">Glutamine</option>
                        <option value="collagen">Collagen</option>
                        <option value="omega3">Omega 3</option>
                        <option value="vit-c">Vitamin C</option>
                        <option value="vitamins">Vitamins</option>
                    </select>
                </div>
                <div class="filter-section">
                    <label data-key="filter.brand" for="brand">Producent</label>
                    <select id="brand" name="brand">
                        <option data-key="filter.brand.all" value="">Wszyscy</option>
                        <option value="Optimum Nutrition">Optimum Nutrition</option>
                        <option value="Scitec Nutrition">Scitec Nutrition</option>
                        <option value="Biotechusa">Biotech USA</option>
                        <option value="allnutrition">All Nutrition</option>
                        <option value="Olimp Sport Nutrition">Olimp Sport Nutrition</option>
                        <option value="Go On Nutrition">Go On Nutrition</option>
                    </select>
                </div>
                <div class="filter-section">
                    <label data-key="filter.price.from" for="price-min">Cena od</label>
                    <input type="number" id="price-min" name="price_min" min="0" step="10">
                    <label data-key="filter.category.to" for="price-max">Cena do</label>
                    <input type="number" id="price-max" name="price_max" min="0" step="10">
                </div>
                <div class="filter-section">
                    <label data-key="filter.score" for="rating">Ocena</label>
                    <select id="rating" name="rating">
                        <option data-key="filter.category.all" value="0">Wszystkie</option>
                        <option data-key="filter.score.one" value="1">1 gwiazdka</option>
                        <option data-key="filter.score.two" value="2">2 gwiazdki</option>
                        <option data-key="filter.score.three" value="3">3 gwiazdki</option>
                        <option data-key="filter.score.four" value="4">4 gwiazdki</option>
                        <option data-key="filter.score.fifth" value="5">5 gwiazdek</option>
                    </select>
                </div>
                <div class="filter-section">
                    <label data-key="sort" for="sort">Sortuj według</label>
                    <select id="sort" name="sort">
                        <option data-key="sort.up" value="price_asc">Cena rosnąco</option>
                        <option data-key="sort.down" value="price_desc">Cena malejąco</option>
                        <option data-key="sort.top.rated" value="rating_desc">Najlepiej oceniane</option>
                    </select>
                </div>
                <button data-key="go.filter" type="submit">Filtruj</button>
            </form>
        </aside>
        <section class="products catalog">
            <?php
            include 'php/get_products_for_catalog.php';
            ?>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-info">
            <ul class="footer-list">
                <li class="footer-list-item"><a href="/" data-key="faq">FAQ</a></li>
                <li class="footer-list-item"><a href="/" data-key="about.us">O NAS</a></li>
                <li class="footer-list-item"><a href="#contact" data-key="contacts">KONTAKT</a></li>
                <li class="footer-list-item"><a href="/assets/policy.pdf" download data-key="privacy.policy">POLITYKA
                        PRYWATNOŚCI</a></li>
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
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAajefqBMu7z4jmdpBFYxYHGySdDwnYt2E&callback=initMap">
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