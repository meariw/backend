<?php
if (!isset($_GET['p'])) {
    $_GET['p'] = 'viewer';
}

function getMenu() {
    $html = '<header>
        <div class="site-title">Записная <span>книжка</span></div>
        <nav>
            <a href="?p=viewer" class="' . ($_GET['p'] == 'viewer' ? 'active' : '') . '">Просмотр</a>
            <a href="?p=add" class="' . ($_GET['p'] == 'add' ? 'active' : '') . '">Добавление записи</a>
            <a href="?p=edit" class="' . ($_GET['p'] == 'edit' ? 'active' : '') . '">Редактирование записи</a>
            <a href="?p=delete" class="' . ($_GET['p'] == 'delete' ? 'active' : '') . '">Удаление записи</a>
        </nav>
    </header>';
    
    if ($_GET['p'] == 'viewer') {
        $html .= '<div class="submenu-bar">
            <a href="?p=viewer&sort=byid" class="' . ((!isset($_GET['sort']) || $_GET['sort'] == 'byid') ? 'active' : '') . '">По порядку добавления</a>
            <a href="?p=viewer&sort=surname" class="' . ((isset($_GET['sort']) && $_GET['sort'] == 'surname') ? 'active' : '') . '">По фамилии</a>
            <a href="?p=viewer&sort=date" class="' . ((isset($_GET['sort']) && $_GET['sort'] == 'date') ? 'active' : '') . '">По дате рождения</a>
        </div>';
    }
    
    return $html;
}
?>