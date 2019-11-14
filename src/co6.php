<?php

go(static function () { //T1
    echo "[init]\n";
    go(static function () { //T2
        go(static function () { //T3
            echo "co3\n";
        });

        echo "co2\n";
    });

    echo "co1\n";
});
