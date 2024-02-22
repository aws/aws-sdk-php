<?php

namespace Aws\IMDS;

use Aws\IMDS\Exceptions\MetadataNotFoundException;

interface Ec2MetadataGetStrategy
{
    /**
     * This method is used to execute the get request against the Ec2 metadata service.
     * @param string $path is the path to query the Ec2 metadata service.
     * @return Ec2MetadataResponse
     * @throws MetadataNotFoundException
     */
    public function get($path);
}
