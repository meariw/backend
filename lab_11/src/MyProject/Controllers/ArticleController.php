<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\Db;
use MyProject\View\View;

class ArticleController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }

    public function edit(int $articleId): void
    {
        // Получаем статью из БД
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId],
            Article::class
        );

        if ($result === [] || $result === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article = $result[0];

        // Обработка POST-запроса (сохранение изменений)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $text = trim($_POST['text'] ?? '');

            $errors = [];

            if ($name === '') {
                $errors[] = 'Название статьи не может быть пустым.';
            }

            if ($text === '') {
                $errors[] = 'Текст статьи не может быть пустым.';
            }

            if (empty($errors)) {
                $this->db->query(
                    'UPDATE `articles` SET `name` = :name, `text` = :text WHERE `id` = :id;',
                    [
                        ':name' => $name,
                        ':text' => $text,
                        ':id'   => $articleId,
                    ]
                );

                // Перенаправляем на страницу статьи после сохранения
                header('Location: /articles/' . $articleId);
                exit;
            }

            // При ошибках показываем форму снова с введёнными данными
            $this->view->renderHtml('articles/edit.php', [
                'article' => $article,
                'errors'  => $errors,
                'input'   => ['name' => $name, 'text' => $text],
            ]);
            return;
        }

        // GET-запрос — показываем форму редактирования
        $this->view->renderHtml('articles/edit.php', [
            'article' => $article,
            'errors'  => [],
            'input'   => ['name' => $article->getName(), 'text' => $article->getText()],
        ]);
    }
}
