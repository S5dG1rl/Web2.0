<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Левин И. О. | 241-352 | ЛР №7: Результат сортировки</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f0f4f8; color: #0f172a; min-height: 100vh; display: flex; flex-direction: column; padding-top: 80px; padding-bottom: 60px; }
        header { position: fixed; top: 0; left: 0; right: 0; height: 80px; background: #1e3a8a; color: #fff; display: flex; align-items: center; padding: 0 20px; gap: 20px; z-index: 100; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        header .logo img { height: 60px; width: auto; }
        header .header-info { font-size: 16px; }
        main { flex: 1; max-width: 900px; margin: 20px auto; padding: 30px; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        footer { position: fixed; bottom: 0; left: 0; right: 0; height: 50px; background: #475569; color: #cbd5e1; display: flex; align-items: center; justify-content: center; font-size: 14px; z-index: 100; }
        h2 { color: #1e40af; margin: 20px 0 10px; border-bottom: 2px solid #dbeafe; padding-bottom: 5px; }
        .info { margin-bottom: 15px; line-height: 1.6; }
        .array-display { background: #f8fafc; padding: 10px; border-left: 4px solid #3b82f6; margin: 5px 0; font-family: monospace; }
        .iteration { margin: 4px 0; color: #334155; }
        .success { color: #059669; font-weight: bold; }
        .error { color: #dc2626; font-weight: bold; }
        .final { margin-top: 20px; padding: 15px; background: #eff6ff; border-radius: 6px; border-left: 4px solid #1e40af; }
    </style>
</head>
<body>
    <header>
        <div class="logo"><img src="logo.png" alt="Logo"></div>
        <div class="header-info"><strong>Левин И. О.</strong> | Группа 241-352 | Лабораторная работа №7: Результат сортировки</div>
    </header>

    <main>
        <?php
        if (!isset($_POST['element0'])) {
            echo '<div class="error">Массив не задан, сортировка невозможна.</div>';
            exit;
        }

        $count = (int)$_POST['arrLength'];
        $arr = [];
        $isValid = true;

        for ($i = 0; $i < $count; $i++) {
            $val = trim($_POST['element' . $i]);
            if ($val === '' || !is_numeric($val)) {
                $isValid = false;
                break;
            }
            $arr[] = (float)$val;
        }

        if (!$isValid) {
            echo '<div class="error">Ошибка: все элементы массива должны быть числами.</div>';
            exit;
        }

        $algo = $_POST['algorithm'];
        $algoNames = [
            'selection' => 'Сортировка выбором',
            'bubble' => 'Пузырьковый алгоритм',
            'shell' => 'Алгоритм Шелла',
            'gnome' => 'Алгоритм садового гнома',
            'quick' => 'Быстрая сортировка',
            'builtin' => 'Встроенная функция PHP (sort)'
        ];

        echo '<h2>Алгоритм: ' . $algoNames[$algo] . '</h2>';
        echo '<div class="info"><strong>Исходный массив:</strong> [' . implode(', ', $arr) . ']</div>';
        echo '<div class="info success">Валидация пройдена успешно.</div>';
        echo '<h2>Ход выполнения:</h2>';

        $iterations = 0;
        $startTime = microtime(true);

        switch ($algo) {
            case 'selection':
                selectionSort($arr, $iterations);
                break;
            case 'bubble':
                bubbleSort($arr, $iterations);
                break;
            case 'shell':
                shellSort($arr, $iterations);
                break;
            case 'gnome':
                gnomeSort($arr, $iterations);
                break;
            case 'quick':
                quickSortWrapper($arr, $iterations);
                break;
            case 'builtin':
                builtinSort($arr, $iterations);
                break;
        }

        $endTime = microtime(true);
        $time = $endTime - $startTime;

        echo '<div class="final success">Сортировка завершена, проведено ' . $iterations . ' итераций. Сортировка заняла ' . number_format($time, 6) . ' секунд.</div>';
        echo '<div class="info"><strong>Отсортированный массив:</strong> [' . implode(', ', $arr) . ']</div>';
        ?>
    </main>

    <footer>Обработка и сортировка | <?php echo date('d.m.Y H:i:s'); ?></footer>

    <?php
    function showState(&$arr, &$iter) {
        $iter++;
        echo '<div class="iteration">Итерация ' . $iter . ': [' . implode(', ', $arr) . ']</div>';
    }

    function selectionSort(&$arr, &$iter) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            $minIdx = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($arr[$j] < $arr[$minIdx]) {
                    $minIdx = $j;
                }
            }
            if ($minIdx != $i) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$minIdx];
                $arr[$minIdx] = $temp;
            }
            showState($arr, $iter);
        }
    }

    function bubbleSort(&$arr, &$iter) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
            showState($arr, $iter);
        }
    }

    function shellSort(&$arr, &$iter) {
        $n = count($arr);
        for ($gap = intdiv($n, 2); $gap > 0; $gap = intdiv($gap, 2)) {
            for ($i = $gap; $i < $n; $i++) {
                $temp = $arr[$i];
                $j = $i;
                while ($j >= $gap && $arr[$j - $gap] > $temp) {
                    $arr[$j] = $arr[$j - $gap];
                    $j -= $gap;
                }
                $arr[$j] = $temp;
                showState($arr, $iter);
            }
        }
    }

    function gnomeSort(&$arr, &$iter) {
        $n = count($arr);
        $i = 1;
        while ($i < $n) {
            if ($i == 0 || $arr[$i - 1] <= $arr[$i]) {
                $i++;
            } else {
                $temp = $arr[$i];
                $arr[$i] = $arr[$i - 1];
                $arr[$i - 1] = $temp;
                $i--;
            }
            showState($arr, $iter);
        }
    }

    function quickSortRecursive(&$arr, $left, $right, &$iter) {
        if ($left >= $right) return;
        $pivot = $arr[intdiv($left + $right, 2)];
        $l = $left;
        $r = $right;
        while ($l <= $r) {
            while ($arr[$l] < $pivot) $l++;
            while ($arr[$r] > $pivot) $r--;
            if ($l <= $r) {
                $temp = $arr[$l];
                $arr[$l] = $arr[$r];
                $arr[$r] = $temp;
                $l++;
                $r--;
            }
        }
        showState($arr, $iter);
        quickSortRecursive($arr, $left, $r, $iter);
        quickSortRecursive($arr, $l, $right, $iter);
    }

    function quickSortWrapper(&$arr, &$iter) {
        quickSortRecursive($arr, 0, count($arr) - 1, $iter);
    }

    function builtinSort(&$arr, &$iter) {
        sort($arr);
        showState($arr, $iter);
    }
    ?>
</body>
</html>
