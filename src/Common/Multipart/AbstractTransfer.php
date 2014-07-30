<?php
namespace Aws\Common\Multipart;

use Aws\AwsClientInterface;
use Aws\AwsCommandInterface;
use Aws\Common\Exception\MultipartUploadException;
use Aws\Result;
use GuzzleHttp\Stream\StreamInterface;
use GuzzleHttp\Stream\MetadataStreamInterface;

/**
 * Abstract class for transfer commonalities
 */
abstract class AbstractTransfer
{
    /**
     * @var AwsClientInterface Client used for the transfers
     */
    protected $client;

    /**
     * @var AbstractTransferState State of the transfer
     */
    protected $state;

    /**
     * @var StreamInterface|MetadataStreamInterface Data source of the transfer
     */
    protected $source;

    /**
     * @var array Associative array of options
     */
    protected $options;

    /**
     * @var int Size of each part to upload
     */
    protected $partSize;

    /**
     * @var bool Whether or not the transfer has been stopped
     */
    protected $stopped = false;

    /**
     * Construct a new transfer object
     *
     * @param AwsClientInterface     $client  Client used for the transfers
     * @param AbstractTransferState $state   State used to track transfer
     * @param StreamInterface             $source  Data source of the transfer
     * @param array                  $options Array of options to apply
     */
    public function __construct(
        AwsClientInterface $client,
        AbstractTransferState $state,
        StreamInterface $source,
        array $options = []
    ) {
        $this->client  = $client;
        $this->state   = $state;
        $this->source  = $source;
        $this->options = $options;

        $this->init();

        $this->partSize = $this->calculatePartSize();
    }

    public function __invoke()
    {
        return $this->upload();
    }

    /**
     * {@inheritdoc}
     */
    public function abort()
    {
        $command = $this->getAbortCommand();
        $result = $this->client->execute($command);

        $this->state->setAborted(true);
        $this->stop();

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function stop()
    {
        $this->stopped = true;

        return $this->state;
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the array of options associated with the transfer
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set an option on the transfer
     *
     * @param string $option Name of the option
     * @param mixed  $value  Value to set
     *
     * @return self
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * Get the source body of the upload
     *
     * @return StreamInterface
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @throws MultipartUploadException when an error is encountered. Use getLastException() to get more information.
     * @throws \RuntimeException         when attempting to upload an aborted transfer
     */
    public function upload()
    {
        if ($this->state->isAborted()) {
            throw new \RuntimeException('The transfer has been aborted and cannot be uploaded');
        }

        $this->stopped = false;

        try {
            $this->transfer();

            if ($this->stopped) {
                return null;
            } else {
                $result = $this->complete();
            }
        } catch (\Exception $e) {
            throw new MultipartUploadException($this->state, $e);
        }

        return $result;
    }

    /**
     * Hook to initialize the transfer
     */
    protected function init() {}

    /**
     * Determine the upload part size based on the size of the source data and
     * taking into account the acceptable minimum and maximum part sizes.
     *
     * @return int The part size
     */
    abstract protected function calculatePartSize();

    /**
     * Complete the multipart upload
     *
     * @return Result Returns the result of the complete multipart upload command
     */
    abstract protected function complete();

    /**
     * Hook to implement in subclasses to perform the actual transfer
     */
    abstract protected function transfer();

    /**
     * Fetches the abort command fom the concrete implementation
     *
     * @return AwsCommandInterface
     */
    abstract protected function getAbortCommand();
}
