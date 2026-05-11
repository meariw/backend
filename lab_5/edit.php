<?php
$db = new mysqli('localhost', 'root', '', 'phonebook');

if ($db->connect_errno) {
    echo 'Ошибка подключения к БД: ' . $db->connect_error;
    exit();
}
$db->set_charset('utf8');

if (isset($_POST['button']) && $_POST['button'] == 'Изменить запись') {
    $sql = "UPDATE contacts SET
        surname='"  . $db->real_escape_string($_POST['surname'])  . "',
        name='"     . $db->real_escape_string($_POST['name'])     . "',
        lastname='" . $db->real_escape_string($_POST['lastname']) . "',
        gender='"   . $db->real_escape_string($_POST['gender'])   . "',
        date='"     . $db->real_escape_string($_POST['date'])     . "',
        phone='"    . $db->real_escape_string($_POST['phone'])    . "',
        location='" . $db->real_escape_string($_POST['location']) . "',
        email='"    . $db->real_escape_string($_POST['email'])    . "',
        comment='"  . $db->real_escape_string($_POST['comment'])  . "'
        WHERE id=" . (int)$_GET['id'];

    try {
        if ($db->query($sql))
            echo '<div class="alert alert-success">Запись обновлена</div>';
        else
            echo '<div class="alert alert-error">Ошибка: запись не обновлена</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-error">Ошибка: запись не обновлена</div>';
    }
}

$currentROW = array();

if (isset($_GET['id'])) {
    // переход по ссылке или отправка формы — ищем запись по id
    $res = $db->query('SELECT * FROM contacts WHERE id=' . (int)$_GET['id'] . ' LIMIT 0, 1');
    $currentROW = $res ? $res->fetch_assoc() : array();
}

if (!$currentROW) {
    // id не передан или не найден — берём первую запись по той же сортировке что и список
    $res = $db->query('SELECT * FROM contacts ORDER BY surname, name LIMIT 0, 1');
    $currentROW = $res ? $res->fetch_assoc() : array();
}

$res = $db->query('SELECT id, surname, name FROM contacts ORDER BY surname, name');

if (!$db->errno) {
    echo '<div class="person-list">';
    while ($row = $res->fetch_assoc()) {
        if ($currentROW && $currentROW['id'] == $row['id'])
            echo '<div class="currentRow">' . htmlspecialchars($row['surname']) . ' ' . htmlspecialchars($row['name']) . '</div>';
        else
            echo '<a href="index.php?p=edit&id=' . $row['id'] . '">' . htmlspecialchars($row['surname']) . ' ' . htmlspecialchars($row['name']) . '</a>';
    }
    echo '</div>';

    if ($currentROW) {
        $mSel = ($currentROW['gender'] == 'мужской') ? ' selected' : '';
        $fSel = ($currentROW['gender'] == 'женский')  ? ' selected' : '';
?>
<div class="form-card">
<form name="form_edit" method="post" action="index.php?p=edit&id=<?= $currentROW['id'] ?>">
    <div class="form-row">
        <label>Фамилия</label>
        <input type="text" name="surname" value="<?= htmlspecialchars($currentROW['surname']) ?>" placeholder="Фамилия">
    </div>
    <div class="form-row">
        <label>Имя</label>
        <input type="text" name="name" value="<?= htmlspecialchars($currentROW['name']) ?>" placeholder="Имя">
    </div>
    <div class="form-row">
        <label>Отчество</label>
        <input type="text" name="lastname" value="<?= htmlspecialchars($currentROW['lastname']) ?>" placeholder="Отчество">
    </div>
    <div class="form-row">
        <label>Пол</label>
        <select name="gender">
            <option value="мужской"<?= $mSel ?>>мужской</option>
            <option value="женский"<?= $fSel ?>>женский</option>
        </select>
    </div>
    <div class="form-row">
        <label>Дата рождения</label>
        <input type="date" name="date" value="<?= htmlspecialchars($currentROW['date']) ?>">
    </div>
    <div class="form-row">
        <label>Телефон</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($currentROW['phone']) ?>" placeholder="Телефон">
    </div>
    <div class="form-row">
        <label>Адрес</label>
        <input type="text" name="location" value="<?= htmlspecialchars($currentROW['location']) ?>" placeholder="Адрес">
    </div>
    <div class="form-row">
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($currentROW['email']) ?>" placeholder="Email">
    </div>
    <div class="form-row">
        <label>Комментарий</label>
        <textarea name="comment" placeholder="Краткий комментарий"><?= htmlspecialchars($currentROW['comment']) ?></textarea>
    </div>
    <button type="submit" name="button" value="Изменить запись" class="form-btn">Изменить запись</button>
</form>
</div>
<?php
    } else {
        echo 'Записей пока нет';
    }
} else {
    echo 'Ошибка базы данных';
}