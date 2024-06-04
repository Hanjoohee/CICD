<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    width: 200px; /* 이미지 크기 증가 */
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

/* 나머지 기존 CSS 스타일 유지 */


    </style>
</head>
<body>


<div class="content-wrapper">
    <div class="image-container">
        <img src="https://hjh-web-bucket.s3.ap-southeast-2.amazonaws.com/main.jpg" alt="Main Image">
    </div>
    <div class="text-container">

        <div class="header">
     <div class="logo-section">
            <!-- 'Millipresso.com' 텍스트에 하이퍼링크 추가 -->
            <a href="index.html" style="text-decoration: none; color: black;">
                <span class="logo-text">Millipresso.com</span>
            </a>
        </div>

        <nav>

        </nav>
    </div>


<h1>Do You Have a Millipresso Account? It's Version 2</h1>

    <form action="" method="post">
        <label for="ID">ACCOUNT ID :</label>
        <input type="text" name="ID">

        <label for="PW">ACCOUNT PW :</label>
        <input type="password" name="PW">

        <input type="submit" value="SIGN IN">
    </form>
    </div>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

   $db = new mysqli('hjh-rds.cbo8ukgsqfni.ap-southeast-2.rds.amazonaws.com', 'rootroot', 'rootroot', 'SHOP');

   if($db->connect_error){
      die('Not Connected : ' . $db->connect_error);
   }

   $query = "select ID, PW from user where ID='$_POST[ID]' && PW='$_POST[PW]'";

   $result = $db->query($query);
   if($result->num_rows !== 0){
      header("location: user_index.html");
   }
   else{
      echo "NO USER INFORMATION.";
   }
}
?>

</body>
</html>