<?php
$db = new mysqli('localhost', 'root', '', 'phonebook');

if ($db->connect_errno) {
    echo 'Ошибка подключения к БД: ' . $db->connect_error;
    exit();
}
$db->set_charset('utf8');

// если форма была отправлена — добавляем запись
if (isset($_POST['button']) && $_POST['button'] == 'Добавить запись') {
    $sql = "INSERT INTO contacts (surname, name, lastname, gender, date, phone, location, email, comment) VALUES ('" .
        $db->real_escape_string($_POST['surname'])  . "', '" .
        $db->real_escape_string($_POST['name'])     . "', '" .
        $db->real_escape_string($_POST['lastname']) . "', '" .
        $db->real_escape_string($_POST['gender'])   . "', '" .
        $db->real_escape_string($_POST['date'])     . "', '" .
        $db->real_escape_string($_POST['phone'])    . "', '" .
        $db->real_escape_string($_POST['location']) . "', '" .
        $db->real_escape_string($_POST['email'])    . "', '" .
        $db->real_escape_string($_POST['comment'])  . "')";

    try {
        if ($db->query($sql))
            echo '<div class="alert alert-success">Запись добавлена</div>';
        else
            echo '<div class="alert alert-error">Ошибка: запись не добавлена</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-error">Ошибка: запись не добавлена</div>';
    }
}
?>
<div class="form-card">
<form name="form_add" method="post" action="index.php?p=add">
    <div class="form-row">
        <label>Фамилия</label>
        <input type="text" name="surname" placeholder="Фамилия">
    </div>
    <div class="form-row">
        <label>Имя</label>
        <input type="text" name="name" placeholder="Имя">
    </div>
    <div class="form-row">
        <label>Отчество</label>
        <input type="text" name="lastname" placeholder="Отчество">
    </div>
    <div class="form-row">
        <label>Пол</label>
        <select name="gender">
            <option value="мужской">мужской</option>
            <option value="женский">женский</option>
        </select>
    </div>
    <div class="form-row">
        <label>Дата рождения</label>
        <input type="date" name="date">
    </div>
    <div class="form-row">
        <label>Телефон</label>
        <input type="text" name="phone" placeholder="Телефон">
    </div>
    <div class="form-row">
        <label>Адрес</label>
        <input type="text" name="location" placeholder="Адрес">
    </div>
    <div class="form-row">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email">
    </div>
    <div class="form-row">
        <label>Комментарий</label>
        <textarea name="comment" placeholder="Краткий комментарий"></textarea>
    </div>
    <button type="submit" name="button" value="Добавить запись" class="form-btn">Добавить запись</button>
</form>
</div>