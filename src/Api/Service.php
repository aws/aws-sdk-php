<?php
namespace Aws\Api;

use Aws\Api\Serializer\JsonRpcSerializer;
use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Parser\JsonRpcParser;
use Aws\Api\Parser\RestJsonParser;
use Aws\Api\Parser\RestXmlParser;
use Aws\Api\Parser\QueryParser;
use Aws\AwsClientInterface;
use Aws\Signature\S3Signature;
use Aws\Signature\S3SignatureV4;
use Aws\Signature\SignatureInterface;
use Aws\Signature\SignatureV2;
use Aws\Signature\SignatureV4;

/**
 * Represents a web service API model.
 */
class Service extends AbstractModel
{
    /** @var Operation[] */
    private $operations = [];

    /**
     * @param array $definition Service description
     * @param array $options    Hash of options
     */
    public function __construct(array $definition, array $options = [])
    {
        if (!isset($definition['operations'])) {
            $definition['operations'] = [];
        }

        if (!isset($definition['shapes'])) {
            $definition['shapes'] = [];
        }

        if (!isset($options['shape_map'])) {
            $options['shape_map'] = new ShapeMap($definition['shapes']);
        }

        parent::__construct($definition, $options['shape_map']);
    }

    /**
     * Get the full name of the service
     *
     * @return string
     */
    public function getServiceFullName()
    {
        return $this->getMetadata('serviceFullName');
    }

    /**
     * Get the API version of the service
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->getMetadata('apiVersion');
    }

    /**
     * Get the API version of the service
     *
     * @return string
     */
    public function getEndpointPrefix()
    {
        return $this->getMetadata('endpointPrefix');
    }

    /**
     * Get the signing name used by the service.
     *
     * @return string
     */
    public function getSigningName()
    {
        return $this->getMetadata('signingName')
            ?: $this->getMetadata('endpointPrefix');
    }

    /**
     * Check if the description has a specific operation by name.
     *
     * @param string $name Operation to check by name
     *
     * @return bool
     */
    public function hasOperation($name)
    {
        return isset($this['operations'][$name]);
    }

    /**
     * Get an operation by name.
     *
     * @param string $name Operation to retrieve by name
     *
     * @return Operation
     * @throws \InvalidArgumentException If the operation is not found
     */
    public function getOperation($name)
    {
        if (!isset($this->operations[$name])) {
            if (!isset($this->definition['operations'][$name])) {
                throw new \InvalidArgumentException('Unknown operation: '
                    . $name);
            }

            $this->operations[$name] = new Operation(
                $this->definition['operations'][$name],
                $this->shapeMap
            );
        }

        return $this->operations[$name];
    }

    /**
     * Get all of the operations of the description.
     *
     * @return Operation[]
     */
    public function getOperations()
    {
        $result = [];
        foreach ($this->definition['operations'] as $name => $definition) {
            $result[$name] = $this->getOperation($name);
        }

        return $result;
    }

    /**
     * Get all of the service metadata or a specific metadata key value.
     *
     * @param string|null $key Key to retrieve or null to retrieve all metadata
     *
     * @return mixed Returns the result or null if the key is not found
     */
    public function getMetadata($key = null)
    {
        if (!$key) {
            if (!isset($this->definition['metadata'])) {
                $this->definition['metadata'] = [];
            }
            return $this['metadata'];
        }

        if (isset($this->definition['metadata'][$key])) {
            return $this->definition['metadata'][$key];
        }

        return null;
    }

    /**
     * Creates a signature object based on the service description.
     *
     * @param string $region  Region to use when the signature requires a region
     * @param string $version Optional signature version override
     *
     * @return SignatureInterface
     * @throws \InvalidArgumentException if the signature cannot be created
     */
    public function createSignature($region, $version = null)
    {
        if (!$version) {
            if (!($version = $this->getMetadata('signatureVersion'))) {
                throw new \InvalidArgumentException('Unable to determine '
                    . 'signatureVersion');
            }
        }

        switch ($version) {
            case 'v4':
                return $this->getEndpointPrefix() == 's3'
                    ? new S3SignatureV4($this->getSigningName(), $region)
                    : new SignatureV4($this->getSigningName(), $region);
            case 'v2':
                return new SignatureV2();
            case 's3':
                return new S3Signature();
            default:
                throw new \InvalidArgumentException('Unknown signature version '
                    . $version);
        }
    }

    /**
     * Creates and attaches serializers and parsers to the given client based
     * on the protocol of the description.
     *
     * @param AwsClientInterface $client   AWS client to update
     * @param string             $endpoint Service endpoint to connect to.
     *
     * @throws \RuntimeException if the serializer subscriber cannot be created.
     */
    public function applyProtocol(AwsClientInterface $client, $endpoint)
    {
        $em = $client->getEmitter();

        switch ($this->getMetadata('protocol')) {
            case 'json':
                $em->attach(new JsonRpcSerializer($this, $endpoint));
                $em->attach(new JsonRpcParser($this));
                break;
            case 'query':
                $em->attach(new QuerySerializer($this, $endpoint));
                $em->attach(new QueryParser($this));
                break;
            case 'rest-json':
                $em->attach(new RestJsonSerializer($this, $endpoint));
                $em->attach(new RestJsonParser($this));
                break;
            case 'rest-xml':
                $em->attach(new RestXmlSerializer($this, $endpoint));
                $em->attach(new RestXmlParser($this));
                break;
            default:
                throw new \UnexpectedValueException('Unknown protocol: '
                    . $this->getMetadata('type'));
        }
    }
}
