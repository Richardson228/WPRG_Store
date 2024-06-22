<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_shop";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение параметров фильтра и сортировки из запроса
$search = isset($_GET['search']) ? $_GET['search'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;
$price_min = isset($_GET['price_min']) ? $_GET['price_min'] : null;
$price_max = isset($_GET['price_max']) ? $_GET['price_max'] : null;
$rating = isset($_GET['rating']) ? $_GET['rating'] : null;
$brand = isset($_GET['brand']) ? $_GET['brand'] : null; // Новый параметр
$sort = isset($_GET['sort']) ? $_GET['sort'] : null;

// Создание SQL запроса
$sql = "SELECT * FROM products WHERE 1=1";

// Фильтрация по названию
if ($search) {
    $sql .= " AND title LIKE '%$search%'";
}

// Фильтрация по категории
if ($category) {
    $sql .= " AND category = '$category'";
}

// Фильтрация по цене
if ($price_min) {
    $sql .= " AND price >= $price_min";
}
if ($price_max) {
    $sql .= " AND price <= $price_max";
}

// Фильтрация по рейтингу
if ($rating) {
    $sql .= " AND rating = $rating";
}

// Фильтрация по производителю
if ($brand) {
    $sql .= " AND manufacturer = '$brand'";
}

// Применяем сортировку
if ($sort) {
    if ($sort == "price_asc") {
        $sql .= " ORDER BY price ASC";
    } elseif ($sort == "price_desc") {
        $sql .= " ORDER BY price DESC";
    } elseif ($sort == "rating_desc") {
        $sql .= " ORDER BY rating DESC";
    }
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<section class='products catalog'>";
    while ($row = $result->fetch_assoc()) {
        $imagePath = 'products/' . $row["image"] . '.jpg';
        echo "<div class='product-card'>";
        echo "<img src='$imagePath' alt='" . $row["title"] . "'>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p><span class='price'>" . $row["price"] . " zł</span></p>";
        echo "<div class='product-rating'>";
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $row["rating"]) {
                echo '<span class="star filled">&#9733;</span>';
            } else {
                echo '<span class="star">&#9734;</span>';
            }
        }
        echo "</div>";
        echo "<button class='add-to-cart-btn' data-key='add.to.cart' data-product-id='" . $row["id"] . "'>DODAJ DO KOSZYKA</button>"; // Кнопка "В корзину
        echo "</div>";
    }
    echo "</section>";
} else {
    echo "Brak wyników";
}

$conn->close();
?>
