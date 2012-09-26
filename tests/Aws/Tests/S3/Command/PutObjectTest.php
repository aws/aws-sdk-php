<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\Model\AclBuilder;
use Aws\S3\Enum\Permission;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\Command\PutObject
 * @covers Aws\S3\Command\DefaultTransferObject
 * @covers Aws\S3\Command\DefaultUploadObject
 */
class PutObjectTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutObject')
            ->set('bucket', 'foo')
            ->set('key', 'bar');
    }

    public function testSendsSimpleRequest()
    {
        $request = $this->getCommand()->set('body', 'test')->prepare();
        $this->assertEquals('test', (string) $request->getBody());
        $this->assertEquals('foo.s3.amazonaws.com', $request->getHost());
        $this->assertEquals('/bar', $request->getResource());
    }

    public function testAddsContentEncodingIfSet()
    {
        $body = EntityBody::factory('hello');
        $body->compress();
        $request = $this->getCommand()->set('body', $body)->prepare();
        $this->assertEquals('gzip', (string) $request->getHeader('Content-Encoding'));
    }

    public function testAddsContentMd5()
    {
        $request = $this->getCommand()->set('body', 'hello')->set('use_md5', true)->prepare();
        $this->assertEquals('XUFAKrxLKna5cZ2REBfFkg==', (string) $request->getHeader('Content-MD5'));
    }

    public function testAddsExpectHeader() {
        $request = $this->getCommand()->set('body', 'hello')->set('use_expect', true)->prepare();
        $this->assertEquals('100-Continue', (string) $request->getHeader('Expect'));
    }

    public function testRemovesExpectHeader()
    {
        $request = $this->getCommand()->set('body', 'hello')->set('use_expect', false)->prepare();
        $this->assertNull($request->getHeader('Expect'));
    }

    public function testAddsMetadata()
    {
        $command = $this->getCommand()
            ->addMetadata('foo', 'baz')
            ->addMetadata('bar', 'bam');
        $request = $command->prepare();
        $this->assertEquals('baz', (string) $request->getHeader('x-amz-meta-foo'));
        $this->assertEquals('bam', (string) $request->getHeader('x-amz-meta-bar'));
    }

    public function testAddsAclIfSet()
    {
        $acl = AclBuilder::newInstance()
            ->setOwner('1234567890')
            ->addGrantForEmail(Permission::READ, 'foo@example.com')
            ->build();

        $command = $this->getCommand();
        $command->set('acl', $acl);
        $request = $command->prepare();
        $this->assertEquals('emailAddress="foo@example.com"', (string) $request->getHeader('x-amz-grant-read'));
    }
}
