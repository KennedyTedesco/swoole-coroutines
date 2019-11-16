<?php

use Swoole\Coroutine\System;
use Swoole\Coroutine\WaitGroup;

$counter = 0;

go(static function() use(&$counter) {
    $wg = new WaitGroup();

    for ($i = 0; $i < 5000; $i++) {
        $wg->add(1);

        go(static function () use($wg, &$counter) {
            System::sleep(1);
            $counter++;

            $wg->done();
        });
    }

    $wg->wait();

    echo $counter;
});
