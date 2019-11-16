<?php

use Swoole\Coroutine\System;

function someTask(int $i): void {
    System::sleep(1);

    echo "$i\n";
}

co::create('someTask', 1);

swoole_coroutine_create('someTask', 2);

Swoole\Coroutine::create('someTask', 3);
