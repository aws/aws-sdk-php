# Amazon S3 Encryption Client for PHP V3

This library provides an S3 client that supports client-side encryption.
`S3EncryptionClientV3` is the v3 of the Amazon S3 Encryption Client for the PHP programming language.

The V3 encryption client requires a minimum version of **PHP >= 8.1**.
The V3 encryption client requires the extension `openssl`.

Jump To:

* [Migration](#migration)

## Quick Examples

### Create an Amazon S3 Encryption Client

```php
<?php
// Require the Composer autoloader.
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Crypto\S3EncryptionClientV3;

// Instantiate an Amazon S3 client.
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);

// Instantiate an Amazon S3 Encryption Client V3.
$client = new S3EncryptionClientV3($s3Client);

### Upload a file to Amazon S3 using client side encryption

$kmsKeyId = 'kms-key-id';
$materialsProvider = new KmsMaterialsProviderV3(
    new KmsClient([
        'profile' => 'default',
        'region' => 'us-east-1',
        'version' => 'latest',
    ]),
    $kmsKeyId
);

$bucket = 'the-bucket-name';
$key = 'the-file-name';
$cipherOptions = [
    'Cipher' => 'gcm',
    'KeySize' => 256,
    // Additional configuration options
];

$result = $client->putObject([
    '@MaterialsProvider' => $materialsProvider,
    '@CipherOptions' => $cipherOptions,
    '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
    '@KmsEncryptionContext' => ['context-key' => 'context-value'],
    'Bucket' => $bucket,
    'Key' => $key,
    'Body' => fopen('file-to-encrypt.txt', 'r'),
]);

```

## Migration

This version of the library supports reading encrypted objects from previous versions with extra configuration.
It also supports writing objects with non-legacy algorithms.
The list of legacy modes and operations will be provided below.

* [2.x to 3.x Migration Guide](https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/s3-encryption-migration-v2-v3.html)
* [1.x to 2.x Migration Guide](https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/s3-encryption-migration-v1-v2.html)

## Security

See [CONTRIBUTING](../../../CONTRIBUTING.md#security-issue-notifications) for more information.

## License

This project is licensed under the Apache-2.0 License.
