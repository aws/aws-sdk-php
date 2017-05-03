<?php

namespace Aws\Test\Integ;

use Aws\S3\S3Client;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class NativeStreamContext extends \PHPUnit_Framework_Assert implements
    Context,
    SnippetAcceptingContext
{
    use IntegUtils;

    /** @var S3Client */
    private $client;
    /** @var bool */
    private $callSucceeded;
    /** @var resource */
    private $handle;
    /** @var string */
    private static $bucket;

    public function __destruct()
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
        }
    }

    /**
     * @BeforeFeature @s3
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpS3Bucket(BeforeFeatureScope $scope)
    {
        $client = self::getSdk()
            ->createS3();

        self::$bucket = self::getResourcePrefix()
            . str_replace(' ', '-', strtolower($scope->getName()));

        $client->createBucket(['Bucket' => self::$bucket]);
        $client->waitUntil('BucketExists', ['Bucket' => self::$bucket]);
    }

    /**
     * @AfterFeature @s3
     *
     * @param AfterFeatureScope $scope
     */
    public static function tearDownS3Bucket(AfterFeatureScope $scope)
    {
        $client = self::getSdk()->createS3();

        $client->deleteMatchingObjects(self::$bucket, '', '//');
        $client->deleteBucket(['Bucket' => self::$bucket]);

        self::$bucket = null;
    }

    /**
     * @Given I have a :service client
     */
    public function iHaveAClient($service)
    {
        $this->client = self::getSdk()->createClient($service);
    }

    /**
     * @Given have registered an s3 stream wrapper
     */
    public function haveRegisteredAnS3StreamWrapper()
    {
        $this->client->registerStreamWrapper();
    }

    /**
     * @Given I create a subdirectory :subdir with mkdir
     */
    public function iCreateASubdirectory($subdir)
    {
        mkdir($this->getS3Path($subdir));
        sleep(1);
    }

    /**
     * @When /^I call (\w+) on the (\S+) path$/
     */
    public function iCallOnThePath($method, $path)
    {
        $this->callSucceeded = call_user_func($method, $this->getS3Path($path));
    }

    /**
     * @Then /^the call should return (true|false)$/
     */
    public function theCallShouldReturn($booleanString)
    {
        $this->assertSame(
            filter_var($booleanString, FILTER_VALIDATE_BOOLEAN),
            $this->callSucceeded
        );
    }

    /**
     * @Given I have a file at :path with the content :contents
     */
    public function iHaveAFileAtWithTheContent($path, $contents)
    {
        $this->assertGreaterThan(
            0,
            file_put_contents($this->getS3Path($path), $contents)
        );
    }

    /**
     * @Given I have a file at :path with no content
     */
    public function iHaveAFileAtWithNoContent($path)
    {
        $this->assertSame(0, file_put_contents($this->getS3Path($path), ''));
    }

    /**
     * @Then the file at :arg1 should contain :arg2
     */
    public function theFileAtShouldContain($key, $contents)
    {
        $this->assertSame($contents, file_get_contents($this->getS3Path($key)));
    }

    /**
     * @Given I have a read handle on the file at :arg1
     */
    public function iHaveAReadHandleOnTheFileAt($key)
    {
        $this->handle = fopen($this->getS3Path($key), 'r');
    }

    /**
     * @Then /^reading (\d+) bytes should return (.+)$/
     */
    public function readingBytesShouldReturn($byteCount, $expected)
    {
        $this->assertSame($expected, fread($this->handle, $byteCount));
    }

    /**
     * @Then /^calling fstat should report a size of (\d+)$/
     */
    public function callingFstatShouldReportASizeOf($size)
    {
        $this->assertSame((int) $size, fstat($this->handle)['size']);
    }

    /**
     * @Then scanning the directory at :dir should return a list with one member named :file
     */
    public function scanningTheDirectoryAtShouldReturnAListWithOneMemberNamed($dir, $file)
    {
        $this->assertSame([$file], scandir($this->getS3Path($dir)));
    }

    private function getS3Path($path)
    {
        return 's3://' . self::$bucket . '/' . ltrim($path, '/');
    }
}
