<?php
namespace Aws\Service\DynamoDb;

use Aws\Result;
use GuzzleHttp\Collection;
use GuzzleHttp\ToArrayInterface;

/**
 * Converts items to a simple associative array form with type information removed. Also performs base64_decode on
 * values specified as binary. Each item is yielded as an array-accessible Collection object
 *
 * @todo Decide if this class/features need to continue to exist and, if so, in what form.
 */
class ItemIterator extends \IteratorIterator implements \Countable, ToArrayInterface
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
                $items = $result->getPath('Responses/*');
            }
        }

        return new self(new \ArrayIterator($items ?: []));
    }

    /**
     * Ensures that the inner iterator is both Traversable and Countable
     *
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(\Traversable $iterator)
    {
        if (!($iterator instanceof \Countable)) {
            throw new \InvalidArgumentException(
                'The inner iterator for an ItemIterator must be Countable.'
            );
        }

        parent::__construct($iterator);
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
            [$this, 'processAttribute'],
            parent::current()
        ));
    }

    public function count()
    {
        return $this->getInnerIterator()->count();
    }

    public function toArray()
    {
        return iterator_to_array($this, false);
    }

    /**
     * Converts an item's attribute from the DynamoDB format to a typeless value
     * in order to simplify the overall array structure of an item. The method
     * also base64 decodes the value any Binary attributes
     *
     * @param array $attribute
     *
     * @return array|string
     */
    protected function processAttribute(array $attribute)
    {
        list($type, $value) = each($attribute);

        if ($type === 'B') {
            $value = base64_decode($value);
        } elseif ($type === 'BS') {
            $value = array_map('base64_decode', $value);
        }

        return $value;
    }
}
