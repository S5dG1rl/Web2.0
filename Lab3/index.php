<?php
if (!isset($_GET['store'])) {
    $_GET['store'] = '';
}
if (!isset($_GET['count'])) {
    $_GET['count'] = 0;
}
if (isset($_GET['key'])) {
    if ($_GET['key'] === 'reset') {
        $_GET['store'] = '';
    } else {
        $_GET['store'] .= $_GET['key'];
        $_GET['count']++;
    }
}
$result = $_GET['store'];
$clicks = (int)$_GET['count'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Виртуальная клавиатура</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f5f5;
        }
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        header h1 {
            font-size: 24px;
        }
        
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        
        .result-container {
            width: 100%;
            max-width: 400px;
            margin-bottom: 30px;
        }
        
        .result {
            width: 100%;
            min-height: 80px;
            padding: 20px;
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            background: #fff;
            border: 3px solid #2c3e50;
            border-radius: 8px;
            word-wrap: break-word;
        }
        
        .keyboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        
        .keyboard-row {
            display: flex;
            gap: 10px;
        }
        
        .keyboard a {
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            text-decoration: none;
            color: #2c3e50;
            font-weight: bold;
            font-size: 20px;
            background: #ecf0f1;
            border: 2px solid #2c3e50;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .keyboard a:hover {
            background: #bdc3c7;
            transform: translateY(-2px);
        }
        
        footer {
            background-color: #34495e;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Виртуальная клавиатура</h1>
    </header>
    
    <main>
        <div class="result-container">
            <div class="result"><?php echo htmlspecialchars($result); ?></div>
        </div>

        <div class="keyboard">
            <div class="keyboard-row">
                <a href="?key=1&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">1</a>
                <a href="?key=2&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">2</a>
                <a href="?key=3&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">3</a>
                <a href="?key=4&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">4</a>
                <a href="?key=5&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">5</a>
            </div>
            <div class="keyboard-row">
                <a href="?key=6&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">6</a>
                <a href="?key=7&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">7</a>
                <a href="?key=8&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">8</a>
                <a href="?key=9&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">9</a>
                <a href="?key=0&store=<?php echo urlencode($result); ?>&count=<?php echo $clicks; ?>">0</a>
            </div>
            <div class="keyboard-row">
                <a href="?key=reset&store=&count=<?php echo $clicks; ?>">СБРОС</a>
            </div>
        </div>
    </main>
    
    <footer>
        Всего нажатий: <?php echo $clicks; ?>
    </footer>
</body>
</html>
