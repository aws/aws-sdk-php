<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\S3\Integration;

use Aws\DynamoDb\DynamoDbClient;
use Aws\S3\Model\ClearBucket;
use Guzzle\Http\EntityBody;

/**
 * @group example
 * @group integration
 * @outputBuffering enabled
 */
class S3_20060301_Test extends \Aws\Tests\IntegrationTestCase
{
    protected $client;
    protected $bucket;

    public static function setUpBeforeClass()
    {
        $bucket = self::getResourcePrefix() . '-s3-test';
        $client = self::getServiceBuilder()->get('s3', true);
        $client->setRegion('us-west-2');

        // Delete the bucket if it exists
        try {
            self::log('Clearing bucket ' . $bucket);
            $clear = new ClearBucket($client, $bucket);
            $clear->clear();
            self::log('Deleting bucket');
            $client->deleteBucket(array('Bucket' => $bucket));
            self::log('Bucket deleted');
        } catch (\Exception $e) {
            self::log($e->getMessage());
        }

        // Wait until the bucket does not exist before starting the test
        self::log('Waiting until the bucket does not exist');
        $client->waitUntilBucketNotExists(array('Bucket' => $bucket));
        self::log('Beginning test');
    }

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('s3', true);
        $this->bucket = self::getResourcePrefix() . '-s3-test';
        $this->client->setRegion('us-west-2');
    }

    /**
     * Create an Amazon S3 bucket
     *
     * @expectedException \Aws\S3\Exception\BucketAlreadyExistsException
     * @example Aws\S3\S3Client::createBucket
     */
    public function testBucketAlreadyExists()
    {
        $client = $this->client;
        $client->setRegion('us-east-1');
        // @begin

        $client->createBucket(array('Bucket' => 'mybucket'));
    }

    /**
     * Create a bucket in a specific region
     *
     * @depends testBucketAlreadyExists
     * @example Aws\S3\S3Client::createBucket
     */
    public function testCreateBucketInRegion()
    {
        $client = $this->client;
        $bucket = $this->bucket;

        // Don't run if the bucket exists
        if ($client->doesBucketExist($bucket)) {
            return self::log('Bucket already exists');
        }

        // @begin

        // Create a valid bucket and use a LocationConstraint
        $result = $client->createBucket(array(
            'Bucket'             => $bucket,
            'LocationConstraint' => \Aws\Common\Enum\Region::US_WEST_2
        ));

        // Get the Location header of the response
        echo $result['Location'] . "\n";

        // Get the request ID
        echo $result['RequestId'] . "\n";

        // @end
        $this->assertContains($this->bucket, $this->getActualOutput());
        $this->assertNotEmpty($result['RequestId']);
    }

    /**
     * Poll a bucket until it exists
     *
     * @depends testCreateBucketInRegion
     * @example Aws\S3\S3Client::waitUntilBucketExists
     */
    public function testWaitUntilBucketExists()
    {
        $client = $this->client;
        $bucket = $this->bucket;

        // @begin
        // Poll the bucket until it is accessible
        $client->waitUntilBucketExists(array('Bucket' => $bucket));
    }

    /**
     * Upload an object to a bucket using a string for the object body
     *
     * @depends testWaitUntilBucketExists
     * @example Aws\S3\S3Client::putObject
     */
    public function testPutObject()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        // Upload an object to Amazon S3
        $result = $client->putObject(array(
            'Bucket' => $bucket,
            'Key'    => 'data.txt',
            'Body'   => 'Hello!'
        ));

        // Access parts of the result object
        echo $result['Expiration'] . "\n";
        echo $result['ServerSideEncryption'] . "\n";
        echo $result['ETag'] . "\n";
        echo $result['VersionId'] . "\n";
        echo $result['RequestId'] . "\n";

        // Get the URL the object can be downloaded from
        echo $result['ObjectURL'] . "\n";

        // @end
        $this->assertContains(
            'https://' . $this->bucket . '.s3-us-west-2.amazonaws.com/data.txt',
            $this->getActualOutput()
        );
    }

    /**
     * Upload an object by streaming the contents of a file
     *
     * @depends testPutObject
     * @example Aws\S3\S3Client::putObject
     */
    public function testPutObjectFromFile()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        $pathToFile = __FILE__;
        // @begin

        // Upload an object by streaming the contents of a file
        // $pathToFile should be absolute path to a file on disk
        $result = $client->putObject(array(
            'Bucket'     => $bucket,
            'Key'        => 'data_from_file.txt',
            'SourceFile' => $pathToFile,
            'Metadata'   => array(
                'Foo' => 'abc',
                'Baz' => '123'
            )
        ));

        // We can poll the object until it is accessible
        $client->waitUntilObjectExists(array(
            'Bucket' => $this->bucket,
            'Key'    => 'data_from_file.txt'
        ));

        // @end

        // Ensure that the file was uploaded correctly
        $this->assertEquals(
            file_get_contents(__FILE__),
            (string) $client->getObject(array(
                'Bucket' => $this->bucket,
                'Key' => 'data_from_file.txt'
            ))->get('Body')
        );
    }

    /**
     * Upload an object by streaming the contents of a PHP stream
     *
     * @depends testPutObjectFromFile
     * @example Aws\S3\S3Client::putObject
     */
    public function testPutObjectFromStream()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        $pathToFile = __FILE__;
        // @begin

        // Upload an object by streaming the contents of a PHP stream
        $client->putObject(array(
            'Bucket' => $bucket,
            'Key'    => 'data_from_stream.txt',
            'Body'   => fopen($pathToFile, 'r+')
        ));

        // @end
        $client->waitUntilObjectExists(array(
            'Bucket' => $this->bucket,
            'Key' => 'data_from_stream.txt'
        ));

        // Ensure that the file was uploaded correctly
        $this->assertEquals(
            file_get_contents(__FILE__),
            (string) $client->getObject(array(
                'Bucket' => $this->bucket,
                'Key' => 'data_from_stream.txt'
            ))->get('Body')
        );
    }

    /**
     * Upload an object by streaming the contents of a Guzzle\Http\EntityBodyInterface object
     *
     * @depends testPutObjectFromStream
     * @example Aws\S3\S3Client::putObject
     */
    public function testPutObjectFromEntityBody()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        $pathToFile = __FILE__;
        // @begin

        // Be sure to add a use statement at the beginning of you script:
        // use Guzzle\Http\EntityBody;

        // Upload an object by streaming the contents of an EntityBody object
        $client->putObject(array(
            'Bucket' => $bucket,
            'Key'    => 'data_from_entity_body.txt',
            'Body'   => EntityBody::factory(fopen($pathToFile, 'r+'))
        ));

        // @end
        $client->waitUntilObjectExists(array(
            'Bucket' => $this->bucket,
            'Key' => 'data_from_entity_body.txt'
        ));

        // Ensure that the file was uploaded correctly
        $this->assertEquals(
            file_get_contents(__FILE__),
            (string) $client->getObject(array(
                'Bucket' => $this->bucket,
                'Key' => 'data_from_entity_body.txt'
            ))->get('Body')
        );
    }

    /**
     * Send a ListBuckets request
     *
     * @depends testPutObjectFromEntityBody
     * @example Aws\S3\S3Client::listBuckets
     */
    public function testListBuckets()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        // @begin

        $result = $client->listBuckets();

        foreach ($result['Buckets'] as $bucket) {
            // Each Bucket value will contain a Name and CreationDate
            echo "{$bucket['Name']} - {$bucket['CreationDate']}\n";
        }

        // @end
        $this->assertContains($this->bucket, $this->getActualOutput());
    }

    /**
     * Send a ListBuckets request and use the getPath() method to grab nested data from the response model
     *
     * @depends testListBuckets
     * @example Aws\S3\S3Client::listBuckets
     */
    public function testListBucketsWithGetPath()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        // @begin

        // Grab the nested Owner/ID value from the result model using getPath()
        $result = $client->listBuckets();
        echo $result->getPath('Owner/ID') . "\n";

        // @end
        $this->assertNotEmpty($this->getActualOutput());
    }

    /**
     * List all objects in a bucket using a ListObjects iterator
     *
     * @depends testListBucketsWithGetPath
     * @example Aws\S3\S3Client::listObjects
     */
    public function testListObjectsWithIterator()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        $iterator = $client->getIterator('ListObjects', array(
            'Bucket' => $bucket
        ));

        foreach ($iterator as $object) {
            echo $object['Key'] . "\n";
        }

        // @end

        // Ensure that the objects that have been uploaded so far are in the results
        $this->assertContains('data_from_entity_body.txt', $this->getActualOutput());
        $this->assertContains('data_from_stream.txt', $this->getActualOutput());
        $this->assertContains('data.txt', $this->getActualOutput());
    }

    /**
     * Get an object from a bucket
     *
     * @depends testListObjectsWithIterator
     * @example Aws\S3\S3Client::getObject
     */
    public function testGetObject()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        // Get an object using the getObject operation
        $result = $client->getObject(array(
            'Bucket' => $bucket,
            'Key'    => 'data.txt'
        ));

        // The 'Body' value of the result is an EntityBody object
        echo get_class($result['Body']) . "\n";
        // > Guzzle\Http\EntityBody

        // The 'Body' value can be cast to a string
        echo $result['Body'] . "\n";
        // > Hello!

        // @end
        $this->assertEquals("Guzzle\\Http\\EntityBody\nHello!\n", $this->getActualOutput());
    }

    /**
     * Get an object from a bucket and interact with the body of the object
     *
     * @depends testGetObject
     * @example Aws\S3\S3Client::getObject
     */
    public function testGetObjectUsingEntityBody()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;

        // Get an object using the getObject operation
        $result = $client->getObject(array(
            'Bucket' => $bucket,
            'Key'    => 'data.txt'
        ));

        // @begin

        // Seek to the beginning of the stream
        $result['Body']->rewind();

        // Read the body off of the underlying stream in chunks
        while ($data = $result['Body']->read(1024)) {
            echo $data;
        }

        // Cast the body to a primitive string
        // Warning: This loads the entire contents into memory!
        $bodyAsString = (string) $result['Body'];

        // @end
        $this->assertEquals('Hello!', $this->getActualOutput());
        $this->assertEquals('Hello!', $bodyAsString);
    }

    /**
     * Get an object from a bucket and save the object directly to a file
     *
     * @depends testGetObjectUsingEntityBody
     * @example Aws\S3\S3Client::getObject
     */
    public function testGetObjectWithSaveAs()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        $result = $client->getObject(array(
            'Bucket' => $bucket,
            'Key'    => 'data.txt',
            'SaveAs' => '/tmp/data.txt'
        ));

        // Contains an EntityBody that wraps a file resource of /tmp/data.txt
        echo $result['Body']->getUri() . "\n";
        // > /tmp/data.txt

        // @end
        $this->assertEquals("/tmp/data.txt\n", $this->getActualOutput());
    }

    /**
     * Create a presigned URL with a command object
     *
     * @depends testGetObjectWithSaveAs
     * @example Aws\S3\S3Client::createPresignedUrl
     * @example Aws\S3\Command\S3Command::createPresignedUrl
     */
    public function testCreatePresignedUrlFromCommand()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        // Get a command object from the client and pass in any options
        // available in the GetObject command (e.g. ResponseContentDisposition)
        $command = $client->getCommand('GetObject', array(
            'Bucket' => $bucket,
            'Key' => 'data.txt',
            'ResponseContentDisposition' => 'attachment; filename="data.txt"'
        ));

        // Create a signed URL from the command object that will last for
        // 10 minutes from the current time
        $signedUrl = $command->createPresignedUrl('+10 minutes');

        echo file_get_contents($signedUrl);
        // > Hello!

        // @end
        $this->assertEquals('Hello!', $this->getActualOutput());
    }

    /**
     * Create a presigned URL from a custom request object
     *
     * @depends testCreatePresignedUrlFromCommand
     * @example Aws\S3\S3Client::createPresignedUrl
     */
    public function testCreatePresignedUrl()
    {
        $this->client->waitUntilBucketExists(array('Bucket' => $this->bucket));
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        $key = 'data.txt';
        $url = "{$bucket}/{$key}";

        // get() returns a Guzzle\Http\Message\Request object
        $request = $client->get($url);

        // Create a signed URL from a completely custom HTTP request that
        // will last for 10 minutes from the current time
        $signedUrl = $this->client->createPresignedUrl($request, '+10 minutes');

        echo file_get_contents($signedUrl);
        // > Hello!

        // @end
        $this->assertEquals('Hello!', $this->getActualOutput());
    }

    /**
     * Clear the contents and delete a bucket
     *
     * @depends testCreatePresignedUrl
     * @example Aws\S3\S3Client::clearBucket
     * @example Aws\S3\S3Client::deleteBucket
     * @example Aws\S3\S3Client::waitUntilBucketNotExists
     */
    public function testCleanUpBucket()
    {
        $client = $this->client;
        $bucket = $this->bucket;
        // @begin

        // Delete the objects in the bucket before attempting to delete
        // the bucket
        $clear = new ClearBucket($client, $bucket);
        $clear->clear();

        // Delete the bucket
        $client->deleteBucket(array('Bucket' => $bucket));

        // Wait until the bucket is not accessible
        $client->waitUntilBucketNotExists(array('Bucket' => $bucket));
    }
}
