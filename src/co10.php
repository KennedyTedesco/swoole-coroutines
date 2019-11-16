<?php

use Swoole\Coroutine\System;

$counter = 0;

Co\run(static function() use(&$counter) {
    for ($i = 0; $i < 10000; $i++) {
        go(static function () use(&$counter) {
            System::sleep(1);
            $counter++;
        });
    }
});

echo $counter;
