<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Левин И. О. | 241-352 | ЛР №2, Вариант 5</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Логотип университета">
        </div>
        <div class="header-info">
            <strong>Левин И. О.</strong> | 241-352 | ЛР №2, Вариант 5
        </div>
    </header>

    <main>
        <?php
        // 1. Инициализация числовых переменных
        $start_value = -10;      // начальное значение аргумента
        $count = 10000;          // количество вычислений
        $step = 2;               // шаг изменения аргумента
        $min_stop = -50.0;       // остановка при f(x) < min_stop
        $max_stop = 500.0;       // остановка при f(x) > max_stop
        
        // 2. Инициализация типа верстки
        $type = 'D';
        
        // Инициализация переменных для статистики
        $sum = 0;
        $valid_count = 0;
        $min_value = null;
        $max_value = null;
        
        $x = $start_value;
        
        // Вывод начала таблицы для типа D
        if ($type == 'D') {
            echo '<table>';
            echo '<tr><th>№</th><th>Аргумент (x)</th><th>Значение (f(x))</th></tr>';
        }
        
        // 3. Цикл с предусловием для вычисления функции
        $i = 0;
        $f = 0;
        
        while ($i < $count && ($f <= $max_stop && $f >= $min_stop || $i == 0)) {
            // Вычисление функции согласно варианту 5
            if ($x <= 10) {
                // f(x) = 3·x + 9
                $f = 3 * $x + 9;
            } elseif ($x > 10 && $x < 20) {
                // f(x) = (x+3)/(x²-121)
                $denominator = $x * $x - 121;
                if ($denominator == 0) {
                    $f = 'error';
                } else {
                    $f = ($x + 3) / $denominator;
                }
            } else { // x >= 20
                // f(x) = 4·x² - 11
                $f = 4 * $x * $x - 11;
            }
            
            // Округление до 3 знаков после запятой (если не error)
            if ($f !== 'error') {
                $f = round($f, 3);
                
                // Обновление статистики
                $valid_count++;
                $sum += $f;
                
                if ($min_value === null || $f < $min_value) {
                    $min_value = $f;
                }
                if ($max_value === null || $f > $max_value) {
                    $max_value = $f;
                }
            }
            
            // 5. Вывод в зависимости от типа верстки
            if ($type == 'D') {
                echo '<tr><td>' . ($i + 1) . '</td><td>' . $x . '</td><td>' . $f . '</td></tr>';
            }
            
            $x += $step;
            $i++;
        }
        
        // Закрытие таблицы
        if ($type == 'D') {
            echo '</table>';
        }
        
        // 6. Вывод статистики
        if ($valid_count > 0) {
            $average = round($sum / $valid_count, 3);
            echo '<div class="statistics">';
            echo '<h3>Статистика вычислений:</h3>';
            echo '<p>Минимальное значение: <strong>' . $min_value . '</strong></p>';
            echo '<p>Максимальное значение: <strong>' . $max_value . '</strong></p>';
            echo '<p>Сумма всех значений: <strong>' . round($sum, 3) . '</strong></p>';
            echo '<p>Среднее арифметическое: <strong>' . $average . '</strong></p>';
            echo '<p>Количество вычислений: <strong>' . $valid_count . '</strong></p>';
            echo '</div>';
        }
        ?>
    </main>

    <footer>
        Тип верстки: <?php echo $type; ?>
    </footer>
</body>
</html>
