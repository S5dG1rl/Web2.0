<?php
$page_title = "Левин, 241-352, ЛР-1";
$sec = (int)date('s');
$photo = ($sec % 2 === 0) ? 'foto1.jpg' : 'foto2.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; padding: 60px 0; }
        header { position: fixed; top: 0; left: 0; right: 0; height: 50px; background: #006400; color: #fff; display: flex; align-items: center; padding: 0 20px; box-sizing: border-box; }
        footer { position: fixed; bottom: 0; left: 0; right: 0; height: 50px; background: #333; color: #ccc; display: flex; align-items: center; padding: 0 20px; box-sizing: border-box; }
        .menu a { color: #fff; text-decoration: none; margin-right: 15px; }
        .menu a:hover { text-decoration: underline; }
        .menu a.active { color: #ffeb3b; font-weight: bold; }
        main { max-width: 900px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        td, th { border: 1px solid #888; padding: 10px; text-align: center; }
        img { max-width: 100%; height: auto; }
    </style>
</head>
<body>

<header>
    <nav class="menu">
        <a href="<?php $link='page1.php'; echo $link; ?>"<?php $current=true; if($current) echo ' class="active"'; ?>><?php $name='Главная'; echo $name; ?></a>
        <a href="<?php $link='page2.php'; echo $link; ?>"<?php $current=false; if($current) echo ' class="active"'; ?>><?php $name='Лада Гранта'; echo $name; ?></a>
        <a href="<?php $link='page3.php'; echo $link; ?>"<?php $current=false; if($current) echo ' class="active"'; ?>><?php $name='Лада Веста'; echo $name; ?></a>
    </nav>
</header>

<main>
    <h1>Отечественные автомобили Лада</h1>
    
    <h2>Современный российский автопром</h2>
    <p>
        Автомобили марки Лада являются одними из самых популярных в России. 
        За последние годы компания АвтоВАЗ значительно модернизировала производство, 
        внедрив новые технологии и улучшив качество сборки. Современные модели Лада 
        отличаются надежностью, доступной ценой и хорошей адаптацией к российским 
        дорожным условиям. В данном проекте мы рассмотрим две самые популярные модели: 
        Ладу Гранту и Ладу Весту, которые завоевали любовь миллионов российских водителей.
        Эти автомобили представляют собой разные сегменты рынка: Гранта относится к 
        бюджетному классу, а Веста позиционируется как автомобиль более высокого класса 
        с улучшенными характеристиками комфорта и безопасности.
    </p>
    
    <h2>Сравнительная характеристика моделей</h2>
    <p>
        Обе модели имеют свои преимущества и недостатки. Гранта отличается простотой 
        конструкции, дешевизной обслуживания и доступностью запчастей. Веста же предлагает 
        более современный дизайн, улучшенную шумоизоляцию и богатое оснащение. Выбор между 
        этими автомобилями зависит от требований покупателя и его финансовых возможностей.
        Важно отметить, что обе модели постоянно совершенствуются производителем.
    </p>

    <img src="images/<?php echo $photo; ?>" alt="Автомобиль Лада" style="width:300px; margin:10px;">
    <img src="images/foto_static.jpg" alt="Лада" style="width:300px; margin:10px;">

    <table>
    <?php
    echo '<tr><td>Модель</td><td>Класс</td><td>Цена</td></tr>';
    ?>
    <tr>
        <td><?php echo 'Гранта'; ?></td>
        <td><?php echo 'B-класс'; ?></td>
        <td><?php echo 'от 500 тыс. руб.'; ?></td>
    </tr>
    </table>
</main>

<footer>
    Сформировано <?php echo date('d.m.Y'); ?> в <?php echo date('H:i:s'); ?>
</footer>

</body>
</html>