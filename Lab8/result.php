<?php
// Функция подсчета вхождений каждого символа (без учета регистра)
function test_symbs($text) {
    $symbs = [];
    $l_text = strtolower($text);
    for ($i = 0; $i < strlen($l_text); $i++) {
        $c = $l_text[$i];
        $symbs[$c] = ($symbs[$c] ?? 0) + 1;
    }
    return $symbs;
}

// Основная функция анализа текста
function test_it($text) {
    $len = strlen($text);
    $digits = $letters = $upper = $lower = $punct = 0;
    $words = [];
    $word = '';

    // Знаки препинания
    $punct_marks = ['.', ',', '!', '?', ';', ':', '-', '(', ')', '"', "'", '[', ']'];

    for ($i = 0; $i < $len; $i++) {
        $c = $text[$i];
        $ord = ord($c);
        
        // Цифры 0-9
        if ($ord >= 48 && $ord <= 57) {
            $digits++;
        }
        // Кириллица CP1251: заглавные 192-223, строчные 224-255
        elseif (($ord >= 192 && $ord <= 223) || ($ord >= 224 && $ord <= 255)) {
            $letters++;
            if ($ord >= 192 && $ord <= 223) {
                $upper++;
            } else {
                $lower++;
            }
        }
        // Латиница: A-Z 65-90, a-z 97-122
        elseif (($ord >= 65 && $ord <= 90) || ($ord >= 97 && $ord <= 122)) {
            $letters++;
            if ($ord >= 65 && $ord <= 90) {
                $upper++;
            } else {
                $lower++;
            }
        }
        // Знаки препинания
        elseif (in_array($c, $punct_marks)) {
            $punct++;
        }

        // Разбиение на слова
        if ($c == ' ' || in_array($c, $punct_marks)) {
            if ($word != '') {
                $wl = strtolower($word);
                $words[$wl] = ($words[$wl] ?? 0) + 1;
                $word = '';
            }
        } else {
            $word .= $c;
        }
    }
    
    // Последнее слово
    if ($word != '') {
        $wl = strtolower($word);
        $words[$wl] = ($words[$wl] ?? 0) + 1;
    }

    ksort($words);
    $symbs = test_symbs($text);
    ksort($symbs);

    // Вывод таблицы
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    $stats = [
        "Символов (с пробелами)" => $len,
        "Букв" => $letters,
        "Заглавных букв" => $upper,
        "Строчных букв" => $lower,
        "Знаков препинания" => $punct,
        "Цифр" => $digits,
        "Слов" => count($words)
    ];

    foreach ($stats as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }

    echo '<tr><td colspan="2"><b>Вхождения символов:</b> ';
    foreach ($symbs as $s => $c) {
        echo iconv("CP1251", "UTF-8", $s) . ":$c ";
    }
    echo '</td></tr>';

    echo '<tr><td colspan="2"><b>Вхождения слов:</b> ';
    foreach ($words as $w => $c) {
        echo iconv("CP1251", "UTF-8", $w) . ":$c ";
    }
    echo '</td></tr></table>';
}

if (!empty($_POST['data'])) {
    echo '<div style="color: blue; font-style: italic;">' . htmlspecialchars($_POST['data']) . '</div>';
    $text_cp = iconv("UTF-8", "CP1251//IGNORE", $_POST['data']);
    test_it($text_cp);
    echo '<br><a href="index.html">Другой анализ</a>';
} else {
    echo '<div>Нет текста для анализа</div><br><a href="index.html">Другой анализ</a>';
}
?>
