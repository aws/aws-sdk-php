<?php
namespace Aws\Test\S3;

use Aws\Credentials\Credentials;
use Aws\S3\PostObject;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\PostObject
 */
class PostObjectTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    protected $client;

    public function setUp()
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
        $this->assertEquals('ffajJbr1afVRb3qoFwdn9RK+qfM=', $a['signature']);
        $this->assertEquals(
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
        $this->assertEquals('b', $postObject->getFormInputs()['a']);
        $postObject->setFormAttribute('c', 'd');
        $this->assertEquals('d', $postObject->getFormAttributes()['c']);
        $this->assertEquals('', $postObject->getJsonPolicy());
    }

    public function testCanHandleDomainsWithDots()
    {
        $postObject = new PostObject($this->client, 'foo.bar', [], '');
        $formAttrs = $postObject->getFormAttributes();
        $this->assertEquals(
            'https://s3.amazonaws.com/foo.bar',
            $formAttrs['action']
        );
    }
}
