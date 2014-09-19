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
abstract class AbstractPartGenerator implements \Iterator
{
    /** @var StreamInterface The source for the upload */
    protected $source;

    /** @var array Options for this part generator */
    protected $options;

    /** @var int Part size in bytes. */
    protected $partSize;

    /** @var bool True if source is a seekable, local file. */
    protected $seekableSource;

    /** @var int The current part's number. */
    private $partNumber;

    /** @var array The current part's data. */
    private $currentPart;

    /** @var int */
    private $offset;

    /**
     * @param StreamInterface $source  Upload source/body.
     * @param array           $options Options for part generator.
     */
    public function __construct(StreamInterface $source, array $options = [])
    {
        $this->options = $options;
        $this->source = $source;

        // Call the S3/Glacier-specific subclass to determine the part size.
        $this->determinePartSize();

        // Determine if the source is seekable and is a local file. If it is,
        // there are various optimizations on how we iterate through the source
        // and generate parts.
        $this->seekableSource = $this->source->isSeekable()
            && $this->source->getMetadata('wrapper_type') === 'plainfile';

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
            $this->partNumber++;
            $this->advanceOffset();
        }
    }

    public function valid()
    {
        return $this->seekableSource
            ? $this->offset < $this->source->getSize()
            : !$this->source->eof();
    }

    public function rewind() {}

    /**
     * Gets the offset/tell of the source.
     *
     * @return int
     */
    protected function getOffset()
    {
        return $this->seekableSource
            ? (int) min($this->offset, $this->source->getSize())
            : $this->source->tell();
    }

    /**
     * Moves the source offset/tell to where the next part begins.
     */
    protected function advanceOffset()
    {
        // Reads data to move forward, but does not use the content.
        if ($this->seekableSource) {
            $this->offset += $this->partSize;
        } else {
            $this->source->read($this->partSize);
        }
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
