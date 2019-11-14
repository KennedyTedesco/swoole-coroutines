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

        // Quando estiver no centésimo loop, emula uma operação de I/O
        if ($i === 100) {
            echo "{$i} -> ";

            co::sleep(1);
        }
    }
});
