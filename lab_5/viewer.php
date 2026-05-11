<?php
function getFriendsList($sort, $page)
{
    $db = new mysqli('localhost', 'root', '', 'phonebook');

    if ($db->connect_errno)
        return 'Ошибка подключения к БД: ' . $db->connect_error;

    $db->set_charset('utf8');

    // определяем столбец сортировки
    $orderCol = 'id';
    if ($sort == 'surname') $orderCol = 'surname';
    if ($sort == 'date')    $orderCol = 'date';

    // узнаём общее число записей
    $res   = $db->query('SELECT COUNT(*) FROM contacts');
    $row   = $res->fetch_row();
    $TOTAL = (int)$row[0];

    if (!$TOTAL)
        return 'В таблице нет данных';

    $PAGES = ceil($TOTAL / 10); // общее количество страниц

    if ($page >= $PAGES) $page = $PAGES - 1; // не выходим за максимум

    $offset = $page * 10;

    // основной запрос с сортировкой и пагинацией
    $sql = "SELECT * FROM contacts ORDER BY `$orderCol` ASC LIMIT $offset, 10";
    $res = $db->query($sql);

    $ret  = '<div class="table-wrap"><table>';
    $ret .= '<thead><tr>
        <th>#</th><th>Фамилия</th><th>Имя</th><th>Отчество</th>
        <th>Пол</th><th>Дата рождения</th><th>Телефон</th>
        <th>Адрес</th><th>Email</th><th>Комментарий</th>
    </tr></thead><tbody>';

    $n = $offset + 1;
    while ($row = $res->fetch_assoc()) {
        $ret .= '<tr>';
        $ret .= '<td>' . $n++ . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['surname'])  . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['name'])     . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['lastname']) . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['gender'])   . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['date'])     . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['phone'])    . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['location']) . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['email'])    . '</td>';
        $ret .= '<td>' . htmlspecialchars($row['comment'])  . '</td>';
        $ret .= '</tr>';
    }

    $ret .= '</tbody></table></div>';

    // пагинация
    if ($PAGES > 1) {
        $ret .= '<div class="pagination">';
        for ($i = 0; $i < $PAGES; $i++) {
            if ($i != $page)
                $ret .= '<a href="index.php?p=viewer&sort=' . $sort . '&pg=' . $i . '">' . ($i + 1) . '</a>';
            else
                $ret .= '<span class="current">' . ($i + 1) . '</span>';
        }
        $ret .= '</div>';
    }

    $db->close();
    return $ret;
}