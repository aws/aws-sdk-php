<?php
namespace Aws\S3\S3Transfer;

use Aws\HashingStream;
use Aws\PhpHash;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Models\UploadResult;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\Each;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\LazyOpenStream;
use GuzzleHttp\Psr7\LimitStream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Throwable;

/**
 * Multipart uploader implementation.
 */
class MultipartUploader extends AbstractMultipartUploader
{
    static array $supportedAlgorithms = [
        'ChecksumCRC32',
        'ChecksumCRC32C',
        'ChecksumCRC64NVME',
        'ChecksumSHA1',
        'ChecksumSHA256',
    ];

    private const STREAM_WRAPPER_TYPE_PLAIN_FILE = 'plainfile';

    /** @var int */
    protected int $calculatedObjectSize;

    /** @var StreamInterface */
    private StreamInterface $body;

    public function __construct(
        S3ClientInterface $s3Client,
        array $requestArgs,
        string|StreamInterface $source,
        array $config = [],
        ?string $uploadId = null,
        array $parts = [],
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier = null,
    ) {
        parent::__construct(
            $s3Client,
            $requestArgs,
            $config,
            $uploadId,
            $parts,
            $currentSnapshot,
            $listenerNotifier
        );
        $this->body = $this->parseBody($source);
        $this->calculatedObjectSize = 0;
        $this->evaluateCustomChecksum();
    }

    /**
     * Sync upload method.
     *
     * @return UploadResult
     */
    public function upload(): UploadResult
    {
        return $this->promise()->wait();
    }

    /**
     * Parses the source into an instance of
     * StreamInterface to be read.
     *
     * @param string|StreamInterface $source
     *
     * @return StreamInterface
     */
    private function parseBody(
        string|StreamInterface $source
    ): StreamInterface
    {
        if (is_string($source)) {
            // Make sure the files exists
            if (!is_readable($source)) {
                throw new \InvalidArgumentException(
                    "The source for this upload must be either a"
                    . " readable file path or a valid stream."
                );
            }
            $body = new LazyOpenStream($source, 'r');
            // To make sure the resource is closed.
            $this->onCompletionCallbacks[] = function () use ($body) {
                $body->close();
            };
        } elseif ($source instanceof StreamInterface) {
            $body = $source;
        } else {
            throw new \InvalidArgumentException(
                "The source must be a valid string file path or a StreamInterface."
            );
        }

        return $body;
    }

    /**
     * Evaluates if custom checksum has been provided,
     * and if so then, the values are placed in the
     * respective properties.
     *
     * @return void
     */
    private function evaluateCustomChecksum(): void
    {
        // Evaluation for custom provided checksums
        $checksumName = self::filterChecksum($this->requestArgs);
        if ($checksumName !== null) {
            $this->requestChecksum = $this->requestArgs[$checksumName];
            $this->requestChecksumAlgorithm = str_replace(
                'Checksum',
                '',
                $checksumName
            );
            $this->requestChecksumAlgorithm = strtolower(
                $this->requestChecksumAlgorithm
            );
        } else {
            $this->requestChecksum = null;
            $this->requestChecksumAlgorithm = null;
        }
    }

    /**
     * Process a multipart upload operation.
     *
     * @return PromiseInterface
     */
    protected function processMultipartOperation(): PromiseInterface
    {
        $uploadPartCommandArgs = $this->requestArgs;
        $this->calculatedObjectSize = 0;
        $partSize = $this->calculatePartSize();
        $partsCount = ceil($this->getTotalSize() / $partSize);
        $uploadPartCommandArgs['UploadId'] = $this->uploadId;
        // Customer provided checksum
        if ($this->requestChecksum !== null) {
            // To avoid default calculation for individual parts
            $uploadPartCommandArgs['@context']['request_checksum_calculation'] = 'when_required';
            unset($uploadPartCommandArgs['Checksum'. strtoupper($this->requestChecksumAlgorithm)]);
        } elseif ($this->requestChecksumAlgorithm !== null) {
            $uploadPartCommandArgs['ChecksumAlgorithm'] = $this->requestChecksumAlgorithm;
        }

        $promises = $this->createUploadPartPromises(
            $uploadPartCommandArgs,
            $partSize,
            $partsCount,
        );

        return Each::ofLimitAll($promises, $this->config['concurrency']);
    }

    /**
     * @param array $uploadPartCommandArgs
     * @param int $partSize
     * @param int $partsCount
     *
     * @return \Generator
     */
    private function createUploadPartPromises(
        array $uploadPartCommandArgs,
        int $partSize,
        int $partsCount
    ): \Generator
    {
        $partNo = count($this->parts);
        $bytesRead = 0;
        $isSeekable = $this->body->isSeekable()
            && $this->body->getMetadata('wrapper_type')
            === self::STREAM_WRAPPER_TYPE_PLAIN_FILE;
        while (!$this->body->eof()) {
            if ($isSeekable) {
                $partBody = new LimitStream(
                    new LazyOpenStream(
                        $this->body->getMetadata('uri'),
                        'r'
                    ),
                    $partSize,
                    $bytesRead,
                );
            } else {
                $body = new LimitStream(
                    $this->body,
                    $partSize,
                    $bytesRead,
                );
                $body = $this->decorateWithHashes($body, $uploadPartCommandArgs);
                $partBody = Utils::streamFor();
                Utils::copyToStream($body, $partBody);
            }

            $bodyLength = $partBody->getSize();
            if ($bodyLength === 0) {
                $partBody->close();
                break;
            }

            $partNo++;
            $bytesRead += $bodyLength;

            $uploadPartCommandArgs['PartNumber'] = $partNo;
            $uploadPartCommandArgs['ContentLength'] = $bodyLength;
            // Attach body
            if ($isSeekable) {
                $partBody->rewind();
            }
            $uploadPartCommandArgs['Body'] = $partBody;

            $this->calculatedObjectSize += $bodyLength;
            if ($partNo > self::PART_MAX_NUM) {
                return Create::rejectionFor(
                    "The max number of parts has been exceeded. " .
                    "Max = " . self::PART_MAX_NUM
                );
            }

            if ($isSeekable && $partNo > $partsCount) {
                return Create::rejectionFor(
                    "The current part `$partNo` is over "
                    . "the expected number of parts `$partsCount`"
                );
            }

            $command = $this->s3Client->getCommand(
                'UploadPart',
                $uploadPartCommandArgs
            );

            // Advance if behind
            if ($bytesRead < $this->body->tell()) {
                $this->body->seek($bytesRead);
            }

            yield $this->s3Client->executeAsync($command)
                ->then(function (ResultInterface $result)
                    use ($command, $partBody) {
                    $partBody->close();
                    // To make sure we don't continue when a failure occurred
                    if ($this->currentSnapshot->getReason() !== null) {
                        throw $this->currentSnapshot->getReason();
                    }

                    $this->collectPart(
                        $result,
                        $command
                    );
                    // Part Upload Completed Event
                    $this->partCompleted(
                        $command['ContentLength'],
                        $command->toArray()
                    );
                })->otherwise(function (Throwable $e) use ($partBody) {
                    $partBody->close();
                    $this->partFailed($e);

                    throw $e;
                });
        }
    }

    /**
     * @return int
     */
    protected function getTotalSize(): int
    {
        if ($this->calculatedObjectSize > 0) {
            return $this->calculatedObjectSize;
        }

        return $this->body->getSize();
    }

    /**
     * @param ResultInterface $result
     *
     * @return UploadResult
     */
    protected function createResponse(ResultInterface $result): UploadResult
    {
        return new UploadResult(
            $result->toArray()
        );
    }

    /**
     * @param StreamInterface $stream
     * @param array $data
     *
     * @return StreamInterface
     */
    private function decorateWithHashes(
        StreamInterface $stream,
        array &$data
    ): StreamInterface
    {
        // Decorate source with a hashing stream
        $hash = new PhpHash('sha256');
        return new HashingStream($stream, $hash, function ($result) use (&$data) {
            $data['ContentSHA256'] = bin2hex($result);
        });
    }

    /**
     * Filters a provided checksum if one was provided.
     *
     * @param array $requestArgs
     *
     * @return string|null
     */
    private static function filterChecksum(array $requestArgs):? string
    {
        foreach (self::$supportedAlgorithms as $algorithm) {
            if (isset($requestArgs[$algorithm])) {
                return $algorithm;
            }
        }

        return null;
    }
}
