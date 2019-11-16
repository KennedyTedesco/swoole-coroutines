<?php

use Swoole\Coroutine\System;

go(static function () {
    System::sleep(1);
    echo 'a';
});

go(static function () {
    System::sleep(2);
    echo 'b';
});
