<?php

go(static function () {
    co::sleep(2);
    echo 'a';
});

go(static function () {
    co::sleep(2);
    echo 'b';
});
