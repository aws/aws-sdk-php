<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\Cbor\CborEncoder;
use Aws\Cbor\Exception\CborException;
use Aws\Exception\InvalidCborException;
use Psr\Http\Message\StreamInterface;

/**
 * Serializes requests according to Smithy RPC-V2 CBOR protocol standards.
 *
 * https://smithy.io/2.0/additional-specs/protocols/smithy-rpc-v2.html
 *
 * @internal
 */
final class RpcV2CborSerializer extends AbstractRpcV2Serializer
{
    /** @var array|string[]  */
    protected static array $defaultHeaders = [
        self::HEADER_SMITHY_PROTOCOL => 'rpc-v2-cbor',
        self::HEADER_CONTENT_TYPE => 'application/cbor',
        self::HEADER_ACCEPT => 'application/cbor',
    ];

    /** @var CborEncoder  */
    private CborEncoder $encoder;

    /**
     * @param Service $api Service API description
     * @param string $endpoint Endpoint to connect to
     * @param CborEncoder|null $encoder Used to CBOR-encode PHP values
     */
    public function __construct(
        Service $api,
        string $endpoint,
        ?CborEncoder $encoder = null
    ) {
        $this->encoder = $encoder ?? new CborEncoder();
        parent::__construct($api, $endpoint);
    }

    /**
     * @param StructureShape $inputShape
     * @param array $commandArgs
     *
     * @return string
     * @throws InvalidCborException
     */
    public function serialize(
        StructureShape $inputShape,
        array $commandArgs
    ): string
    {
        try {
            $resolvedInput = $this->resolveInputShape($inputShape, $commandArgs);
            return !empty($resolvedInput)
                ? $this->encoder->encode($resolvedInput)
                : $this->encoder->encodeEmptyIndefiniteMap();
        } catch (CborException $e) {
            throw new InvalidCborException(
                'Unable to encode CBOR document ' . $inputShape->getName() . ': ' .
                $e->getMessage() . PHP_EOL
            );
        }
    }

    /**
     * Wraps blob values in order to be encoded properly into
     * byte strings.
     *
     * @param mixed $value
     *
     * @return string[]
     */
    protected function resolveBlob(mixed $value): array
    {
        if (!is_string($value)) {
            if (is_resource($value)) {
                $value = stream_get_contents($value);
            } elseif ($value instanceof StreamInterface) {
                $value = $value->getContents();
            } else {
                $value = (string) $value;
            }
        }

        // Wrapper to differentiate byte string values during encoding
        return ['__cbor_bytes' => $value];
    }
}
