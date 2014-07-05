<?php
namespace Aws\S3;

use Aws\Common\ClientFactory;
use Aws\Common\Signature\S3Signature;
use Aws\Common\Signature\S3SignatureV4;

/**
 * @internal
 */
class S3Factory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        $client->getEmitter()->attach(new BucketStyleSubscriber);

        return $client;
    }

    protected function createSignature($version, $signingName, $region)
    {
        switch ($version) {
            case 'v4':
                return new S3SignatureV4($signingName, $region);
            case 's3':
                return new S3Signature();
        }

        throw new \InvalidArgumentException('Unable to create the signature.');
    }
}
