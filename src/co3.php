<?php

use Swoole\Coroutine\System;

function someTask(int $i) : void {
    System::sleep(1);

    echo "$i\n";
}

for ($i = 0; $i < 1000; $i++) {
    go('someTask', $i);
}
