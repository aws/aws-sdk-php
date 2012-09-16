<?php

namespace Aws\Common\Command;

use Aws\Common\Exception\RuntimeException;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Description\Parameter;
use Guzzle\Service\Command\LocationVisitor\AbstractVisitor;

/**
 * Location visitor used to serialize AWS XML REST parameters (e.g. S3, Route53, CloudFront)
 */
class XmlRestVisitor extends AbstractVisitor
{
    /**
     * @var \SplObjectStorage Data object for persisting XML data
     */
    protected $data;

    /**
     * @var bool Content-Type header added when XML is found
     */
    protected $contentType = 'application/xml';

    /**
     * This visitor uses an {@see \SplObjectStorage} to associate XML data with commands
     */
    public function __construct()
    {
        $this->data = new \SplObjectStorage();
    }

    /**
     * Change the content-type header that is added when XML is found
     *
     * @param string $header Header to set when XML is found
     *
     * @return self
     */
    public function setContentTypeHeader($header)
    {
        $this->contentType = $header;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function visit(Parameter $param, RequestInterface $request, $value)
    {
        if (isset($this->data[$request])) {
            $xml = $this->data[$request];
        } elseif ($parent = $param->getParent()) {
            // Create the wrapping element
            $xml = new \SimpleXMLElement(sprintf('<%s xmlns="%s"/>', $parent->getData('root'), $parent->getData('ns')));
        } else {
            throw new RuntimeException('Parameter does not have a parent');
        }

        $node = $xml;
        if ($param->getType() == 'object' || $param->getType() == 'array') {
            $node = $xml->addChild($param->getRename() ?: $param->getName());
        }

        $this->addXml($node, $param, $value);
        $this->data[$request] = $xml;
    }

    /**
     * {@inheritdoc}
     */
    public function after(CommandInterface $command, RequestInterface $request)
    {
        if (isset($this->data[$request])) {
            $xml = $this->data[$request];
            unset($this->data[$request]);
            $request->setBody($xml->asXML())->removeHeader('Expect');
            if ($this->contentType) {
                $request->setHeader('Content-Type', $this->contentType);
            }
        }
    }

    /**
     * Recursively build the XML body
     *
     * @param \SimpleXMLElement $xml   XML to modify
     * @param Parameter         $param API Parameter
     * @param mixed             $value Value to add
     */
    protected function addXml(\SimpleXMLElement $xml, Parameter $param, $value)
    {
        $node = $param->getRename() ?: $param->getName();
        if ($param->getType() == 'array') {
            if ($items = $param->getItems()) {
                $name = $items->getRename();
                foreach ($value as $v) {
                    if ($items->getType() == 'object' || $items->getType() == 'array') {
                        $child = $xml->addChild($name);
                        $this->addXml($child, $items, $v);
                    } else {
                        $xml->addChild($name, $v);
                    }
                }
            }
        } elseif ($param->getType() == 'object') {
            foreach ($value as $name => $v) {
                if ($property = $param->getProperty($name)) {
                    if ($property->getType() == 'object' || $property->getType() == 'array') {
                        $child = $xml->addChild($name);
                        $this->addXml($child, $param->getProperty($name), $v);
                    } else {
                        $xml->addChild($name, $v);
                    }
                }
            }
        } else {
            $xml->addChild($node, $value);
        }
    }
}
