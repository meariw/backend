<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<?php
$submitUrl = 'https://httpbin.org/post';
?>

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
    <div class="card">
        <h2>Написать нам</h2>

        <form action="<?php echo $submitUrl; ?>" method="POST">

            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input type="text" id="username" name="username" placeholder="Введите ваше имя" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="example@mail.ru" required>
            </div>

            <div class="form-group">
                <label for="type">Тип обращения</label>
                <select id="type" name="type" required>
                    <option value="" disabled selected>Выберите тип...</option>
                    <option value="complaint">Жалоба</option>
                    <option value="suggestion">Предложение</option>
                    <option value="gratitude">Благодарность</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Текст обращения</label>
                <textarea id="message" name="message" placeholder="Опишите ваше обращение..." required></textarea>
            </div>

            <div class="form-group">
                <label>Вариант ответа</label>
                <div class="checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="reply[]" value="sms"> СМС
                    </label>
                    <label class="checkbox-label">
                        <input type="checkbox" name="reply[]" value="email"> E-mail
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-submit">Отправить</button>
        </form>

        <a href="page2.php" class="link-p2">Перейти на страницу 2</a>
    </div>
</main>

<footer>
    <p>Задание для самостоятельной работы</p>
</footer>

</body>
</html>