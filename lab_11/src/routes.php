<?php

return [
    '~^articles/(\d+)$~'          => [\MyProject\Controllers\ArticlesController::class, 'show'],
    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\CommentsController::class, 'add'],
    '~^article/(\d)/edit$~'       => [\MyProject\Controllers\ArticleController::class, 'edit'],
    '~^comments/(\d+)/edit$~'     => [\MyProject\Controllers\CommentController::class, 'edit'],
    '~^$~'                        => [\MyProject\Controllers\MainController::class, 'main'],
];
