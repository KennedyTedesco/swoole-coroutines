<?php

use Swoole\Coroutine\System;

for ($i = 0; $i < 5000; $i++) {
    go(static function () use ($i) {
        System::sleep(1);
        echo "$i\n";
    });
}
