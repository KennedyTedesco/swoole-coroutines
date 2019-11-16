<?php

use Swoole\Coroutine\System;

$count = 0;

Co\run(static function() use(&$count) {
    for ($i = 0; $i < 5000; $i++) {
        go(static function () use(&$count) {
            System::sleep(1);
            $count++;
        });
    }
});

echo $count;
