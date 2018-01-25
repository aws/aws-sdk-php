<?php
namespace Aws\Test\S3;

use Aws\Credentials\Credentials;
use Aws\S3\PostObjectV4;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;

require_once __DIR__ . '/sig_hack.php';
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\PostObjectV4
 */
class PostObjectV4Test extends TestCase
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
        $_SERVER['aws_time'] = '20151229T0000Z';
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
        ];
        $inputs = [
            "bucket" => 'sigv4examplebucket',
            "key" => "user/user1/",
            "acl" => "public-read",
            "success_action_redirect" =>
                "http://sigv4examplebucket.s3.amazonaws.com/successful_upload.html",
            "Content-Type" => "image/",
            "x-amz-meta-uuid" => "14365123651274",
            "x-amz-server-side-encryption" => "AES256",
            "x-amz-meta-tag" => "",
        ];

        $p = new PostObjectV4(
            $this->client,
            'sigv4examplebucket',
            $inputs,
            $options,
            "2015-12-29T01:00:00Z"
        );
        $a = $p->getFormInputs();

        $policy = 'eyJleHBpcmF0aW9uIjoiMjAxNS0xMi0yOVQwMTowMDowMFoiLCJ'
        . 'jb25kaXRpb25zIjpbeyJidWNrZXQiOiJzaWd2NGV4YW1wbGVidWNrZXQifS'
        . 'xbInN0YXJ0cy13aXRoIiwiJGtleSIsInVzZXJcL3VzZXIxXC8iXSx7ImFjb'
        . 'CI6InB1YmxpYy1yZWFkIn0seyJzdWNjZXNzX2FjdGlvbl9yZWRpcmVjdCI6'
        . 'Imh0dHA6XC9cL3NpZ3Y0ZXhhbXBsZWJ1Y2tldC5zMy5hbWF6b25hd3MuY29'
        . 'tXC9zdWNjZXNzZnVsX3VwbG9hZC5odG1sIn0sWyJzdGFydHMtd2l0aCIsIi'
        . 'RDb250ZW50LVR5cGUiLCJpbWFnZVwvIl0seyJ4LWFtei1tZXRhLXV1aWQiO'
        . 'iIxNDM2NTEyMzY1MTI3NCJ9LHsieC1hbXotc2VydmVyLXNpZGUtZW5jcnlw'
        . 'dGlvbiI6IkFFUzI1NiJ9LFsic3RhcnRzLXdpdGgiLCIkeC1hbXotbWV0YS1'
        . '0YWciLCIiXSx7IlgtQW16LURhdGUiOiIyMDE1MTIyOVQwMDAwWiJ9LHsiWC'
        . '1BbXotQ3JlZGVudGlhbCI6IkFLSUFJT1NGT0ROTjdFWEFNUExFXC8yMDE1M'
        . 'TIyOVwvdXMtZWFzdC0xXC9zM1wvYXdzNF9yZXF1ZXN0In0seyJYLUFtei1B'
        . 'bGdvcml0aG0iOiJBV1M0LUhNQUMtU0hBMjU2In1dfQ==';
        $this->assertSame($policy, $a['Policy']);

        $this->assertEquals(
            '683963a1575bb197c642490ac60f3f08cda08233cd3a163ad31b554e9327a3ff',
            $a['X-Amz-Signature']
        );

        $this->assertArrayNotHasKey('X-Amz-Signature-Token', $a);
    }

    public function testSignsPostPolicyWithFalseSecurityToken()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'AKIAIOSFODNN7EXAMPLE',
                'secret' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
                'token' => false
            ],
        ]);
        $p = new PostObjectV4(
            $client,
            'sigv4examplebucket',
            [],
            [],
            "2015-12-29T01:00:00Z"
        );
        $a = $p->getFormInputs();
        $this->assertArrayNotHasKey('X-Amz-Security-Token', $a);
    }

    public function testSignsPostPolicyWithNullSecurityToken()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'AKIAIOSFODNN7EXAMPLE',
                'secret' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
                'token' => NULL
            ],
        ]);
        $p = new PostObjectV4(
            $client,
            'sigv4examplebucket',
            [],
            [],
            "2015-12-29T01:00:00Z"
        );
        $a = $p->getFormInputs();
        $this->assertArrayNotHasKey('X-Amz-Security-Token', $a);
    }

    /**
     * Executes the SigV4 POST example from the S3 documentation.
     *
     * @link http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-post-example.html
     */
    public function testSignsPostPolicyWithSecurityToken()
    {
        $_SERVER['aws_time'] = '20151229T0000Z';
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
        ];
        $inputs = [
            "bucket" => 'sigv4examplebucket',
            "key" => "user/user1/",
            "acl" => "public-read",
            "success_action_redirect" =>
                "http://sigv4examplebucket.s3.amazonaws.com/successful_upload.html",
            "Content-Type" => "image/",
            "x-amz-meta-uuid" => "14365123651274",
            "x-amz-server-side-encryption" => "AES256",
            "x-amz-meta-tag" => "",
        ];

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key'    => 'AKIAIOSFODNN7EXAMPLE',
                'secret' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
                'token'  => 'abJe44dFgDEXAMPLE'
            ],
        ]);

        $p = new PostObjectV4(
            $client,
            'sigv4examplebucket',
            $inputs,
            $options,
            "2015-12-29T01:00:00Z"
        );
        $a = $p->getFormInputs();

        $policy = 'eyJleHBpcmF0aW9uIjoiMjAxNS0xMi0yOVQwMTowMDowMFoiLCJ'
            . 'jb25kaXRpb25zIjpbeyJidWNrZXQiOiJzaWd2NGV4YW1wbGVidWNrZXQifSx'
            . 'bInN0YXJ0cy13aXRoIiwiJGtleSIsInVzZXJcL3VzZXIxXC8iXSx7ImFjbCI6'
            . 'InB1YmxpYy1yZWFkIn0seyJzdWNjZXNzX2FjdGlvbl9yZWRpcmVjdCI6Imh0d'
            . 'HA6XC9cL3NpZ3Y0ZXhhbXBsZWJ1Y2tldC5zMy5hbWF6b25hd3MuY29tXC9zdW'
            . 'NjZXNzZnVsX3VwbG9hZC5odG1sIn0sWyJzdGFydHMtd2l0aCIsIiRDb250ZW5'
            . '0LVR5cGUiLCJpbWFnZVwvIl0seyJ4LWFtei1tZXRhLXV1aWQiOiIxNDM2NTEy'
            . 'MzY1MTI3NCJ9LHsieC1hbXotc2VydmVyLXNpZGUtZW5jcnlwdGlvbiI6IkFFU'
            . 'zI1NiJ9LFsic3RhcnRzLXdpdGgiLCIkeC1hbXotbWV0YS10YWciLCIiXSx7In'
            . 'gtYW16LXNlY3VyaXR5LXRva2VuIjoiYWJKZTQ0ZEZnREVYQU1QTEUifSx7Ilg'
            . 'tQW16LURhdGUiOiIyMDE1MTIyOVQwMDAwWiJ9LHsiWC1BbXotQ3JlZGVudGlh'
            . 'bCI6IkFLSUFJT1NGT0ROTjdFWEFNUExFXC8yMDE1MTIyOVwvdXMtZWFzdC0xX'
            . 'C9zM1wvYXdzNF9yZXF1ZXN0In0seyJYLUFtei1BbGdvcml0aG0iOiJBV1M0LU'
            . 'hNQUMtU0hBMjU2In1dfQ==';

        $this->assertSame($policy, $a['Policy']);

        $this->assertEquals(
            'ca86530c5c799e8fd3bf2013aaccc581bc34646d676c4b195d996b6723e2bb91',
            $a['X-Amz-Signature']
        );

        $this->assertEquals(
            'abJe44dFgDEXAMPLE',
            $a['X-Amz-Security-Token']
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

    /**
     * @dataProvider virtualStyleProvider
     *
     * @param string $endpoint
     * @param string $bucket
     * @param string $expected
     */
    public function testCanHandleVirtualStyleEndpoint($endpoint, $bucket, $expected)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'akid',
                'secret' => 'secret',
            ],
            'endpoint' => $endpoint,
            'bucket_endpoint' => true,
        ]);
        $postObject = new PostObjectV4($s3, $bucket, []);
        $formAttrs = $postObject->getFormAttributes();
        $this->assertEquals($expected, $formAttrs['action']);
    }

    public function virtualStyleProvider()
    {
        return [
            ['http://foo.s3.amazonaws.com', 'foo', 'http://foo.s3.amazonaws.com'],
            ['http://foo.s3.amazonaws.com', 'bar', 'http://bar.foo.s3.amazonaws.com'],
            ['http://s3.amazonaws.com', 'amazonaws', 'http://amazonaws.s3.amazonaws.com'],
            ['http://foo.bar.s3.amazonaws.com', 'foo.bar', 'http://foo.bar.s3.amazonaws.com'],
            ['http://foo.com', 'foo.com', 'http://foo.com.foo.com'],
        ];
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
        $postObject = new PostObjectV4($s3, $bucket, []);
        $formAttrs = $postObject->getFormAttributes();
        $this->assertEquals($expected, $formAttrs['action']);
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
