<?php
namespace Aws\S3\S3Transfer;

use Aws\CommandPool;
use Aws\HashingStream;
use Aws\PhpHash;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3Transfer\Models\MultipartUploaderConfig;
use Aws\S3\S3Transfer\Models\PutObjectRequest;
use Aws\S3\S3Transfer\Models\PutObjectResponse;
use Aws\S3\S3Transfer\Models\UploadResponse;
use Aws\S3\S3Transfer\Progress\TransferListenerNotifier;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\LazyOpenStream;
use GuzzleHttp\Psr7\Utils;
use HashContext;
use Psr\Http\Message\StreamInterface;
use Throwable;

/**
 * Multipart uploader implementation.
 */
class MultipartUploader extends AbstractMultipartUploader
{

    /** @var int */
    protected int $calculatedObjectSize;

    /** @var StreamInterface */
    private StreamInterface $body;

    /** @var HashContext */
    private HashContext $hashContext;

    public function __construct(
        S3ClientInterface $s3Client,
        PutObjectRequest $putObjectRequest,
        MultipartUploaderConfig $config,
        string | StreamInterface $source,
        ?string $uploadId = null,
        array $parts = [],
        ?TransferProgressSnapshot $currentSnapshot = null,
        ?TransferListenerNotifier $listenerNotifier = null,
    )
    {
        parent::__construct(
            $s3Client,
            $putObjectRequest,
            $config,
            $uploadId,
            $parts,
            $currentSnapshot,
            $listenerNotifier
        );
        $this->body = $this->parseBody($source);
        $this->calculatedObjectSize = 0;
    }

    /**
     * @param string|StreamInterface $source
     *
     * @return StreamInterface
     */
    private function parseBody(
        string | StreamInterface $source
    ): StreamInterface
    {
        if (is_string($source)) {
            // Make sure the files exists
            if (!is_readable($source)) {
                throw new \InvalidArgumentException(
                    "The source for this upload must be either a readable file path or a valid stream."
                );
            }
            $body = new LazyOpenStream($source, 'r');
            // To make sure the resource is closed.
            $this->deferFns[] = function () use ($body) {
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

    protected function processMultipartOperation(): PromiseInterface
    {
        $this->calculatedObjectSize = 0;
        $partSize = $this->calculatePartSize();
        $partsCount = ceil($this->getTotalSize() / $partSize);
        $commands = [];
        $partNo = count($this->parts);
        $uploadPartCommandArgs = $this->putObjectRequest->toUploadPartRequest();
        $uploadPartCommandArgs['UploadId'] = $this->uploadId;
        // Customer provided checksum
        $hashBody = false;
        if ($this->requestChecksum !== null) {
            // To avoid default calculation
            $uploadPartCommandArgs['@context']['request_checksum_calculation'] = 'when_required';
        } elseif ($this->requestChecksumAlgorithm === self::DEFAULT_CHECKSUM_CALCULATION_ALGORITHM) {
            $hashBody = true;
            $this->hashContext = hash_init('crc32b');
            // To avoid default calculation
            $uploadPartCommandArgs['@context']['request_checksum_calculation'] = 'when_required';
        }

        while (!$this->body->eof()) {
            $partNo++;
            $read = $this->body->read($partSize);
            // To make sure we do not create an empty part when
            // we already reached the end of file.
            if (empty($read) && $this->body->eof()) {
                break;
            }

            if ($hashBody) {
                hash_update($this->hashContext, $read);
            }

            $partBody  = Utils::streamFor(
                $read
            );
            $uploadPartCommandArgs['PartNumber'] = $partNo;
            $uploadPartCommandArgs['ContentLength'] = $partBody->getSize();
            // Attach body
            $uploadPartCommandArgs['Body'] = $this->decorateWithHashes(
                $partBody,
                $uploadPartCommandArgs
            );
            $command = $this->s3Client->getCommand(
                'UploadPart',
                $uploadPartCommandArgs
            );
            $commands[] = $command;
            $this->calculatedObjectSize += $partBody->getSize();
            if ($partNo > self::PART_MAX_NUM) {
                return Create::rejectionFor(
                    "The max number of parts has been exceeded. " .
                    "Max = " . self::PART_MAX_NUM
                );
            }

            if ($partNo > $partsCount) {
                return Create::rejectionFor(
                    "The current part `$partNo` is over the expected number of parts `$partsCount`"
                );
            }
        }

        if ($hashBody) {
            $this->requestChecksum = hash_final($this->hashContext);
        }

        return (new CommandPool(
            $this->s3Client,
            $commands,
            [
                'concurrency' => $this->config->getConcurrency(),
                'fulfilled'   => function (ResultInterface $result, $index)
                use ($commands) {
                    $command = $commands[$index];
                    $this->collectPart(
                        $result,
                        $command
                    );
                    // Part Upload Completed Event
                    $this->partCompleted(
                        $command['ContentLength'],
                        $command->toArray()
                    );
                },
                'rejected'     => function (Throwable $e) {
                    $this->partFailed($e);

                    throw $e;
                }
            ]
        ))->promise();
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
     * @return UploadResponse
     */
    protected function createResponse(ResultInterface $result): UploadResponse
    {
        return new UploadResponse(
            PutObjectResponse::fromArray(
                $result->toArray()
            )->toMultipartUploadResponse()
        );
    }

    /**
     * @param StreamInterface $stream
     * @param array $data
     *
     * @return StreamInterface
     */
    private function decorateWithHashes(StreamInterface $stream, array &$data): StreamInterface
    {
        // Decorate source with a hashing stream
        $hash = new PhpHash('sha256');
        return new HashingStream($stream, $hash, function ($result) use (&$data) {
            $data['ContentSHA256'] = bin2hex($result);
        });
    }
}
