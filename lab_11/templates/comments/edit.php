<?php include __DIR__ . '/../header.php'; ?>

    <h1>Редактирование комментария #<?= (int) $comment->getId() ?></h1>

    <?php if (!empty($errors)): ?>
        <div style="color:red; margin-bottom:10px;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="/comments/<?= (int) $comment->getId() ?>/edit">

        <div>
            <label for="text">Текст комментария:</label><br>
            <textarea
                id="text"
                name="text"
                rows="6"
                style="width:100%; max-width:600px; padding:6px;"
            ><?= htmlspecialchars($input['text']) ?></textarea>
        </div>

        <br>

        <button type="submit">Сохранить</button>
        <a href="/articles/<?= (int) $comment->getArticleId() ?>#comment<?= (int) $comment->getId() ?>">Отмена</a>

    </form>

<?php include __DIR__ . '/../footer.php'; ?>
