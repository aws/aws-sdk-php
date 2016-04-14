<?php
namespace Aws\Test\S3;

use Aws\Credentials\Credentials;
use Aws\S3\PostObject;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;

require_once __DIR__ . '/sig_hack.php';

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
     * Executes the SigV4 POST example from the S3 documentation. All values
     * are taken from the link below.
     *
     * @link http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-post-example.html
     */
    public function testSignsPostPolicy()
    {
        $policy = 'eyAiZXhwaXJhdGlvbiI6ICIyMDE1LTEyLTMwVDEyOjAwOjAwLjAwMFoiLA0'
        . 'KICAiY29uZGl0aW9ucyI6IFsNCiAgICB7ImJ1Y2tldCI6ICJzaWd2NGV4YW1wbGVi'
        . 'dWNrZXQifSwNCiAgICBbInN0YXJ0cy13aXRoIiwgIiRrZXkiLCAidXNlci91c2VyM'
        . 'S8iXSwNCiAgICB7ImFjbCI6ICJwdWJsaWMtcmVhZCJ9LA0KICAgIHsic3VjY2Vzc1'
        . '9hY3Rpb25fcmVkaXJlY3QiOiAiaHR0cDovL3NpZ3Y0ZXhhbXBsZWJ1Y2tldC5zMy5'
        . 'hbWF6b25hd3MuY29tL3N1Y2Nlc3NmdWxfdXBsb2FkLmh0bWwifSwNCiAgICBbInN0'
        . 'YXJ0cy13aXRoIiwgIiRDb250ZW50LVR5cGUiLCAiaW1hZ2UvIl0sDQogICAgeyJ4L'
        . 'WFtei1tZXRhLXV1aWQiOiAiMTQzNjUxMjM2NTEyNzQifSwNCiAgICB7IngtYW16LX'
        . 'NlcnZlci1zaWRlLWVuY3J5cHRpb24iOiAiQUVTMjU2In0sDQogICAgWyJzdGFydHM'
        . 'td2l0aCIsICIkeC1hbXotbWV0YS10YWciLCAiIl0sDQoNCiAgICB7IngtYW16LWNy'
        . 'ZWRlbnRpYWwiOiAiQUtJQUlPU0ZPRE5ON0VYQU1QTEUvMjAxNTEyMjkvdXMtZWFzd'
        . 'C0xL3MzL2F3czRfcmVxdWVzdCJ9LA0KICAgIHsieC1hbXotYWxnb3JpdGhtIjogIk'
        . 'FXUzQtSE1BQy1TSEEyNTYifSwNCiAgICB7IngtYW16LWRhdGUiOiAiMjAxNTEyMjl'
        . 'UMDAwMDAwWiIgfQ0KICBdDQp9';

        $_SERVER['aws_time'] = '20151229T223358Z';

        $p = new PostObject($this->client, 'foo', [], base64_decode($policy));
        $a = $p->getFormInputs();

        $this->assertSame($policy, $a['Policy']);

        $this->assertEquals(
            '8afdbf4008c03f22c2cd3cdb72e4afbb1f6a588f3255ac628749a66d7f09699e',
            $a['X-Amz-Signature']
        );

        $this->assertEquals(
            [
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
            ],
            json_decode($p->getJsonPolicy(), true)
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
