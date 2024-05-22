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
        .header nav input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .header nav input[type="submit"]:hover {
            background-color: #555;
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
	transition: transform 0.3s ease;
        }
        .product:hover {
            transform: scale(1.05); /* 마우스 오버 시 확대 */
        }
        .product img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 10px;
            transition: all 0.3s ease;
        }
        .product img:hover {
            opacity: 0.8; /* 이미지에 마우스 오버 시 투명도 변경 */
        }
         .product-info .name {
            font-size: 20px; /* 큰 글씨 */
            font-weight: bold; /* 볼드체 */
            color: #333; /* 짙은 회색 */
        display: block; /* 각 항목을 블록 요소로 만들어 줄바꿈 처리 */
        margin-bottom: 5px; /* 항목 간 간격 추가 */
        }

        .product-info .price {
            font-size: 16px; /* 중간 글씨 */
            color: red; /* 가격은 빨간색 */
            font-weight: bold; /* 볼드체 */
        display: block; /* 각 항목을 블록 요소로 만들어 줄바꿈 처리 */
        margin-bottom: 5px; /* 항목 간 간격 추가 */
        }

        .product-info .description {
            font-size: 12px; /* 작은 글씨 */
            color: #555; /* 중간 회색 */
        display: block; /* 각 항목을 블록 요소로 만들어 줄바꿈 처리 */
        margin-bottom: 5px; /* 항목 간 간격 추가 */
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
                <input type="submit" value="SIGN IN">
            </form>
            <form action="/createuser">
                <input type="submit" value="JOIN US">
            </form>
            </nav>
    </div>

     <!-- 룰렛돌리기 이벤트 버튼 -->
    <div style="text-align: center; margin-top: 20px;">
        <form action="/roulette">
<input type="submit" class="button roulette-btn" value="ROULETTE EVENT" style="background-color: #333; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
	</form>
    </div>


<div class="product-grid">
    <?php
            // 데이터베이스 연결
<<<<<<< HEAD
            $db = new mysqli('${rds_endpoint}', '${username}', '${password}', '${db_name}');
=======
            $db = new mysqli('${rds_endpoint}', 'rootroot', 'rootroot', 'SHOP');
>>>>>>> 63db5b665836589ecc280393dfafb73879b8ea2a
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // 상품 목록 가져오기
            $sql = "SELECT PD_ID, PD_NAME, PD_PRICE, PD_DESC FROM product";
            $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<a href='/product?id=" . $row["PD_ID"] . "'>";
                echo "<img src='/img/" . $row["PD_ID"] . ".jpg' alt='상품 " . htmlspecialchars($row["PD_NAME"], ENT_QUOTES, 'UTF-8') . "'>";
                echo "<div class='product-info'>";
                // 상품명
                echo "<div class='name'>" . htmlspecialchars($row["PD_NAME"], ENT_QUOTES, 'UTF-8') . "</div>";
                // 가격
                echo "<div class='price'>" . number_format($row["PD_PRICE"]) . "원</div>";
                // 설명
                echo "<div class='description'>" . htmlspecialchars($row["PD_DESC"], ENT_QUOTES, 'UTF-8') . "</div>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "상품이 존재하지 않습니다.";
        }
        // 데이터베이스 연결 종료 코드 ...
    ?>
</div>


</body>
</html>

