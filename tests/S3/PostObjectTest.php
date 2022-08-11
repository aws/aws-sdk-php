<?php
namespace Aws\Test\S3;

use Aws\Credentials\Credentials;
use Aws\S3\PostObject;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\S3\PostObject
 */
class PostObjectTest extends TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    protected $client;

    public function set_up()
    {
        $this->client = $this->getTestClient(
            's3',
            [
                'credentials' => new Credentials(
                    'AKIAXXXXXXXXXXXXXXX',
                    'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
                )
            ]
        );
    }

    public function testSignsPostPolicy()
    {
        $policy = [
            'expiration' => '2007-12-01T12:00:00.000Z',
            'conditions' => [
                'acl' => 'public-read'
            ]
        ];
        $p = new PostObject($this->client, 'foo', [], $policy);
        $a = $p->getFormInputs();
        $this->assertSame(
            'eyJleHBpcmF0aW9uIjoiMjAwNy0xMi0wMVQxMjowMDowMC4wMDBaIiwiY29uZGl0aW9ucyI6eyJhY2wiOiJwdWJsaWMtcmVhZCJ9fQ==',
            $a['policy']
        );
        $this->assertSame('ffajJbr1afVRb3qoFwdn9RK+qfM=', $a['signature']);
        $this->assertSame(
            '{"expiration":"2007-12-01T12:00:00.000Z","conditions":{"acl":"public-read"}}',
            $p->getJsonPolicy()
        );
    }

    public function testClientAndBucketGetters()
    {
        $postObject = new PostObject($this->client, 'foo', [], '');
        $this->assertSame($this->client, $postObject->getClient());
        $this->assertSame('foo', $postObject->getBucket());
        $postObject->setFormInput('a', 'b');
        $this->assertSame('b', $postObject->getFormInputs()['a']);
        $postObject->setFormAttribute('c', 'd');
        $this->assertSame('d', $postObject->getFormAttributes()['c']);
        $this->assertSame('', $postObject->getJsonPolicy());
    }

    public function testCanHandleDomainsWithDots()
    {
        $postObject = new PostObject($this->client, 'foo.bar', [], '');
        $formAttrs = $postObject->getFormAttributes();
        $this->assertSame(
            'https://s3.amazonaws.com/foo.bar',
            $formAttrs['action']
        );
    }

    /**
     * @dataProvider pathStyleProvider
     *
     * @param string $endpoint
     * @param string $bucket
     * @param string $expected
     */
    public function testCanHandleForcedPathStyleEndpoint($endpoint, $bucket, $expected)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'akid',
                'secret' => 'secret',
            ],
            'endpoint' => $endpoint,
            'use_path_style_endpoint' => true,
        ]);
        $policy = [
            'expiration' => '2007-12-01T12:00:00.000Z',
            'conditions' => [
                'acl' => 'public-read'
            ]
        ];
        $postObject = new PostObject($s3, $bucket, [], $policy);
        $formAttrs = $postObject->getFormAttributes();
        $this->assertSame($expected, $formAttrs['action']);
    }

    public function pathStyleProvider()
    {
        return [
            ['http://s3.amazonaws.com', 'foo', 'http://s3.amazonaws.com/foo'],
            ['http://s3.amazonaws.com', 'foo.bar', 'http://s3.amazonaws.com/foo.bar'],
            ['http://foo.com', 'foo.com', 'http://foo.com/foo.com'],
        ];
    }
}
