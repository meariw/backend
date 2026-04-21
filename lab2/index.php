<?php
$submitUrl = 'https://httpbin.org/post';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
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
    <div class="form-container">
        <h2>Форма обратной связи</h2>
        
        <form action="<?php echo $submitUrl; ?>" method="POST">
            <div class="form-group">
                <label for="name">Имя пользователя:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail пользователя:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="type">Тип обращения:</label>
                <select id="type" name="type" required>
                    <option value="">-- Выберите --</option>
                    <option value="complaint">Жалоба</option>
                    <option value="suggestion">Предложение</option>
                    <option value="thanks">Благодарность</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="message">Текст обращения:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Вариант ответа:</label>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="response[]" value="sms"> SMS
                    </label>
                    <label>
                        <input type="checkbox" name="response[]" value="email"> E-mail
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-submit">Отправить</button>
            </div>
        </form>
        
        <div class="nav-link">
            <a href="headers.php" class="btn-link">Перейти к заголовкам →</a>
        </div>
    </div>
</main>

<footer>
    <p>Задание для самостоятельной работы: Собрать сайт из двух страниц. Форма обратной связи. Вывод get_headers().</p>
</footer>

</body>
</html>