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
        <a href="<?php $link='page2.php'; echo $link; ?>"<?php $current=true; if($current) echo ' class="active"'; ?>><?php $name='Лада Гранта'; echo $name; ?></a>
        <a href="<?php $link='page3.php'; echo $link; ?>"<?php $current=false; if($current) echo ' class="active"'; ?>><?php $name='Лада Веста'; echo $name; ?></a>
    </nav>
</header>

<main>
    <h1>Лада Гранта - народный автомобиль</h1>
    
    <h2>История и характеристики</h2>
    <p>
        Лада Гранта была представлена в 2011 году и пришла на смену классическим моделям 
        ВАЗ-2107 и Лада Калина в кузове седан. Автомобиль разрабатывался как доступное 
        транспортное средство для широких слоев населения. За время производства Гранта 
        неоднократно модернизировалась, получая новые двигатели, коробки передач и элементы 
        оснащения. Сегодня это один из самых продаваемых автомобилей в России.
    </p>
    <p>
        Технические характеристики Гранты впечатляют для своего класса. Автомобиль оснащается 
        бензиновыми двигателями объемом 1.6 литра мощностью от 87 до 106 лошадиных сил. 
        Покупателям доступны механическая и автоматическая коробки передач. Расход топлива 
        составляет около 7 литров на 100 километров в смешанном цикле, что является отличным 
        показателем экономичности. Подвеска адаптирована к российским дорогам и обеспечивает 
        хорошую энергоемкость.
    </p>
    
    <h2>Комплектации и цены</h2>
    <p>
        Гранта предлагается в нескольких комплектациях: Стандарт, Норма и Люкс. Базовая 
        версия включает минимальный набор оборудования, но уже имеет подушку безопасности 
        водителя и усилитель руля. В топовых комплектациях доступны кондиционер, подогрев 
        сидений, электростеклоподъемники всех дверей, мультимедийная система с сенсорным 
        экраном и камера заднего вида. Стоимость автомобиля начинается от 500 тысяч рублей, 
        что делает его одним из самых доступных новых автомобилей на российском рынке.
    </p>

    <img src="images/<?php echo $photo; ?>" alt="Лада Гранта" style="width:300px; margin:10px;">
    <img src="images/foto_static.jpg" alt="Гранта" style="width:300px; margin:10px;">

    <table>
    <?php
    echo '<tr><td>Двигатель</td><td>Расход</td><td>Разгон 0-100</td></tr>';
    ?>
    <tr>
        <td><?php echo '1.6 л, 87 л.с.'; ?></td>
        <td><?php echo '6.8 л/100км'; ?></td>
        <td><?php echo '12.5 сек'; ?></td>
    </tr>
    </table>
</main>

<footer>
    Сформировано <?php echo date('d.m.Y'); ?> в <?php echo date('H:i:s'); ?>
</footer>

</body>
</html>