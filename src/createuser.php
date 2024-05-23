<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New 92M User!</title>
    <style>
        /* 공통 CSS 스타일 */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }
               .logo-text {
            font-size: 50px; /* 크고 두드러진 글씨 */
            font-weight: bold; /* 볼드체 */
        }

        .header {
            display: flex;
            flex-direction: row; /* 행 방향으로 요소를 배치 */
            align-items: center; /* 요소를 세로축 중앙에 배치 */
            justify-content: space-around; /* 요소를 양쪽에 공간을 두고 배치 */
            margin-bottom: 20px; /* 아래쪽 여백 추가 */
        }

        .header img {
            width: 200px; /* 이미지 크기 조정 */
            height: auto; /* 이미지 높이는 자동 조절 */
        }

        form {
            background-color: #eaeaea;
            padding: 40px; /* 폼의 패딩을 늘림 */
            border-radius: 10px;
            display: inline-block;
        }
        h1 {
            color: #333;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            display: block; /* 새로운 줄에서 시작 */
            width: 200px; /* 입력 필드 너비 조정 */
            margin-left: auto;
            margin-right: auto;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block; /* 새로운 줄에서 시작 */
            margin: 20px auto; /* 중앙 정렬 */
        }
        input[type="submit"], .login-button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block; /* 새로운 줄에서 시작 */
            margin: 20px auto; /* 중앙 정렬 */
        }
        input[type="submit"]:hover, .login-button:hover {
            background-color: #555;
        }
        .login-button {
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
       input[type="submit"]:hover {
            background-color: #555;
        }
        label {
            display: block; /* 새로운 줄에서 시작 */
            margin: 10px auto; /* 중앙 정렬 */
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .image-container {
            flex: 1; /* 이미지 컨테이너와 텍스트 컨테이너가 같은 크기를 갖도록 설정 */
            max-width: 50%; /* 이미지의 최대 너비 제한 */
            padding: 10px; /* 여백 추가 */
        }

        .image-container img {
            width: 100%; /* 이미지가 컨테이너의 전체 너비를 차지하도록 설정 */
            height: auto; /* 높이는 자동으로 설정 */
        }

        .text-container {
            flex: 1; /* 이미지 컨테이너와 동일한 크기 */
            padding: 10px; /* 여백 추가 */
        }
    </style>
</head>
<body>

<div class="content-wrapper">
    <div class="image-container">
        <img src="main.jpg" alt="Main Image">
    </div>
    <div class="text-container">

    <div class="header">
     <div class="logo-section">
            <!-- '92m.com' 텍스트에 하이퍼링크 추가 -->
            <a href="index.html" style="text-decoration: none; color: black;">
                <span class="logo-text">92m.com</span>
            </a>
        </div>

        <nav>

        </nav>
    </div>


<h1>COME AND JOIN US! 92M</h1>


<!-- PHP 사용자 생성 로직 -->
<?php
$userCreated = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
<<<<<<< HEAD
    $db = new mysqli('rds_endpoint', 'username', 'password', 'db_name');
    if ($db->connect_error) {
        die('Connection Failed: ' . $db->connect_error);
    }

    // 사용자 입력을 준비된 문장을 사용하여 처리
    $stmt = $db->prepare("SELECT ID FROM user WHERE ID = ?");
    $stmt->bind_param("s", $_POST['ID']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p>User Exists!</p>";
    } else {
        $stmt = $db->prepare("INSERT INTO user (ID, PW) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['ID'], $_POST['PW']);
        $result = $stmt->execute();

=======
    $db = new mysqli('${rds_endpoint}', '${username}', '${password}', '${db_name}');
    if($db->connect_error){
        die('Not Connected : ' . $db->connect_error);
    }

    $sql2 = "SELECT ID FROM user WHERE ID='$_POST[ID]'";
    $result2 = $db->query($sql2);
    if ($result2->num_rows !== 0) {
        echo "<p>User Exists!</p>";
    } else {
        $sql = "INSERT INTO user (ID, PW) VALUES ('$_POST[ID]', '$_POST[PW]')";
        $result = $db->query($sql);
>>>>>>> 0c2aaa7d5ac779e56ceadcd44b3a91b2ca54d666
        if ($result) {
            $userCreated = true;
            echo '<p>List of users</p>';
            echo "-------------------------------------------------------";

<<<<<<< HEAD
            // 데이터 조회
            $query = $db->prepare("SELECT ID, PW FROM user");
            $query->execute();
            $result = $query->get_result();

            while ($row = $result->fetch_assoc()) {
                echo '<p>ID : ' . htmlspecialchars($row['ID']) . '&emsp;&emsp;' . 'PW : ' . htmlspecialchars($row['PW']) . '</p>';
            }
        } else {
            echo "<p>Error: " . $db->error . "</p>";
=======
            // 결과를 확인하는 새로운 데이터베이스 연결
            $conn = new mysqli('${rds_endpoint}', '${username}', '${password}', '${db_name}');
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<p>ID : ' . $row['ID'] . '&emsp;&emsp;' . 'PW : ' . $row['PW'] . '</p>';
            }
        } else {
            echo "<p>ERROR</p>";
>>>>>>> 0c2aaa7d5ac779e56ceadcd44b3a91b2ca54d666
        }
    }
}
?>

<!-- 회원 가입 폼 -->
<?php if (!$userCreated): ?>
    <form action="" method="post">
<<<<<<< HEAD
        <label for="ID">ACCOUNT ID:</label>
        <input type="text" name="ID" id="ID">

        <label for="PW">ACCOUNT PASSWORD:</label>
        <input type="password" name="PW" id="PW">
=======
        <label for="ID">ACCOUNT ID :</label>
        <input type="text" name="ID">

        <label for="PW">ACCOUNT PASSWORD :</label>
        <input type="password" name="PW">
>>>>>>> 0c2aaa7d5ac779e56ceadcd44b3a91b2ca54d666

        <input type="submit" value="JOIN US">
    </form>
<?php else: ?>
    <a href="user_index.html" class="login-button">SIGN IN</a>
<?php endif; ?>

<<<<<<< HEAD
</div>
</div>

</body>
</html>
=======
    </div>
</div>

</body>
</html>
>>>>>>> 0c2aaa7d5ac779e56ceadcd44b3a91b2ca54d666
