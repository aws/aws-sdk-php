<?php
namespace Aws\Api\Serializer;

use Aws\Api\StructureShape;
use Aws\Api\Service;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

/**
 * @internal
 */
class RestXmlSerializer extends RestSerializer
{
    /** @var XmlBody */
    private $xmlBody;

    /**
     * @param string  $endpoint Endpoint to connect to
     * @param Service $api      Service API description
     * @param XmlBody $xmlBody  Optional XML formatter to use
     */
    public function __construct(
        $endpoint,
        Service $api,
        XmlBody $xmlBody = null
    ) {
        parent::__construct($endpoint, $api);
        $this->xmlBody = $xmlBody ?: new XmlBody($api);
    }

    protected function payload(
        RequestInterface $request,
        StructureShape $member,
        array $value
    ) {
        $request->setHeader('Content-Type', 'application/xml');
        $request->setBody(Stream\create(
            $this->xmlBody->build($member, $value)
        ));
    }
}
