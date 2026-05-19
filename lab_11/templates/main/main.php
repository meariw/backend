<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article->getId() ?>"><?= htmlspecialchars($article->getName()) ?></a></h2>
    <p><?= htmlspecialchars($article->getText()) ?></p>
    <hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>
