<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\S3Client;
use Aws\S3\Command\DefaultCommand;
use Guzzle\Http\Url;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\S3\Command\DefaultCommand
 */
class DefaultCommandTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var S3Client
     */
    protected $client;

    /**
     * @var DefaultCommand
     */
    protected $command;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('s3');
        $this->command = new DefaultCommand();
        $this->command->setClient($this->client);
    }

    public function testAllowsCommandsWithNoBucket()
    {
        $this->assertSame((string) Url::factory($this->client->getBaseUrl()), $this->command->prepare()->getUrl());
    }

    public function testBuildsCommandsWithForcedPathStyleBuckets()
    {
        $this->command['bucket'] = 'test';
        $this->command['bucket.path_style'] = true;
        $clientUrl = Url::factory($this->client->getBaseUrl());
        $this->assertEquals((string) $clientUrl . 'test', $this->command->prepare()->getUrl());
    }

    public function testBuildsCommandsWithCircumstantialPathStyleHosting()
    {
        $this->command['bucket'] = 'foo_bar';
        $clientUrl = Url::factory($this->client->getBaseUrl());
        $this->assertEquals((string) $clientUrl . 'foo_bar', $this->command->prepare()->getUrl());
    }

    public function testBuildsCommandsWithVirtualHostedBucket()
    {
        $this->command['bucket'] = 'test';
        $clientUrl = Url::factory($this->client->getBaseUrl());
        $clientUrl->setHost('test.' . $clientUrl->getHost());
        $this->assertEquals((string) $clientUrl, $this->command->prepare()->getUrl());
    }

    public function testParsesXmlOnCommandsThatRequireIt()
    {
        $this->command['bucket'] = 'test';
        $this->command['command.expects'] = 'application/xml';
        $request = $this->command->prepare();
        $request->setResponse(Response::fromMessage("HTTP/1.1 200 OK\r\n\r\n<foo><baz>Bar</baz></foo>"), true);
        $this->assertInstanceOf('SimpleXMLElement', $this->command->execute());
    }

    public function testPassesOnProcessingNonXmlResponses()
    {
        $this->command['bucket'] = 'test';
        $request = $this->command->prepare();
        $request->setResponse(Response::fromMessage("HTTP/1.1 200 OK\r\n\r\nTest"), true);
        $this->assertInstanceOf('Guzzle\Http\Message\Response', $this->command->execute());
    }

    public function testInjectsKeysWhenPresent()
    {
        $this->command['bucket'] = 'test';
        $this->command['key'] = 'foo';
        $request = $this->command->prepare();
        $this->assertEquals('/foo', $request->getPath());
    }

    public function testInjectsKeysAndUrlEncodesWhenPresent()
    {
        $this->command['bucket'] = 'test';
        $this->command['key'] = '/foo/baz/bar#';
        $request = $this->command->prepare();
        $this->assertEquals('/foo/baz/bar%23', $request->getPath());
    }

    public function testCanSetGlobalLevelPathStyleRequests()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $client->getConfig()->set('bucket.path_style', true);
        $command = $client->getCommand('HeadBucket', array(
            'bucket' => 'foobar'
        ));
        $this->assertEquals('/foobar', $command->prepare()->getPath());
    }

    public function testAddsContentMd5WhenPrompted()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $command = $client->getCommand('PutObject', array(
            'bucket'  => 'foobar',
            'key'     => 'foo',
            'body'    => 'abc',
            'use_md5' => true
        ));
        $this->assertEquals('kAFQmDzST7DWlj99KOF/cg==', (string) $command->prepare()->getHeader('Content-MD5'));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     */
    public function testThrowsExceptionWhenAttemptingToAddMd5WhenNoBody()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $client->getCommand('DefaultCommand', array(
            'use_md5' => true
        ))->prepare();
    }
}
