<?php
namespace Aws\DynamoDb;

use Aws\Common\Result;
use GuzzleHttp\Collection;
use GuzzleHttp\ToArrayInterface;

/**
 * Converts items to a simple associative array form with type information
 * removed. Each item is yielded as an array-accessible Collection object.
 */
class ItemIterator extends \IteratorIterator implements ToArrayInterface
{
    /**
     * Collects items from the result and returns them as an ItemIterator.
     *
     * @param Result $result Result of a DynamoDB operation that potentially
     *                       contains items (e.g., BatchGetItem, DeleteItem,
     *                       GetItem, PutItem, Query, Scan, UpdateItem)
     *
     * @return ItemIterator
     */
    public static function fromResult(Result $result)
    {
        if (!($items = $result['Items'])) {
            if ($item = $result['Item'] ?: $result['Attributes']) {
                $items = [$item];
            } else {
                $items = $result->search('Responses.*[]');
            }
        }

        return new self(new \ArrayIterator($items ?: []));
    }

    /**
     * Returns the first item in the iterator
     */
    public function getFirst()
    {
        $this->rewind();

        return $this->current();
    }

    /**
     * {@inheritdoc}
     * @return Collection
     */
    public function current()
    {
        return new Collection(array_map(
            function(array $attribute) {
                list(, $value) = each($attribute);
                return $value;
            },
            parent::current()
        ));
    }

    public function toArray()
    {
        return iterator_to_array($this, false);
    }
}
