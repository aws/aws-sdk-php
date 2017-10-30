<?php
namespace Aws\Crypto;

use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;

/**
 * @internal Represents a stream of data to be gcm encrypted with a tag
 * appended.
 */
class AesTaggedGcmEncryptingStream extends AesGcmEncryptingStream
{
    public function __construct(
        StreamInterface $plaintext,
        $key,
        $initializationVector,
        $aad = '',
        $tagLength = 16,
        $keySize = 256
    ) {
        parent::__construct(
            $plaintext,
            $key,
            $initializationVector,
            $aad,
            $tagLength,
            $keySize
        );
    }

    public function createStream()
    {
        return Psr7\stream_for(
            parent::createStream() . $this->getTag()
        );
    }
}
