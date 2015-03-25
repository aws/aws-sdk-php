<?php
namespace Aws\Handler\GuzzleV5;

use GuzzleHttp\Stream\StreamDecoratorTrait;
use GuzzleHttp\Stream\StreamInterface as GuzzleStreamInterface;
use Psr\Http\Message\StreamableInterface as Psr7StreamInterface;

class GuzzleStream implements GuzzleStreamInterface
{
    use StreamDecoratorTrait;

    /** @var Psr7StreamInterface */
    private $stream;

    public function __construct(Psr7StreamInterface $stream)
    {
        $this->stream = $stream;
    }
}
