<?php

namespace AwsSdk\Tests\Fixtures;

class ExampleWithComment
{
    public function untyped(
        $value
    ) // The brace cannot safely move onto this line.
    {
        return $value;
    }
}
