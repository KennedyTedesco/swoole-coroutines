<?php

use Swoole\Coroutine\Channel;
use Swoole\Coroutine\System;
use Swoole\Coroutine\Http\Client;

function httpHead(string $url) {
    $client = new Client($url, 80);
    $client->get('/');

    return $client;
}

$chan = new Channel();

go(static function () use ($chan) {
    // Abre um ponteiro para o arquivo
    $fp = fopen('sites.txt', 'rb');

    // Atrasa o fechamento do ponteiro do arquivo para o final da corrotina
    defer(static function () use ($fp) {
        fclose($fp);
    });

    while (feof($fp) === false) {
        // Lê linha a linha do arquivo
        $url = trim(System::fgets($fp));

        if ($url !== '') {
            // Cria uma corrotina para requisitar a URL e trazer o status code dela
            go(static function () use ($url, $chan) {
                $response = httpHead($url);

                // Insere no canal a resposta
                $chan->push([
                    'url' => $url,
                    'statusCode' => $response->statusCode,
                ]);
            });
        }
    }
});

// Corrotina que lê os valores do canal e imprime no output
go(static function () use ($chan) {
    while (true) {
        $data = $chan->pop();
        echo "{$data['url']} -> {$data['statusCode']}\n";
    }
});