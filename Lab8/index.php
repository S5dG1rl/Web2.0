<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ЛР №8: Анализ текста</title>
</head>
<body>
    <h2>Введите текст для анализа</h2>
    <!-- Форма отправляет данные методом POST в result.php -->
    <form action="result.php" method="POST">
        <textarea name="data" rows="8" cols="60" placeholder="Введите текст..."></textarea><br><br>
        <input type="submit" value="Анализировать">
    </form>
</body>
</html>
