<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовки HTTP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="Logo_Polytech_rus_main.jpg" alt="Логотип МосПолитеха">
    </div>
    <div class="title">
        <h1>Лабораторная работа: "Feedback Form"</h1>
    </div>
</header>

<main>
    <div class="headers-container">
        <h2>Результат работы функции get_headers()</h2>
        
        <?php
        $url = 'https://httpbin.org/get';
        $headers = get_headers($url, 1);
        ?>
        
        <textarea readonly rows="20">
<?php
if ($headers) {
    print_r($headers);
} else {
    echo "Не удалось получить заголовки.";
}
?>
</textarea>
        
        <div class="nav-link">
            <a href="index.php" class="btn-link">← Назад к форме</a>
        </div>
    </div>
</main>

<footer>
    <p>Задание для самостоятельной работы: Собрать сайт из двух страниц. Форма обратной связи. Вывод get_headers().</p>
</footer>

</body>
</html>