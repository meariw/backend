<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= htmlspecialchars($article->getName()) ?></h1>
    <p><b>Автор:</b> <?= htmlspecialchars($author->nickname ?? 'Неизвестен') ?></p>
    <p><?= nl2br(htmlspecialchars($article->getText())) ?></p>

    <p><a href="/article/<?= (int) $article->getId() ?>/edit">✏️ Редактировать статью</a></p>

    <hr>

    <h2>Комментарии (<?= count($comments) ?>)</h2>

    <?php if (empty($comments)): ?>
        <p>Комментариев пока нет. Будьте первым!</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div id="comment<?= (int) $comment->getId() ?>" style="border:1px solid #ccc; padding:10px; margin-bottom:12px; border-radius:4px;">
                <p style="margin:0 0 6px;">
                    <b><?= htmlspecialchars($commentAuthors[$comment->getAuthorId()]->nickname ?? 'Неизвестен') ?></b>
                    <small style="color:#888;"><?= htmlspecialchars($comment->getCreatedAt()) ?></small>
                    &mdash;
                    <a href="/comments/<?= (int) $comment->getId() ?>/edit">Редактировать</a>
                </p>
                <p style="margin:0;"><?= nl2br(htmlspecialchars($comment->getText())) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <hr>

    <h3>Добавить комментарий</h3>

    <?php if (!empty($commentErrors)): ?>
        <div style="color:red; margin-bottom:10px;">
            <ul>
                <?php foreach ($commentErrors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="/articles/<?= (int) $article->getId() ?>/comments">

        <div>
            <label for="author_id">ID автора (пользователь):</label><br>
            <input
                type="number"
                id="author_id"
                name="author_id"
                value="<?= (int) ($commentInput['author_id'] ?? 1) ?>"
                min="1"
                style="width:100px; padding:4px;"
            >
        </div>

        <br>

        <div>
            <label for="comment_text">Текст комментария:</label><br>
            <textarea
                id="comment_text"
                name="text"
                rows="4"
                style="width:100%; max-width:600px; padding:6px;"
            ><?= htmlspecialchars($commentInput['text'] ?? '') ?></textarea>
        </div>

        <br>

        <button type="submit">Отправить комментарий</button>

    </form>

<?php include __DIR__ . '/../footer.php'; ?>
