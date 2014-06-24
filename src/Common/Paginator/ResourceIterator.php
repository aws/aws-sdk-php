<?php
namespace Aws\Common\Paginator;

class ResourceIterator implements \OuterIterator
{
    /** @var ResultPaginator */
    private $paginator;

    /** @var array */
    private $resources;

    /** @var int */
    private $resourceIndex = 0;

    /** @var int */
    private $index;

    /** @var array Array of strings */
    private $path;

    /** @var int */
    private $limit;

    /**
     * The config array accepts the following keys:
     *
     * - limit: The total number of resources to return
     * - result_key: JMESPath expressions referencing where resources are found
     * - limit_key: Which command parameter is used to specify a limit
     *
     * @param ResultPaginator $paginator
     * @param array           $config
     */
    public function __construct(ResultPaginator $paginator, array $config = [])
    {
        $this->paginator = $paginator;
        $this->limit = isset($config['limit']) ? $config['limit'] : null;
        $this->path = isset($config['result_key'])
            ? $config['result_key']
            : $paginator->getConfig('result_key');
        $this->path = (array) $this->path;
    }

    public function getInnerIterator()
    {
        return $this->paginator;
    }

    public function current()
    {
        return $this->valid()
            ? $this->resources[$this->index]
            : false;
    }

    public function key()
    {
        return $this->valid() ? $this->resourceIndex : null;
    }

    public function next()
    {
        $this->index++;
        $this->resourceIndex++;
    }

    public function valid()
    {
        if ($this->limit && $this->resourceIndex >= $this->limit) {
            return false;
        }

        if (isset($this->resources[$this->index])) {
            return true;
        }

        $this->loadNextResources();

        return isset($this->resources[$this->index]);
    }

    public function rewind()
    {
        $this->resourceIndex = 0;
        $this->index = 0;
        $this->resources = [];
        $this->paginator->rewind();
    }

    private function loadNextResources()
    {
        // Reset the internal array
        $this->index = 0;
        $this->resources = [];

        // Apply a limit, if specified... and possible
        $args = [];
        if ($this->limit && ($key = $this->paginator->getConfig('limit_key'))) {
            $args[$key] = $this->limit;
            if ($this->limit > $this->resourceIndex) {
                $args[$key] = $this->limit - $this->resourceIndex;
            }
        }

        // Get the next available set of resources
        while ($result = $this->paginator->getNext($args)) {
            foreach ($this->path as $path) {
                if ($this->resources = $result->search($path)) {
                    break(2);
                }
            }
        }
    }
}
