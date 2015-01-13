<?php
namespace Aws\Test\S3;

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
        $credentials = $this->getMockBuilder('Aws\Credentials\Credentials')
            ->disableOriginalConstructor()
            ->getMock();
        $credentials->expects($this->any())
            ->method('getAccessKeyId')
            ->will($this->returnValue('AKIAXXXXXXXXXXXXXXX'));
        $credentials->expects($this->any())
            ->method('getSecretKey')
            ->will($this->returnValue('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'));

        $this->client = $this->getTestClient(
            's3',
            ['credentials' => $credentials]
        );
    }

    public function getDataForPostObjectTest()
    {
        $cases = [];

        // Inputs capturing starts-with and success_action_status behaviors
        $cases[] = [
            // Options
            [
                'Content-Type' => '^text/',
                'ttd' => 'Nov 24, 1984, midnight GMT',
                'acl' => 'private',
                'success_action_status' => 201,
                'key' => '^foo/bar/${filename}',
                'policy_callback' => function (array $policy) {
                    $policy['conditions'][] = ['fizz' => 'buzz'];
                    return $policy;
                }
            ],
            // Expected Results
            [
                'attributes' => [
                    'action' => 'https://foo.s3.amazonaws.com',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data'
                ],
                'inputs' => [
                    'AWSAccessKeyId' => 'AKIAXXXXXXXXXXXXXXX',
                    'success_action_status' => '201',
                    'key' => 'foo/bar/${filename}',
                    'Content-Type' => 'text/',
                    'acl' => 'private',
                    'policy' => 'eyJleHBpcmF0aW9uIjoiMTk4NC0xMS0yNFQwMDowMDowMFoiLCJjb25kaXRpb25zIjpbeyJidWNrZXQiOiJmb28ifSx7InN1Y2Nlc3NfYWN0aW9uX3N0YXR1cyI6IjIwMSJ9LFsic3RhcnRzLXdpdGgiLCIkQ29udGVudC1UeXBlIiwidGV4dFwvIl0seyJhY2wiOiJwcml2YXRlIn0sWyJzdGFydHMtd2l0aCIsIiRrZXkiLCJmb29cL2JhclwvIl0seyJmaXp6IjoiYnV6eiJ9XX0=',
                    'signature' => 'XKwHh/c1moTcCw1L5xY/xmb/b58='
                ],
                'policy' => '{"expiration":"1984-11-24T00:00:00Z","conditions":[{"bucket":"foo"},{"success_action_status":"201"},["starts-with","$Content-Type","text\/"],{"acl":"private"},["starts-with","$key","foo\/bar\/"],{"fizz":"buzz"}]}'
            ]
        ];

        // Passing in a raw policy
        $cases[] = [
            // Options
            [
                'policy' => '{"expiration":"1984-11-24T00:00:00Z","conditions":[{"bucket":"foo"},{"success_action_stat'
                    . 'us":"201"},["starts-with","$key","foo\\/bar\\/"],["starts-with","$Content-Type","text\\/"]]}'
            ],
            // Expected Results
            [
                'attributes' => [
                    'action' => 'https://foo.s3.amazonaws.com',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data'
                ],
                'inputs' => [
                    'AWSAccessKeyId' => 'AKIAXXXXXXXXXXXXXXX',
                    'key' => '${filename}',
                    'policy' => 'eyJleHBpcmF0aW9uIjoiMTk4NC0xMS0yNFQwMDowMDowMFoiLCJjb25kaXRpb25zIjpbeyJidWNrZXQiOiJmb'
                        . '28ifSx7InN1Y2Nlc3NfYWN0aW9uX3N0YXR1cyI6IjIwMSJ9LFsic3RhcnRzLXdpdGgiLCIka2V5IiwiZm9vXC9iYXJc'
                        . 'LyJdLFsic3RhcnRzLXdpdGgiLCIkQ29udGVudC1UeXBlIiwidGV4dFwvIl1dfQ==',
                    'signature' => 'h92mKuUkaKTNmJMqnHDZ51+2+GY='
                ],
                'policy' => '{"expiration":"1984-11-24T00:00:00Z","conditions":[{"bucket":"foo"},{"success_action_stat'
                    . 'us":"201"},["starts-with","$key","foo\\/bar\\/"],["starts-with","$Content-Type","text\\/"]]}'
            ]
        ];

        return $cases;
    }

    /**
     * @dataProvider getDataForPostObjectTest
     */
    public function testGetPostObjectData(array $options, array $expected)
    {
        $postObject = new PostObject($this->client, 'foo', $options);
        $postObject->prepareData();
        $this->assertEquals(
            $expected['attributes'],
            $postObject->getFormAttributes()
        );
        $this->assertEquals($expected['inputs'], $postObject->getFormInputs());
        $this->assertEquals($expected['policy'], $postObject->getJsonPolicy());
    }

    public function testClientAndBucketGetters()
    {
        $postObject = new PostObject($this->client, 'foo');
        $this->assertSame($this->client, $postObject->getClient());
        $this->assertSame('foo', $postObject->getBucket());
    }

    public function testCanHandleDomainsWithDots()
    {
        $postObject = new PostObject($this->client, 'foo.bar');
        $postObject->prepareData();
        $formAttrs = $postObject->getFormAttributes();
        $this->assertEquals(
            'https://s3.amazonaws.com/foo.bar',
            $formAttrs['action']
        );
    }
}
