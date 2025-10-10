<?php
namespace Aws\Crypto;

use Aws\HasDataTrait;
use \ArrayAccess;
use \IteratorAggregate;
use \InvalidArgumentException;
use \JsonSerializable;

/**
 * Stores encryption metadata for reading and writing.
 *
 * @internal
 */
class MetadataEnvelope implements ArrayAccess, IteratorAggregate, JsonSerializable
{
    use HasDataTrait;

    const CONTENT_KEY_V2_HEADER = 'x-amz-key-v2';
    const ENCRYPTED_DATA_KEY_V3 = 'x-amz-3';
    const IV_HEADER = 'x-amz-iv';
    const MATERIALS_DESCRIPTION_HEADER = 'x-amz-matdesc';
    const MAT_DESC_V3 = 'x-amx-m';
    const KEY_WRAP_ALGORITHM_HEADER = 'x-amz-wrap-alg';
    const ENCRYPTED_DATA_KEY_ALGORITHM_V3 = 'x-amz-w';
    const CONTENT_CRYPTO_SCHEME_HEADER = 'x-amz-cek-alg';
    const CONTENT_CIPHER_V3 = 'x-amz-c';
    const CRYPTO_TAG_LENGTH_HEADER = 'x-amz-tag-len';
    const UNENCRYPTED_CONTENT_LENGTH_HEADER = 'x-amz-unencrypted-content-length';
    const ENCRYPTION_CONTEXT_V3 = 'x-amz-t';
    const KEY_COMMITMENT_V3 = 'x-amz-d';
    const MESSAGE_ID_V3 = 'x-amz-i';

    private static $constants = [];

    public static function getConstantValues()
    {
        if (empty(self::$constants)) {
            $reflection = new \ReflectionClass(static::class);
            foreach (array_values($reflection->getConstants()) as $constant) {
                self::$constants[$constant] = true;
            }
        }

        return array_keys(self::$constants);
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($name, $value)
    {
        $constants = self::getConstantValues();
        if (is_null($name) || !in_array($name, $constants)) {
            throw new InvalidArgumentException('MetadataEnvelope fields must'
                . ' must match a predefined offset; use the header constants.');
        }

        $this->data[$name] = $value;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->data;
    }
}
