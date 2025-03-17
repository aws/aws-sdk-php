<?php

namespace Aws\S3\S3Transfer\Progress;

class TransferProgressSnapshot
{
    /** @var string */
    private string $identifier;
    
    /** @var int */
    private int $transferredBytes;

    /** @var int */
    private int $totalBytes;

    /** @var array | null */
    private array | null $response;

    /**
     * @param string $identifier
     * @param int $transferredBytes
     * @param int $totalBytes
     * @param array | null $response
     */
    public function __construct(
        string $identifier,
        int $transferredBytes,
        int $totalBytes,
        ?array $response = null
    ) {
        $this->identifier = $identifier;
        $this->transferredBytes = $transferredBytes;
        $this->totalBytes = $totalBytes;
        $this->response = $response;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return int
     */
    public function getTransferredBytes(): int
    {
        return $this->transferredBytes;
    }

    /**
     * @return int
     */
    public function getTotalBytes(): int
    {
        return $this->totalBytes;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @return float
     */
    public function ratioTransferred(): float
    {
        if ($this->totalBytes === 0) {
            // Unable to calculate ratio
            return 0;
        }

        return $this->transferredBytes / $this->totalBytes;
    }
}