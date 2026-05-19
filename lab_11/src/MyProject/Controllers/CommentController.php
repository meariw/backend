<?php

namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\Services\Db;
use MyProject\View\View;

class CommentController
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

    public function edit(int $commentId): void
    {
        // Получаем комментарий
        $result = $this->db->query(
            'SELECT * FROM `comments` WHERE id = :id;',
            [':id' => $commentId],
            Comment::class
        );

        if ($result === [] || $result === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $comment = $result[0];

        // Обработка POST — сохранение изменений
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = trim($_POST['text'] ?? '');

            $errors = [];

            if ($text === '') {
                $errors[] = 'Текст комментария не может быть пустым.';
            }

            if (empty($errors)) {
                $this->db->query(
                    'UPDATE `comments` SET `text` = :text WHERE `id` = :id;',
                    [
                        ':text' => $text,
                        ':id'   => $commentId,
                    ]
                );

                // Редирект на статью с якорем на отредактированный комментарий
                header('Location: /articles/' . $comment->getArticleId() . '#comment' . $commentId);
                exit;
            }

            // Показываем форму с ошибками
            $this->view->renderHtml('comments/edit.php', [
                'comment' => $comment,
                'errors'  => $errors,
                'input'   => ['text' => $text],
            ]);
            return;
        }

        // GET — показываем форму редактирования
        $this->view->renderHtml('comments/edit.php', [
            'comment' => $comment,
            'errors'  => [],
            'input'   => ['text' => $comment->getText()],
        ]);
    }
}
