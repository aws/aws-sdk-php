<?php
namespace Aws\Common\Multipart;

use GuzzleHttp\Stream\StreamInterface;

/**
 * Generates data from the provided source needed to make multipart requests.
 *
 * The Part Generator yields associative arrays of parameters that are
 * ultimately merged in with others to form the complete parameters of an
 * UploadPart (or UploadMultipartPart for Glacier) command. This includes the
 * Body parameter, which is a limited stream (i.e., a Stream object, decorated
 * with a LimitStream object). This class has two different ways of navigating
 * the original source to create these limited streams, and chooses the most
 * optimum way depending on whether the source is a seekable, local file.
 */
class PartGenerator implements \Iterator
{
    /** @var StreamInterface The source for the upload */
    private $source;

    /** @var bool True if source is a seekable, local file. */
    private $seekableSource;

    /** @var int The current part's number. */
    private $partNumber;

    /** @var array The current part's data. */
    private $currentPart;

    /** @var UploadState The upload state. */
    private $state;

    /** @var callable Callable containing part data creating logic. */
    private $createPart;

    public function __construct(
        StreamInterface $source,
        UploadState $state,
        callable $createPart
    ) {
        $this->source = $source;
        $this->state = $state;
        $this->createPart = $createPart;

        // Determine if the source is seekable and is a local file. If it is,
        // there are various optimizations on how we iterate through the source
        // and generate parts.
        $this->seekableSource = $this->source->isSeekable()
            && $this->source->getMetadata('wrapper_type') === 'plainfile';

        // Initialize the iterator
        $this->next();
    }

    public function current()
    {
        if (!$this->currentPart) {
            $startingPos = $this->source->tell();
            $createPart = $this->createPart;
            $this->currentPart = $createPart($this->seekableSource, $this->partNumber);
            if ($startingPos === $this->source->tell()) {
                $this->advanceOffset();
            }
        }

        return $this->currentPart;
    }

    public function key()
    {
        return $this->partNumber;
    }

    public function next()
    {
        $this->currentPart = false;
        $this->partNumber++;

        // Skip parts that the iterator was configured to skip
        while (isset($this->state->getUploadedParts()[$this->partNumber]) && $this->valid()) {
            $this->partNumber++;
            $this->advanceOffset();
        }
    }

    public function valid()
    {
        return $this->seekableSource
            ? $this->source->tell() < $this->source->getSize()
            : !$this->source->eof();
    }

    public function rewind() {}

    /**
     * Moves the source position/tell to where the next part begins.
     */
    private function advanceOffset()
    {
        if ($this->seekableSource) {
            $this->source->seek(min(
                $this->source->tell() + $this->state->getPartSize(),
                $this->source->getSize()
            ));
        } else {
            $this->source->read($this->state->getPartSize());
        }
    }
}
