<?php

use Swoole\Coroutine\System;
use Swoole\Coroutine\WaitGroup;

$count = 0;

go(static function() use(&$count) {
    $wg = new WaitGroup();

    for ($i = 0; $i < 5000; $i++) {
        $wg->add(1);

        go(static function () use($wg, &$count) {
            System::sleep(1);
            $count++;

            $wg->done();
        });
    }

    $wg->wait();

    echo $count;
});
