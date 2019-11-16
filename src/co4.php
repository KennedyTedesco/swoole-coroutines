<?php

use Swoole\Coroutine\System;

final class SomeTask
{
    public function __invoke(int $i): void
    {
        System::sleep(1);

        echo "$i\n";
    }
}

for ($i = 0; $i < 1000; $i++) {
    go(new SomeTask, $i);
}
