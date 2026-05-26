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
    </style>
</head>
<body>

<header>
    <nav class="menu">
        <a href="<?php $link='page1.php'; echo $link; ?>"<?php $current=false; if($current) echo ' class="active"'; ?>><?php $name='Главная'; echo $name; ?></a>
        <a href="<?php $link='page2.php'; echo $link; ?>"<?php $current=false; if($current) echo ' class="active"'; ?>><?php $name='Лада Гранта'; echo $name; ?></a>
        <a href="<?php $link='page3.php'; echo $link; ?>"<?php $current=true; if($current) echo ' class="active"'; ?>><?php $name='Лада Веста'; echo $name; ?></a>
    </nav>
</header>

<main>
    <h1>Лада Веста - современный комфорт</h1>
    
    <h2>Новое поколение АвтоВАЗ</h2>
    <p>
        Лада Веста дебютировала в 2015 году и стала флагманской моделью АвтоВАЗа. Автомобиль 
        разработан с учетом современных требований безопасности, комфорта и дизайна. Веста 
        получила полностью новую платформу, отличную от предыдущих моделей завода. Кузов 
        имеет оригинальный дизайн, разработанный командой дизайнеров под руководством Стива 
        Маттина. Автомобиль неоднократно становился лауреатом различных автомобильных премий 
        и признан одним из лучших автомобилей российского производства.
    </p>
    <p>
        Веста отличается просторным салоном с качественной отделкой, хорошей шумоизоляцией 
        и эргономичной посадкой. Багажник объемом 480 литров позволяет перевозить крупные 
        грузы. Подвеска обеспечивает отличный баланс между комфортом и управляемостью. 
        Автомобиль хорошо держит дорогу на высоких скоростях и уверенно чувствует себя в 
        городских условиях. Системы активной безопасности включают ABS, ESP, систему помощи 
        при трогании на подъеме и подушки безопасности.
    </p>
    
    <h2>Двигатели и трансмиссии</h2>
    <p>
        На Весту устанавливаются современные бензиновые двигатели объемом 1.6 и 1.8 литра 
        мощностью от 106 до 122 лошадиных сил. Все моторы соответствуют экологическому 
        стандарту Евро-5. Покупателям доступны 5-ступенчатая механическая коробка передач 
        и вариатор Jatco. Расход топлива в смешанном цикле составляет от 6.9 до 7.8 литра 
        на 100 километров в зависимости от модификации. Регулярное техническое обслуживание 
        рекомендуется каждые 15 тысяч километров пробега.
    </p>

    <img src="images/<?php echo $photo; ?>" alt="Лада Веста" style="width:300px; margin:10px;">
    <img src="images/foto_static.jpg" alt="Веста" style="width:300px; margin:10px;">

    <table>
    <?php
    echo '<tr><td>Двигатель</td><td>Мощность</td><td>Цена</td></tr>';
    ?>
    <tr>
        <td><?php echo '1.6 л'; ?></td>
        <td><?php echo '106 л.с.'; ?></td>
        <td><?php echo 'от 700 тыс. руб.'; ?></td>
    </tr>
    </table>
</main>

<footer>
    Сформировано <?php echo date('d.m.Y'); ?> в <?php echo date('H:i:s'); ?>
</footer>

</body>
</html>