<?php

use Swoole\Coroutine\Channel;

$chan = new Channel();

go(static function () use ($chan) {
    // Cria 10.000 corrotinas
    for ($i = 0; $i < 10000; $i++) {
        go(static function () use ($i, $chan) {
            // Emula uma operação de I/O
            co::sleep(1);

            // Adiciona o valor processado no canal
            $chan->push([
                'index' => $i,
                'value' => random_int(1, 10000),
            ]);
        });
    }
});

go(static function () use ($chan) {
    while (true) {
        $data = $chan->pop();
        echo "{$data['index']} -> {$data['value']}\n";
    }
});
