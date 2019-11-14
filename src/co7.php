<?php

go(static function () { //T1
    echo "[init]\n";
    go(static function () { //T2
        co::sleep(3);
        go(static function () { //T3
            co::sleep(2);
            echo "co3\n";
        });

        echo "co2\n";
    });

    co::sleep(1);
    echo "co1\n";
});
