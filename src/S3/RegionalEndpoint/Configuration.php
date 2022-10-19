<?php
namespace Aws\S3\RegionalEndpoint;

class Configuration implements ConfigurationInterface
{
    private $endpointsType;
    private $isDefault;

    public function __construct($endpointsType, $isDefault = false)
    {
        $this->endpointsType = strtolower($endpointsType);
        $this->isDefault = $isDefault;
        if (!in_array($this->endpointsType, ['legacy', 'regional'])) {
            throw new \InvalidArgumentException(
                "Configuration parameter must either be 'legacy' or 'regional'."
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointsType()
    {
        return $this->endpointsType;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'endpoints_type' => $this->getEndpointsType()
        ];
    }

    public function isDefault()
    {
        return $this->isDefault;
    }
}
