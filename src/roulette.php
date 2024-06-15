<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Launch Celebration Roulette Event</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }
        #rouletteContainer {
            position: relative;
        }
        #roulette {
            width: 400px;
            height: 400px;
            border-radius: 50%;
            border: 5px solid #FFC0CB;
            margin: 20px auto;
            position: relative;
            background-color: #FFC0CB;
        }
        .roulette-section {
            width: 50%;
            height: 50%;
            position: absolute;
            bottom: 50%;
            left: 50%;
            transform-origin: 0% 100%;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }
        .roulette-button {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: white;
            border: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* 중앙에 위치시키는 핵심 코드 */
            cursor: pointer;
        }
        .title {
            color: #FF69B4;
            font-size: 36px;
            margin-bottom: 15px;
        }
        .winner-banner {
            display: none;
            margin-top: 20px;
        }
        .prize-button {
            display: none;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div id="rouletteContainer">
        <h2 class="title">Lucky Blast!</h2>
        <div id="roulette">
            <?php
                for ($i = 1; $i <= 6; $i++) {
                    $angle = ($i - 1) * 60;
                    echo "<div class='roulette-section' style='transform: rotate(" . $angle . "deg);'>";
                    echo "<div style='transform: rotate(-" . $angle . "deg); line-height: 200px;'>" . $i . "</div>";
                    echo "</div>";
                }
            ?>
        </div>
        <button class="roulette-button" id="startButton">START</button>
        <button class="roulette-button" id="stopButton" style="display: none;">STOP</button>
        <div class="winner-banner" id="winnerBanner"></div>
        <button class="prize-button" id="prizeButton">Get a Prize!</button>
    </div>

    <script>
        var roulette = document.getElementById('roulette');
        var startButton = document.getElementById('startButton');
        var stopButton = document.getElementById('stopButton');
        var winnerBanner = document.getElementById('winnerBanner');
        var prizeButton = document.getElementById('prizeButton');
        var currentRotation = 0;
        var rotationSpeed = 0;
        var spinning = false;
        var interval;

        startButton.onclick = function() {
            if (!spinning) {
                spinning = true;
                rotationSpeed = 6; // 속도 증가
                interval = setInterval(spinRoulette, 100);
                startButton.style.display = 'none';
                stopButton.style.display = 'block';
            }
        };

        stopButton.onclick = function() {
            if (spinning) {
                decreaseSpeed();
            }
        };

        function spinRoulette() {
            currentRotation += rotationSpeed;
            roulette.style.transform = 'rotate(' + currentRotation + 'deg)';
        }

        function decreaseSpeed() {
            if (rotationSpeed > 0) {
                rotationSpeed -= 0.2;
                setTimeout(decreaseSpeed, 100);
            } else {
                clearInterval(interval);
                spinning = false;
                finalResult();
            }
        }

        function finalResult() {
            var degrees = currentRotation % 360;
            var winningNumber = Math.floor(degrees / 60) + 1;
            showWinner(winningNumber);
        }

        function showWinner(number) {
            winnerBanner.innerHTML = 'Winning Number: ' + number;
            winnerBanner.style.display = 'block';
            prizeButton.style.display = 'block';
        }

        prizeButton.onclick = function() {
            alert('Congratulations! Have a great day!');
            winnerBanner.style.display = 'none';
            prizeButton.style.display = 'none';
            resetGame();
        };

        function resetGame() {
            currentRotation = 0;
            roulette.style.transform = 'rotate(0deg)';
            startButton.style.display = 'block';
            stopButton.style.display = 'none';
        }
    </script>
</body>
</html>


