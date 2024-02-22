<?php

namespace Aws\IMDS;

use Aws\IMDS\Exceptions\Ec2MetadataDisabledException;
use Aws\IMDS\Exceptions\MetadataNotFoundException;
use Aws\IMDS\Utils\ConfigFileProvider;
use Aws\IMDS\Utils\Validator;

/**
 * Ec2 metadata client to interact with the Ec2 metadata service.
 */
final class Ec2Metadata
{
    const AWS_EC2_METADATA_DISABLED_KEY = 'AWS_EC2_METADATA_DISABLED';
    const METADATA_TOKEN_PATH = '/latest/api/token';

    /**
     * The configuration holder for this client.
     * @var Ec2MetadataConfig $config
     */
    private $config;
    /**
     * The strategy to be used for performing the get request.
     * By default, it will always use Ec2MetadataV2GetStrategy,
     * which is a strategy around the IMDSv2 specs.
     * @var Ec2MetadataGetStrategy
     */
    private $getStrategy;

    /**
     * @param Ec2MetadataConfig $config
     */
    public function __construct($config)
    {
        $this->ifEc2MetadataDisabledThrowError();
        $this->config = Ec2MetadataConfig::resolveDefaults($config);
        $this->getStrategy = self::defaultGetStrategy($this->config);
    }


    /**
     * The get method that execute the request against the Ec2 metadata service.
     * @param string $path is the path to query against the Ec2 metadata service.
     * @return Ec2MetadataResponse
     * @throws MetadataNotFoundException
     */
    public function get($path) {
        return $this->getStrategy->get($path);
    }

    /**
     * @return Ec2MetadataConfig
     */
    public function config() {
        return $this->config;
    }

    /**
     * This method checks whether Ec2 metadata service is disabled or not.
     * If is disabled then, an exception will be thrown stating so.
     * @return void
     * @throws Ec2MetadataDisabledException
     */
    private function ifEc2MetadataDisabledThrowError() {
        if ((getenv(self::AWS_EC2_METADATA_DISABLED_KEY)
                ?: strtolower(ConfigFileProvider::valueFor(self::AWS_EC2_METADATA_DISABLED_KEY) ?? '')) == "true") {
            throw new Ec2MetadataDisabledException('Ec2 metadata service is disabled!');
        }
    }

    /**
     * @param Ec2MetadataConfig $config the client configuration that the strategy will use
     * to perform the request against the Ec2 metadata service.
     * @return Ec2MetadataV2GetStrategy
     */
    private static function defaultGetStrategy($config) {
        return new Ec2MetadataV2GetStrategy($config);
    }
}
