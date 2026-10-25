<?php

namespace AwsSdk\Tests\Fixtures;

class Example
{
    public function typed(
        string $value
    ): string
    {
        return $value;
    }

    public function untyped(
        $value
    ) {
        return $value;
    }
}

$callback = function (
    string $value
): string {
    return $value;
};
