<?php

return [
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'show'],
    '~^$~'               => [\MyProject\Controllers\MainController::class, 'main'],
];
