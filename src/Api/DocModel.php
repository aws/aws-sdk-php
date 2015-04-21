<?php
namespace Aws\Api;

/**
 * Encapsulates the documentation strings for a given service-version and
 * provides methods for extracting the desired parts related to a service,
 * operation, error, or shape (i.e., parameter).
 */
class DocModel
{
    /** @var string */
    private $serviceName;

    /** @var string */
    private $apiVersion;

    /** @var array */
    private $docs;

    /**
     * @param ApiProvider $provider
     * @param string $serviceName
     * @param string $apiVersion
     *
     * @throws \RuntimeException
     */
    public function __construct(ApiProvider $provider, $serviceName, $apiVersion)
    {
        if (!extension_loaded('tidy')) {
            throw new \RuntimeException('The "tidy" PHP extension is required.');
        }

        $this->serviceName = $serviceName;
        $this->apiVersion = $apiVersion;
        $this->docs = $provider('docs', $serviceName, $apiVersion);
    }

    /**
     * Retrieves documentation about the service.
     *
     * @return null|string
     */
    public function getServiceDocs()
    {
        return $this->getContent('service');
    }

    /**
     * Retrieves documentation about an operation.
     *
     * @param string $operation Name of the operation
     *
     * @return null|string
     */
    public function getOperationDocs($operation)
    {
        return $this->getContent("operations.\"{$operation}\"");
    }

    /**
     * Retrieves documentation about an error.
     *
     * @param string $error Name of the error
     *
     * @return null|string
     */
    public function getErrorDocs($error)
    {
        return $this->getContent("shapes.\"{$error}/base\"");
    }

    /**
     * Retrieves documentation about a shape, specific to the context.
     *
     * @param string $shapeName  Name of the shape.
     * @param string $parentName Name of the parent/context shape.
     * @param string $ref        Name used by the context to reference the shape.
     *
     * @return null|string
     */
    public function getShapeDocs($shapeName, $parentName, $ref)
    {
        $prefix = "shapes.{$shapeName}";
        return $this->getContent("{$prefix}.refs.\"{$parentName}\${$ref}\"")
            ?: $this->getContent("{$prefix}.base");
    }

    /**
     * @param string $path A JMESPath expression to evaluate on the model.
     *
     * @return null|string
     */
    private function getContent($path)
    {
        $content = \JmesPath\search($path, $this->docs);

        if (!$content) {
            return null;
        }

        $tidy = new \Tidy();
        $tidy->parseString($content, [
            'indent' => true,
            'doctype' => 'omit',
            'output-html' => true,
            'show-body-only' => true,
            'drop-empty-paras' => true,
            'drop-font-tags' => true,
            'drop-proprietary-attributes' => true,
            'hide-comments' => true,
            'logical-emphasis' => true
        ]);
        $tidy->cleanRepair();

        return (string) $content;
    }
}
