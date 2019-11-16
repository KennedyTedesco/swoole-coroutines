<?php

use Swoole\Coroutine\System;

go(static function () { //T1
    echo "[init]\n";
    go(static function () { //T2
        System::sleep(3);
        go(static function () { //T3
            System::sleep(2);
            echo "co3\n";
        });

        echo "co2\n";
    });

    System::sleep(1);
    echo "co1\n";
});
