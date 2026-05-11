<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>

<?php
require 'menu.php';
echo getMenu();

if ($_GET['p'] == 'viewer') {

    include 'viewer.php';

    if (!isset($_GET['pg']) || $_GET['pg'] < 0) $_GET['pg'] = 0;

    if (!isset($_GET['sort']) || ($_GET['sort'] != 'byid' && $_GET['sort'] != 'surname' && $_GET['sort'] != 'date'))
        $_GET['sort'] = 'byid';

    echo '<main>';
    echo '<h1 class="section-title">Контакты</h1>';
    echo getFriendsList($_GET['sort'], $_GET['pg']);
    echo '</main>';

} else if (file_exists($_GET['p'] . '.php')) {
    echo '<main>';
    $titles = [
        'add'    => 'Добавление записи',
        'edit'   => 'Редактирование записи',
        'delete' => 'Удаление записи',
    ];
    if (isset($titles[$_GET['p']]))
        echo '<h1 class="section-title">' . $titles[$_GET['p']] . '</h1>';
    include $_GET['p'] . '.php';
    echo '</main>';
}
?>

<footer>Записная книжка &nbsp;·&nbsp; <?= date('Y') ?></footer>
</body>
</html>