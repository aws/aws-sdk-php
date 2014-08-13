<?php
namespace Aws\S3;

use Aws\Common\ClientFactory;
use Aws\Common\Signature\S3Signature;
use Aws\Common\Signature\S3SignatureV4;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Subscriber\SaveAs;
use Aws\Common\Subscriber\SourceFile;
use Aws\S3\Subscriber\ApplyMd5;
use Aws\S3\Subscriber\BucketStyle;
use Aws\S3\Subscriber\PermanentRedirect;
use Aws\S3\Subscriber\PutObjectUrl;

/**
 * @internal
 */
class S3Factory extends ClientFactory
{
    /**
     * {@inheritdoc}
     *
     * Amazon S3 does not require a region for the "classic" endpoint.
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['region'])) {
            $args['region'] = 'us-east-1';
        }

        parent::addDefaultArgs($args);
    }

    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        // S3Client should calculate MD5 checksums for uploads unless explicitly
        // disabled or using SignatureV4.
        $client->setConfig('calculate_md5', isset($args['calculate_md5'])
            ? $args['calculate_md5']
            : (!$client->getSignature() instanceof SignatureV4)
        );

        $emitter = $client->getEmitter();
        $emitter->attach(new BucketStyle);
        $emitter->attach(new PermanentRedirect);
        $emitter->attach(new PutObjectUrl);
        $emitter->attach(new SourceFile);
        $emitter->attach(new ApplyMd5);
        $emitter->attach(new SaveAs);

        return $client;
    }

    protected function createSignature($version, $signingName, $region)
    {
        if ($version == 's3') {
            return new S3Signature();
        } elseif ($version == 'v4') {
            return new S3SignatureV4($signingName, $region);
        }

        throw new \InvalidArgumentException('Amazon S3 supports signature '
            . 'version "s3" or "v4"');
    }
}
