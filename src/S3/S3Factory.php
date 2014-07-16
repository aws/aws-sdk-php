<?php
namespace Aws\S3;

use Aws\Common\ClientFactory;
use Aws\Common\Signature\S3Signature;
use Aws\Common\Subscriber\UploadBody;
use Aws\S3\Subscriber\ApplyMd5;
use Aws\S3\Subscriber\BucketStyle;
use Aws\S3\Subscriber\PermanentRedirect;
use Aws\S3\Subscriber\PutObjectUrl;

/**
 * @internal
 */
class S3Factory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        $emitter = $client->getEmitter();
        $emitter->attach(new BucketStyle);
        $emitter->attach(new PermanentRedirect);
        $emitter->attach(new PutObjectUrl);
        $emitter->attach(new UploadBody(['PutObject', 'UploadPart']));
        $emitter->attach(new ApplyMd5);

        return $client;
    }

    protected function createSignature($version, $signingName, $region)
    {
        return $version === 's3'
            ? new S3Signature()
            : parent::createSignature($version, $signingName, $region);
    }
}
