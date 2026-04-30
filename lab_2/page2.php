<?php
$url = "https://httpbin.org/post";
$headers = @get_headers($url);
if ($headers === false) {
    $headers_text = "Ошибка: get_headers() не смог получить заголовки.\nПроверьте, что allow_url_fopen = On в php.ini";
} else {
    $headers_text = implode("\n", $headers);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<header>
    <div class="logo-wrap">
        <img src="Logo_Polytech_rus_main.jpg" alt="Логотип МосПолитех">
    </div>
    <div class="header-title">
        <h1>Feedback form</h1>
        <p>Самостоятельная работа</p>
    </div>
</header>

<main>
    <div class="card card--wide">
        <h2>Результат get_headers()</h2>

        <span class="url-badge"><?php echo htmlspecialchars($url); ?></span>

        <span class="label-text">HTTP-заголовки</span>
        <textarea class="textarea-headers" readonly><?php echo htmlspecialchars($headers_text); ?></textarea>

        <a href="FeedbackForm.php" class="btn-submit" style="display:block; text-align:center; text-decoration:none; margin-top:20px;">&#8592; Вернуться на страницу 1</a>
    </div>
</main>

<footer>
    <p>Задание для самостоятельной работы</p>
</footer>

</body>
</html>