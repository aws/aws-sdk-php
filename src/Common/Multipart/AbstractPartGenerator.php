<?php
namespace Aws\Common\Multipart;

use GuzzleHttp\Stream\StreamInterface;

/**
 * Generates data from the provided source needed to make multipart requests.
 */
abstract class AbstractPartGenerator implements \Iterator
{
    /** @var StreamInterface The source for the upload */
    protected $source;

    /** @var array Options for this part generator */
    protected $options;

    /** @var int Part size in bytes. */
    protected $partSize;

    /** @var int The current part's number. */
    private $partNumber;

    /** @var array The current part's data. */
    private $currentPart;

    /**
     * @param StreamInterface $source  Upload source/body.
     * @param array           $options Options for part generator.
     */
    public function __construct(StreamInterface $source, array $options = [])
    {
        // Receive options
        $this->options = $options;

        // Validate and/or adjust the part size and source
        $this->source = $source;
        $this->determinePartSize();
        $this->validateSource();

        // Initialize the iterator
        $this->next();
    }

    /**
     * Returns the part size used by the part generator.
     *
     * @return int
     */
    public function getPartSize()
    {
        return $this->partSize;
    }

    public function current()
    {
        if (!$this->currentPart) {
            $this->currentPart = $this->generatePartData();
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
        while (isset($this->options['skip'][$this->partNumber]) && $this->valid()) {
            $this->moveSourceToNextPart();
            $this->partNumber++;
        }
    }

    public function valid()
    {
        return !$this->source->eof();
    }

    public function rewind() {}

    /**
     * Determines is the provided source is valid for the part generator.
     *
     * Checks properties about the source stream and throws an exception if the
     * source cannot be used. The source needs to be readable at a minimum.
     *
     * @throws \InvalidArgumentException if the source cannot be used.
     */
    protected function validateSource()
    {
        if (!$this->source->isReadable()) {
            throw new \InvalidArgumentException('Source stream must be readable.');
        }
    }

    /**
     * Moves the source offset/tell to where the next part begins.
     */
    protected function moveSourceToNextPart()
    {
        // Reads data to move forward, but does not use the content.
        $this->source->getContents($this->partSize);
    }

    /**
     * Determines the part size to use for upload parts.
     *
     * Examines the provided part_size option and the source to determine the
     * best possible part size.
     *
     * @throws \InvalidArgumentException if the part size is invalid.
     */
    abstract protected function determinePartSize();

    /**
     * Creates a set of upload part parameters.
     *
     * Analyzes a range of the source starting from the current offset up to the
     * part size to create a set of parameters that will be required to create
     * an upload part command. This should include a seekable stream,
     * representing the analyzed range, that will will be sent as the body.
     *
     * @return array
     */
    abstract protected function generatePartData();
}
