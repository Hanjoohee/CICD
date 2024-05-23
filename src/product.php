<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>92m의 세계로 빠져보세요!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #eaeaea;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logo-text {
            font-size: 50px; /* 텍스트 크기 조정 */
            font-weight: bold; /* 굵은 글씨체 */
        }
        .header img {
            border-radius: 50%;
            width: 70px;
            height: 70px;
        }
        .header nav {
            display: flex;
            gap: 10px;
        }
        .button, .header nav input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover, .header nav input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
            padding: 20px;
            justify-content: center;
        }
        .product {
            max-width: 300px;
            margin: auto;
            background-color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 10px;
        }
        .product-info {
            text-align: left;
            margin-top: 10px;
        }
        .product-info span {
            display: block;
            margin-bottom: 5px;
        }
        .product-info .price {
            color: red;
            font-weight: bold;
        }
        .product-info .delivery-info {
            font-size: 14px;
            color: gray;
        }
        .product-info .favorites {
            color: #888;
            font-size: 14px;
        }

        .product-container {
            display: flex;
            margin-top: 20px;
            gap: 20px;
        }

        .product-image {
            flex-basis: 50%;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-details {
            flex-basis: 50%;
        }

        .product-details h1 {
            font-size: 24px;
            color: #333;
        }

        .product-details p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-button {
            background-color: #28a745; /* 변경된 버튼 색상 */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .product-button:hover {
            background-color: #218838; /* 변경된 호버 색상 */
        }
    </style>
</head>
<body>

            <div class="header">
     <div class="logo-section">
            <!-- '92m.com' 텍스트에 하이퍼링크 추가 -->
            <a href="index.html" style="text-decoration: none; color: black;">
                <span class="logo-text">92m.com</span>
            </a>
        </div>

        <nav>
            <form action="/login">
                <input type="submit" value="SIGN IN" style="background-color: #333;">
            </form>
            <form action="/createuser">
                <input type="submit" value="JOIN US" style="background-color: #333;">
            </form>
        </nav>
    </div>



    <!-- 룰렛돌리기 이벤트 버튼 -->
    <div style="text-align: center; margin-top: 20px;">
        <form action="/roulette">
            <input type="submit" class="button roulette-btn" value="ROULETTE EVENT" style="background-color: #333;">
       </form>
    </div>

       </form>
    </div>

    <div class="product-grid">
<?php
// 데이터베이스 연결
$db = new mysqli('192.168.43.2', 'root', '1234', 'SHOP');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// 상품 ID 가져오기
$productId = isset($_GET['id']) ? intval($_GET['id']) : 1;

// 해당 상품 정보 가져오기
$sql = "SELECT PD_ID, PD_NAME, PD_PRICE, PD_DESC FROM product WHERE PD_ID = $productId";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Product container
    echo "<div class='product-container'>";

    // Product image
    echo "<div class='product-image'>";
    echo "<img src='/img/" . $row["PD_ID"] . ".jpg' alt='Image'>";

    echo "</div>";

    // Product details
    echo "<div class='product-details'>";
    echo "<h1>" . htmlspecialchars($row["PD_NAME"], ENT_QUOTES, 'UTF-8') . "</h1>";
    echo "<p>가격: " . number_format($row["PD_PRICE"]) . "원</p>";
    echo "<p>설명: " . htmlspecialchars($row["PD_DESC"], ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p>배송정보: 일반 출고 3일 이내 출고 (주말, 공휴일 제외)</p>";
    echo "<p>배송비: 해당 브랜드 제품은 무료배송. 제주도 및 도서/산간지역은 추가배송비 6,000원</p>";
    echo "<button class='product-button' style='background-color: #333;'>CART</button>";
    echo "<button class='product-button' style='background-color: #333;'>BUY NOW</button>";
    echo "</div>";

    // End of product container
    echo "</div>";

} else {
    echo "상품 정보를 찾을 수 없습니다.";
}

$db->close();
?>
</div>


</body>
</html>

