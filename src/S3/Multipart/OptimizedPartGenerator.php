<?php
namespace Aws\S3\Multipart;

use GuzzleHttp\Stream;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\LazyOpenStream;

/**
 * A more optimized version of PartGenerator for local, seekable streams.
 */
class OptimizedPartGenerator extends PartGenerator
{
    /** @var int Current offset of the source stream. */
    protected $offset;

    public function valid()
    {
        return $this->offset < $this->source->getSize();
    }

    protected function generatePartData()
    {
        // Initialize the array of part data that will be returned.
        $data = [
            'PartNumber' => $this->key(),
            'Body' => new LimitStream(
                new LazyOpenStream($this->source->getMetadata('uri'), 'r'),
                $this->partSize,
                $this->offset
            )
        ];

        $this->moveSourceToNextPart();

        return $data;
    }

    protected function moveSourceToNextPart()
    {
        $this->offset += $this->partSize;
    }

    protected function validateSource()
    {
        parent::validateSource();

        if (!$this->source->isSeekable()
            || $this->source->getMetadata('wrapper_type') !== 'plainfile'
        ) {
            throw new \InvalidArgumentException('The source stream must be a '
                . 'local file stream to use the optimized part generator.');
        }
    }
}
