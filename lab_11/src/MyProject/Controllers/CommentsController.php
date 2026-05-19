<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\Db;
use MyProject\View\View;

class CommentsController
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

    public function add(int $articleId): void
    {
        // Проверяем, что статья существует
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId],
            Article::class
        );

        if ($result === [] || $result === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        // Принимаем только POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /articles/' . $articleId);
            exit;
        }

        $text     = trim($_POST['text'] ?? '');
        $authorId = (int) ($_POST['author_id'] ?? 0);

        $errors = [];

        if ($text === '') {
            $errors[] = 'Текст комментария не может быть пустым.';
        }

        if ($authorId <= 0) {
            $errors[] = 'Не указан автор комментария.';
        }

        if (!empty($errors)) {
            // Возвращаем на страницу статьи с ошибками
            // Для простоты перекидываем обратно — в реальном проекте
            // можно сохранять ошибки в сессию (flash-messages).
            $article = $result[0];

            $comments = $this->db->query(
                'SELECT * FROM `comments` WHERE article_id = :article_id ORDER BY created_at ASC;',
                [':article_id' => $articleId],
                \MyProject\Models\Comments\Comment::class
            ) ?? [];

            $this->view->renderHtml('articles/view.php', [
                'article'       => $article,
                'author'        => null,
                'comments'      => $comments,
                'commentErrors' => $errors,
                'commentInput'  => ['text' => $text, 'author_id' => $authorId],
            ]);
            return;
        }

        // Сохраняем комментарий
        $this->db->query(
            'INSERT INTO `comments` (article_id, author_id, text, created_at)
             VALUES (:article_id, :author_id, :text, NOW());',
            [
                ':article_id' => $articleId,
                ':author_id'  => $authorId,
                ':text'       => $text,
            ]
        );

        $commentId = $this->db->getLastInsertId();

        // Редирект на страницу статьи с якорем на новый комментарий
        header('Location: /articles/' . $articleId . '#comment' . $commentId);
        exit;
    }
}
