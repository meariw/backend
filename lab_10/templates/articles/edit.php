<?php include __DIR__ . '/../header.php'; ?>

    <h1>Редактирование статьи #<?= (int) $article->getId() ?></h1>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="/article/<?= (int) $article->getId() ?>/edit">

        <div class="form-group">
            <label for="name">Название статьи:</label><br>
            <input
                type="text"
                id="name"
                name="name"
                value="<?= htmlspecialchars($input['name']) ?>"
                style="width: 100%; max-width: 600px; padding: 6px;"
            >
        </div>

        <br>

        <div class="form-group">
            <label for="text">Текст статьи:</label><br>
            <textarea
                id="text"
                name="text"
                rows="10"
                style="width: 100%; max-width: 600px; padding: 6px;"
            ><?= htmlspecialchars($input['text']) ?></textarea>
        </div>

        <br>

        <button type="submit">Сохранить изменения</button>
        <a href="/articles/<?= (int) $article->getId() ?>">Отмена</a>

    </form>

<?php include __DIR__ . '/../footer.php'; ?>
