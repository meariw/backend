<?php
$db = new mysqli('localhost', 'root', '', 'phonebook');

if ($db->connect_errno) {
    echo 'Ошибка подключения к БД: ' . $db->connect_error;
    exit();
}
$db->set_charset('utf8');


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // сначала получаем фамилию, чтобы вывести в сообщении
    $res = $db->query('SELECT surname FROM contacts WHERE id=' . $id);
    if ($res && $res->num_rows > 0) {
        $surname = htmlspecialchars($res->fetch_assoc()['surname']);
        if ($db->query('DELETE FROM contacts WHERE id=' . $id))
            echo '<div class="alert alert-success">Запись с фамилией ' . $surname . ' удалена</div>';
        else
            echo '<div class="alert alert-error">Ошибка при удалении записи.</div>';
    } else {
        echo '<div class="alert alert-error">Запись не найдена.</div>';
    }
}

// выводим список оставшихся записей
$res = $db->query('SELECT id, surname, name, lastname FROM contacts ORDER BY surname');

if (!$db->errno) {
    if ($res && $res->num_rows > 0) {
        echo '<div class="delete-list">';
        while ($row = $res->fetch_assoc()) {
            $initials = '';
            if (!empty($row['name']))     $initials .= ' ' . mb_substr($row['name'], 0, 1) . '.';
            if (!empty($row['lastname'])) $initials .= ' ' . mb_substr($row['lastname'], 0, 1) . '.';

            $label = htmlspecialchars($row['surname']) . $initials;
            echo '<a href="index.php?p=delete&id=' . $row['id'] . '">' . $label . '</a>';
        }
        echo '</div>';
    } else {
        echo '<div class="alert alert-error">База данных пуста.</div>';
    }
} else {
    echo 'Ошибка базы данных';
}