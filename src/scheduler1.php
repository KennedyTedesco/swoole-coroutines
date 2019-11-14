<?php

// Tarefa 1
go(static function() {
    co::sleep(1);
    for ($i = 0; $i <= 10; $i++) {
        echo "N{$i}";
    }
});

// Tarefa 2
go(static function() {
    $i = 0;
    while (true) {
        $i++;
    }
});
