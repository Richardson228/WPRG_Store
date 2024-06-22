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

// Определение, какие товары выводить (все или только определённые)
$productIds = isset($ids) ? explode(',', $ids) : null;

// Формируем строку для оператора IN
$productIdList = $productIds ? implode(',', $productIds) : null;

// Формируем запрос на выборку товаров
if ($productIdList) {
    // Если заданы конкретные ID товаров
    $sql = "SELECT id, title, price, rating, image FROM products WHERE id IN ($productIdList)";
} else {
    // Если не заданы конкретные ID, выводим все товары
    $sql = "SELECT id, title, price, rating, image FROM products";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<section class='products-section'>";

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
    echo "0 results";
}

// Закрытие соединения
$conn->close();
?>
