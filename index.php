<?php
$message = "Hello, World!";
$buttonText = "Русский";

if (isset($_GET['lang']) && $_GET['lang'] === 'ru') {
    $message = "Привет, Мир!";
    $buttonText = "English";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Hello World</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="https://www.mospolytech.ru/sites/default/files/2023-03/Logo_Moscow_Polytech.png" alt="Логотип" width="60">
    </div>
    <div class="title">
        <h1>Лабораторная работа: "Hello, World!"</h1>
    </div>
</header>

<main>
    <div class="content">
        <h1><?php echo $message; ?></h1>
        <button onclick="changeLang()"><?php echo $buttonText; ?></button>
    </div>
</main>

<footer>
    <p>Задание для самостоятельной работы: Создать веб-страницу с динамическим контентом. Загрузить код в удаленный репозиторий.</p>
</footer>

<script>
function changeLang() {
    let url = window.location.href;
    if (url.includes('lang=ru')) {
        window.location.href = 'index.php';
    } else {
        window.location.href = 'index.php?lang=ru';
    }
}
</script>

</body>
</html>