<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <form method="post" action="">
            <input type="text" name="display" id="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : ''; ?>" disabled>
            <div class="buttons">
                <button type="button" onclick="appendNumber('1')">1</button>
                <button type="button" onclick="appendNumber('2')">2</button>
                <button type="button" onclick="appendNumber('3')">3</button>
                <button type="button" onclick="appendNumber('4')">4</button>
                <button type="button" onclick="appendNumber('5')">5</button>
                <button type="button" onclick="appendNumber('6')">6</button>
                <button type="button" onclick="appendNumber('7')">7</button>
                <button type="button" onclick="appendNumber('8')">8</button>
                <button type="button" onclick="appendNumber('9')">9</button>
                <button type="button" onclick="appendNumber('0')">0</button>
                <button type="button" onclick="appendOperator('+')">+</button>
                <button type="button" onclick="appendOperator('-')">-</button>
                <button type="button" onclick="appendOperator('*')">*</button>
                <button type="button" onclick="appendOperator('/')">/</button>
                <button type="button" onclick="clearDisplay()">C</button>
                <button type="submit" name="calculate">=</button>
            </div>
        </form>

        <?php
        if (isset($_POST['calculate'])) {
            $expression = $_POST['display'];
            try {
                $result = eval("return $expression;");
                echo "<script>document.getElementById('display').value = '$result';</script>";
            } catch (Exception $e) {
                echo "<script>document.getElementById('display').value = 'Error';</script>";
            }
        }
        ?>

        <script>
            function appendNumber(number) {
                let display = document.getElementById('display');
                display.value += number;
            }

            function appendOperator(operator) {
                let display = document.getElementById('display');
                display.value += ' ' + operator + ' ';
            }

            function clearDisplay() {
                let display = document.getElementById('display');
                display.value = '';
            }
        </script>
    </div>
</body>
</html>