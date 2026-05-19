<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Services\Db;
use MyProject\View\View;

class ArticlesController
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

    public function show(int $articleId): void
    {
        // Получаем статью
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

        // Получаем автора статьи
        $authorResult = $this->db->query(
            'SELECT * FROM `users` WHERE id = :id;',
            [':id' => $article->getAuthorId()]
        );
        $author = $authorResult[0] ?? null;

        // Получаем комментарии к статье
        $comments = $this->db->query(
            'SELECT * FROM `comments` WHERE article_id = :article_id ORDER BY created_at ASC;',
            [':article_id' => $articleId],
            Comment::class
        ) ?? [];

        // Получаем авторов комментариев одним запросом
        $commentAuthors = [];
        if (!empty($comments)) {
            $authorIds = array_unique(array_map(fn($c) => $c->getAuthorId(), $comments));
            $placeholders = implode(',', array_fill(0, count($authorIds), '?'));

            $usersResult = $this->db->queryRaw(
                "SELECT * FROM `users` WHERE id IN ($placeholders);",
                $authorIds
            ) ?? [];

            foreach ($usersResult as $user) {
                $commentAuthors[$user->id] = $user;
            }
        }

        $this->view->renderHtml('articles/view.php', [
            'article'        => $article,
            'author'         => $author,
            'comments'       => $comments,
            'commentAuthors' => $commentAuthors,
            'commentErrors'  => [],
            'commentInput'   => ['text' => '', 'author_id' => 1],
        ]);
    }
}
