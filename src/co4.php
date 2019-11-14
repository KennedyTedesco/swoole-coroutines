<?php

final class SomeTask
{
    public function __invoke(int $i): void
    {
        co::sleep(1);

        echo "$i\n";
    }
}

for ($i = 0; $i < 1000; $i++) {
    go(new SomeTask, $i);
}
