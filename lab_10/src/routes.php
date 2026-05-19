<?php

return [
    '~^articles/(\d+)$~'        => [\MyProject\Controllers\ArticlesController::class, 'show'],
    '~^article/(\d)/edit$~'     => [\MyProject\Controllers\ArticleController::class, 'edit'],
    '~^$~'                      => [\MyProject\Controllers\MainController::class, 'main'],
];
