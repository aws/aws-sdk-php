<?php

namespace Aws\S3\Command;

use Guzzle\Common\Event;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\DefaultResponseParser;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Response parser used to adjust arrays of objects to ensure that they are
 */
class FakeModelResponseParser extends DefaultResponseParser implements EventSubscriberInterface
{
    /**
     * @var array Array of operation names to array of XML values that must be an array of objects
     */
    protected $expand = array(
        'GetBucketObjectVersions' => array('Version', 'DeleteMarker', 'CommonPrefixes'),
        'ListBuckets'             => array('Buckets.Bucket'),
        'ListMultipartUploads'    => array('Upload', 'CommonPrefixes'),
        'ListObjects'             => array('Contents', 'CommonPrefixes'),
        'ListParts'               => array('Part'),
        'DeleteMultipleObjects'   => array('Deleted', 'Error')
    );

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array('client.command.create' => 'onCommandCreate');
    }

    /**
     * Adds the custom response parser
     *
     * @param Event $event Event emitted
     */
    public function onCommandCreate(Event $event)
    {
        $event['command']->setResponseParser($this);
    }

    /**
     * {@inheritdoc}
     */
    public function parse(CommandInterface $command)
    {
        $result = parent::parse($command);

        // Convert SimpleXMLElement into an array, then adjusts the array to ensure arrays of objects are valid
        if ($result instanceof \SimpleXMLElement) {
            $operationName = $command->getName();
            if (!isset($this->expand[$operationName])) {
                // If no custom changes are needed, then use the simple XML to JSON conversion
                $result = json_decode(json_encode($result), true);
            } else {
                // Use the customized result array taking arrays of objects into account
                $result = $this->formatResult($result, $this->expand[$operationName]);
            }
        }

        return $result;
    }

    /**
     * Converts the SimpleXML results in an array and makes sure that all
     * repeatable elements specified are both set and haven't been collapsed
     *
     * Repeatable elements are specified by name. Deep elements (like Bucket)
     * can be specified as a path with dot notation like "Buckets.Bucket"
     *
     * @param \SimpleXMLElement $result          SimpleXML result
     * @param array             $repeatableNodes Names of repeatable XML nodes
     *
     * @return array
     */
    protected function formatResult(\SimpleXMLElement $result, array $repeatableNodes = array())
    {
        // Convert from XML to array
        $results = json_decode(json_encode($result), true);

        // Make sure repeatable nodes end up as indexed arrays
        foreach ($repeatableNodes as $repeatable) {
            $path = explode('.', $repeatable);
            $target = array_pop($path);
            $node = &$results;

            // Navigate to the node (if it is a deep node)
            foreach ($path as $key) {
                if (!isset($node[$key])) {
                    $node[$key] = array();
                }
                $node = &$node[$key];
            }

            // Create or transpose the repeatable into indexed array format
            if (!isset($node[$target][0])) {
                $node[$target] = isset($node[$target]) ? array($node[$target]) : array();
            }

            // Add an item identifying the container element (important for
            // iterators with multiple types of nodes in the result sets
            foreach ($node[$target] as &$item) {
                $item['ContainerElement'] = $target;
            }
        }

        return $results;
    }
}
