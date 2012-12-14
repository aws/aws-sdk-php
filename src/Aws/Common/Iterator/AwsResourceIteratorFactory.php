<?php

namespace Aws\Common\Iterator;

use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Collection;
use Guzzle\Common\Exception\InvalidArgumentException as GuzzleInvalidArgumentException;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Resource\ResourceIteratorFactoryInterface;

/**
 * Resource iterator factory used to instantiate the default AWS resource iterator with the correct configuration or
 * use a concrete iterator class if one exists
 */
class AwsResourceIteratorFactory implements ResourceIteratorFactoryInterface
{
    /**
     * @var array Default configuration values for iterators
     */
    protected static $defaultConfig = array(
        'limit_key'   => null,
        'limit_param' => null,
        'more_key'    => null,
        'token_key'   => null,
        'token_param' => null,
        'operations'  => array(),
    );

    /**
     * @var Collection The configuration for the iterators
     */
    protected $config;

    /**
     * @var Collection Additional configurations for specific iterators
     */
    protected $operations;

    /**
     * @var ResourceIteratorFactoryInterface Another factory that will be used first to instantiate the iterator
     */
    protected $primaryIteratorFactory;

    /**
     * @param array                            $config                 An array of configuration values for the factory
     * @param ResourceIteratorFactoryInterface $primaryIteratorFactory Another factory to use for chain of command
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $config, ResourceIteratorFactoryInterface $primaryIteratorFactory = null)
    {
        $this->primaryIteratorFactory = $primaryIteratorFactory;

        // Set up the config with default values
        $this->config = Collection::fromConfig($config, self::$defaultConfig);

        // Pull out the operation-specific configurations
        $this->operations = new Collection();
        $potentialOperations = $this->config->get('operations') ?: array();
        $this->config->remove('operations');
        foreach ($potentialOperations as $key => $value) {
            if (is_int($key) && is_string($value)) {
                $this->operations->set($value, array());
            } elseif (is_string($key) && is_array($value)) {
                $this->operations->set($key, $value);
            } else {
                throw new InvalidArgumentException('The iterator factory configuration was invalid.');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function build($data, array $options = array())
    {
        // Make sure $data is a command
        if ($data instanceof CommandInterface) {
            /** @var $command CommandInterface */
            $command = $data;
        } else {
            throw new InvalidArgumentException('The first argument must be an instance of CommandInterface');
        }

        // Get the configuration data for the command
        $commandName = $command->getName();
        $iteratorConfig = $this->operations->get($commandName) ?: array();
        $options = array_replace($this->config->getAll(), $iteratorConfig, $options);

        // Instantiate the iterator using the primary factory (if there is one)
        $iterator = null;
        if ($this->primaryIteratorFactory) {
            try {
                $iterator = $this->primaryIteratorFactory->build($data, $options);
            } catch (GuzzleInvalidArgumentException $e) {
                // Noop. Leave the iterator as null
            }
        }

        // Fallback to this factory for creating the iterator if the primary factory did not work
        if (!$iterator) {
            // If the primary factory and this factory cannot find the requested iterator, throw an exception
            if (!$this->operations->hasKey($commandName)) {
                throw new InvalidArgumentException("Iterator was not found for {$commandName}.");
            }

            // Create a configure default AWS iterator
            $iterator = new AwsResourceIterator($data, $options);
        }

        return $iterator;
    }
}
