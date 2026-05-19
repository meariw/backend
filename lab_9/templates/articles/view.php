<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= htmlspecialchars($article->getName()) ?></h1>
    <p><b>Автор:</b> <?= htmlspecialchars($author->nickname ?? 'Неизвестен') ?></p>
    <p><?= htmlspecialchars($article->getText()) ?></p>

<?php include __DIR__ . '/../footer.php'; ?>
