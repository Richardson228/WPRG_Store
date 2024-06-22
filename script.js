document.addEventListener('DOMContentLoaded', function() {

    const languageButtons = document.querySelectorAll(".language-btn");
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");    
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;

    languageButtons.forEach(button => {
        button.addEventListener("click", () => {
            const lang = button.getAttribute("data-lang");
            setLanguage(lang);
            changeLanguage(lang);
        });
    });

    dropdownToggle.addEventListener("click", () => {
        dropdownMenu.classList.toggle("show");
    });

    const setLanguage = (lang) => {
        document.cookie = `language=${lang};path=/;max-age=31536000`;
    };

    const getLanguage = () => {
        const match = document.cookie.match(new RegExp('(^| )language=([^;]+)'));
        return match ? match[2] : 'pl';
    };

    const changeLanguage = (lang) => {
        document.querySelectorAll("[data-key]").forEach(element => {
            const key = element.getAttribute("data-key");
            element.innerHTML = translations[lang][key];
        });
        dropdownToggle.querySelector('img').src = lang === 'pl' ? '/icon/poland.png' : '/icon/united-states.png';
    };

    const defaultLanguage = getLanguage();
    changeLanguage(defaultLanguage);

    
    function showSlide(index) {
        if (index < 0) {
            currentIndex = slides.length - 1;
        } else if (index >= slides.length) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        const offset = -currentIndex * 100;
        document.querySelector('.slider-container').style.transform = `translateX(${offset}%)`;
        updateDots();
    }

    function updateDots() {
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    prevButton.addEventListener('click', function() {
        showSlide(currentIndex - 1);
    });

    nextButton.addEventListener('click', function() {
        showSlide(currentIndex + 1);
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
        });
    });

    showSlide(currentIndex);
});

document.getElementById('filter-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const params = new URLSearchParams(formData).toString();

    fetch('php/get_products_for_catalog.php?' + params)
        .then(response => response.text())
        .then(data => {
            document.querySelector('.products.catalog').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});


