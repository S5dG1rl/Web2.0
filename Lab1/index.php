<?php
// Переменная для заголовка страницы
$page_title = "Иванов И.И., Группа ИТ-101, ЛР-1";
// Определение чётности секунды для фотографий
$second = (int)date('s');
$photo = ($second % 2 === 0) ? 'foto1.jpg' : 'foto2.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style>
        header, footer { position: fixed; left: 0; right: 0; height: 50px; }
        header { background: #006400; color: #fff; top: 0; }
        footer { background: #333; color: #ccc; bottom: 0; }
        .menu a { margin: 0 10px; }
        .menu a.active { font-weight: bold; color: #ff0; }
    </style>
</head>
<body>
<header>
    <nav class="menu">
        <?php echo '<a href="page1.php" class="active">'; ?>Главная<?php echo '</a>'; ?>
        <?php echo '<a href="page2.php">'; ?>О нас<?php echo '</a>'; ?>
        <?php echo '<a href="page3.php">'; ?>Контакты<?php echo '</a>'; ?>
    </nav>
</header>

<main style="padding-top: 70px; padding-bottom: 70px;">
    <h1>Заголовок страницы</h1>
    <h2>Подзаголовок 1</h2>
    <p><?php echo str_repeat("Текст объемом более 1Кб для соответствия требованиям задания. ", 50); ?></p>
    <h2>Подзаголовок 2</h2>
    <img src="images/<?php echo $photo; ?>" alt="Динамическое фото">
    <img src="images/foto_static.jpg" alt="Статическое фото">

    <?php
    echo '<table border="1">';
    // Первая строка полностью формируется PHP
    echo '<tr><td>Ячейка 1</td><td>Ячейка 2</td><td>Ячейка 3</td></tr>';
    // Вторая строка: теги статичны, содержимое динамично
    echo '<tr><td>'; echo 'Данные 1'; echo '</td><td>'; echo 'Данные 2'; echo '</td><td>'; echo 'Данные 3'; echo '</td></tr>';
    echo '</table>';
    ?>
</main>

<footer>
    <?php echo 'Сформировано ' . date('d.m.Y') . ' в ' . date('H:i:s'); ?>
</footer>
</body>
</html>