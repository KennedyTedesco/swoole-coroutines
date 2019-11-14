<?php

for ($i = 0; $i < 5000; $i++) {
    go(static function () use ($i) {
        co::sleep(1);
        echo "$i\n";
    });
}
