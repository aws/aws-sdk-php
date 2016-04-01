<?php
namespace Aws\Endpoint;

class PartitionEndpointProvider
{
    /** @var Partition[] */
    private $partitions;

    public function __construct(array $partitions)
    {
        $this->partitions = array_map(function (array $definition) {
            return new Partition($definition);
        }, array_values($partitions));
    }

    public function __invoke(array $args = [])
    {
        $partition = $this->getPartitionFromRegion(
            isset($args['region']) ? $args['region'] : ''
        );

        return $partition($args);
    }

    /**
     * Returns the partition containing the provided region or the default
     * partition if no match is found.
     *
     * @param string $region
     *
     * @return Partition
     */
    public function getPartitionFromRegion($region)
    {
        foreach ($this->partitions as $partition) {
            if ($partition->matchesRegion($region)) {
                return $partition;
            }
        }

        return $this->partitions[0];
    }

    /**
     * Returns the partition with the provided name or null if no region with
     * the provided name can be found.
     *
     * @param string $name
     * 
     * @return Partition|null
     */
    public function getPartitionByName($name)
    {
        foreach ($this->partitions as $partition) {
            if ($name === $partition['partition']) {
                return $partition;
            }
        }
    }

    /**
     * Creates and returns the default SDK partition provider.
     *
     * @return PartitionEndpointProvider
     */
    public static function defaultProvider()
    {
        $data = \Aws\load_compiled_json(__DIR__ . '/../data/endpoints.json');

        return new self($data['partitions']);
    }
}
