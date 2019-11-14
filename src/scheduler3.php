<?php

// Tarefa 1
$firstTaskId = go(static function() {
    echo 'a';
    co::yield();
    echo 'b';
    co::yield();
    echo 'c';
});

// Tarefa 2
go(static function() use($firstTaskId) {
    $i = 0;
    while (true) {
        $i++;

        if ($i === 1000 || $i === 2000) {
            echo " {$i} ";

            co::resume($firstTaskId);
        }
    }
});
