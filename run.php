<?php

require_once __DIR__.'/vendor/autoload.php';

use Alipeople\Test;

try {
    $test = new Test;

    $user = $test->getUserList('alipeople');

    echo json_encode(compact('user'), JSON_PRETTY_PRINT);
} catch (\Exception $e) {
    echo json_encode([
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
    ], JSON_PRETTY_PRINT);
}