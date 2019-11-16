<?php

ini_set('swoole.enable_preemptive_scheduler', 1);

go(static function() {
    $i = 0;
    while (true) {
        $i++;
    }
});

go(static function() {
    for ($i = 0; $i <= 10; $i++) {
        echo "N{$i}";
    }
});
