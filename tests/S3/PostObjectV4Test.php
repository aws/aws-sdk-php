<?php
namespace Aws\Test\S3;

use Aws\Credentials\Credentials;
use Aws\S3\PostObjectV4;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;

require_once __DIR__ . '/sig_hack.php';

/**
 * @covers Aws\S3\PostObject
 */
class PostObjectV4Test extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    protected $client;

    public function setUp()
    {
        $this->client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'AKIAIOSFODNN7EXAMPLE',
                'secret' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
            ],
        ]);
    }
    /**
     * Executes the SigV4 POST example from the S3 documentation.
     *
     * @link http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-post-example.html
     */
    public function testSignsPostPolicy()
    {
        $_SERVER['aws_time'] = '2015-12-29T12:00:00.000Z';
        $ldt = '20151229T000000Z';
        $sdt = substr($ldt, 0, 8);

        $scope = "$sdt/{$this->client->getRegion()}/s3/aws4_request";
        $credentials = "{$this->client->getCredentials()->wait()->getAccessKeyId()}/$scope";

        $options = [
            ["bucket" => 'sigv4examplebucket'],
            ["starts-with", '$key', "user/user1/"],
            ["acl" => "public-read"],
            ["success_action_redirect" =>
                "http://sigv4examplebucket.s3.amazonaws.com/successful_upload.html"],
            ["starts-with", '$Content-Type', "image/"],
            ["x-amz-meta-uuid" => "14365123651274"],
            ["x-amz-server-side-encryption" => "AES256"],
            ["starts-with", '$x-amz-meta-tag', ""],
            ["x-amz-credential" => $credentials],
            ["x-amz-algorithm" => "AWS4-HMAC-SHA256"],
            ["x-amz-date" => $ldt],
        ];
        $p = new PostObjectV4($this->client,'sigv4examplebucket', $options, '2015-12-30T12:00:00.000Z');
        $a = $p->getFormInputs();

        $jsonPolicy = [
            "expiration" => "2015-12-30T12:00:00.000Z",
            "conditions" => [
                ["bucket" => "sigv4examplebucket"],
                ["starts-with", '$key', "user/user1/"],
                ["acl" => "public-read"],
                ["success_action_redirect" =>
                    "http://sigv4examplebucket.s3.amazonaws.com/successful_upload.html"],
                ["starts-with", '$Content-Type', "image/"],
                ["x-amz-meta-uuid" => "14365123651274"],
                ["x-amz-server-side-encryption" => "AES256"],
                ["starts-with", '$x-amz-meta-tag', ""],
                ["x-amz-credential" =>
                    "AKIAIOSFODNN7EXAMPLE/20151229/us-east-1/s3/aws4_request"],
                ["x-amz-algorithm" => "AWS4-HMAC-SHA256"],
                ["x-amz-date" => "20151229T000000Z" ],
            ],
        ];
        $this->assertEquals(
            $jsonPolicy,
            json_decode($p->getJsonPolicy(), true)
        );

        $policy = 'eyJleHBpcmF0aW9uIjoiMjAxNS0xMi0zMFQxMjowMDowMC4wMD'
        . 'BaIiwiY29uZGl0aW9ucyI6W3siYnVja2V0Ijoic2lndjRleGFtcGxlYnVja'
        . '2V0In0sWyJzdGFydHMtd2l0aCIsIiRrZXkiLCJ1c2VyXC91c2VyMVwvIl0s'
        . 'eyJhY2wiOiJwdWJsaWMtcmVhZCJ9LHsic3VjY2Vzc19hY3Rpb25fcmVkaXJ'
        . 'lY3QiOiJodHRwOlwvXC9zaWd2NGV4YW1wbGVidWNrZXQuczMuYW1hem9uYX'
        . 'dzLmNvbVwvc3VjY2Vzc2Z1bF91cGxvYWQuaHRtbCJ9LFsic3RhcnRzLXdpd'
        . 'GgiLCIkQ29udGVudC1UeXBlIiwiaW1hZ2VcLyJdLHsieC1hbXotbWV0YS11'
        . 'dWlkIjoiMTQzNjUxMjM2NTEyNzQifSx7IngtYW16LXNlcnZlci1zaWRlLWV'
        . 'uY3J5cHRpb24iOiJBRVMyNTYifSxbInN0YXJ0cy13aXRoIiwiJHgtYW16LW'
        . '1ldGEtdGFnIiwiIl0seyJ4LWFtei1jcmVkZW50aWFsIjoiQUtJQUlPU0ZPR'
        . 'E5ON0VYQU1QTEVcLzIwMTUxMjI5XC91cy1lYXN0LTFcL3MzXC9hd3M0X3Jl'
        . 'cXVlc3QifSx7IngtYW16LWFsZ29yaXRobSI6IkFXUzQtSE1BQy1TSEEyNTY'
        . 'ifSx7IngtYW16LWRhdGUiOiIyMDE1MTIyOVQwMDAwMDBaIn1dfQ==';
        $this->assertSame($policy, $a['Policy']);

        $this->assertEquals(
            '53253b3afa1817f5229bd370b09d17eb29784657fbd2e39a5322c912b5049862',
            $a['X-Amz-Signature']
        );
    }

    public function testClientAndBucketGetters()
    {
        $postObject = new PostObjectV4($this->client, 'foo', []);
        $this->assertSame($this->client, $postObject->getClient());
        $this->assertSame('foo', $postObject->getBucket());
        $postObject->setFormInput('a', 'b');
        $this->assertEquals('b', $postObject->getFormInputs()['a']);
        $postObject->setFormAttribute('c', 'd');
        $this->assertEquals('d', $postObject->getFormAttributes()['c']);
    }

    public function testCanHandleDomainsWithDots()
    {
        $postObject = new PostObjectV4($this->client, 'foo.bar', []);
        $formAttrs = $postObject->getFormAttributes();
        $this->assertEquals(
            'https://s3.amazonaws.com/foo.bar',
            $formAttrs['action']
        );
    }
}
