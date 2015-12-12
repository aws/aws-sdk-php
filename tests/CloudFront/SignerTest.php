<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\Policy;
use Aws\CloudFront\Signer;

class SignerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Signer */
    private $instance;

    public function setUp()
    {
        foreach (['CF_PRIVATE_KEY', 'CF_KEY_PAIR_ID'] as $k) {
            if (!isset($_SERVER[$k]) || $_SERVER[$k] == 'change_me') {
                $this->markTestSkipped('$_SERVER[\'' . $k . '\'] not set in '
                    . 'phpunit.xml');
            }
        }

        $this->instance = new Signer(
            $_SERVER['CF_KEY_PAIR_ID'],
            $_SERVER['CF_PRIVATE_KEY']
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PK file not found
     */
    public function testEnsuresPkFileExists()
    {
        $s = new Signer('a', 'b');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Either a policy or a resource and an expiration time must be provided.
     */
    public function testEnsuresExpiresIsSetWhenUsingCannedPolicy()
    {
        $s = new Signer('a', $_SERVER['CF_PRIVATE_KEY']);
        $s->getSignature('http://foo/bar');
    }

    public function testReturnsSignatureAndKeyPairId()
    {
        $signature = $this->instance->getSignature('test.mp4', time() + 1000);

        $this->assertArrayHasKey('Signature', $signature);
        $this->assertArrayHasKey('Key-Pair-Id', $signature);
    }

    public function testReturnsExpiresForCannedPolicies()
    {
        $signature = $this->instance->getSignature('test.mp4', time() + 1000);

        $this->assertArrayHasKey('Expires', $signature);
    }

    public function testReturnsPolicyForCustomPolicies()
    {
        $customPolicy = new Policy('test.mp4', time() + 1000, time() + 100);
        $signature = $this->instance
            ->getSignature(null, null, (string) $customPolicy);

        $this->assertArrayHasKey('Policy', $signature);
    }

    public function testSignatureContainsNoForbiddenCharacters()
    {
        $signature = $this->instance->getSignature('test.mp4', time() + 1000);

        $this->assertSame(0, preg_match('/[\+\=\/]/', $signature['Signature']));
    }

    public function testPolicyContainsNoForbiddenCharacters()
    {
        $customPolicy = new Policy('test.mp4', time() + 1000, time() + 100);
        $signature = $this->instance
            ->getSignature(null, null, (string) $customPolicy);

        $this->assertSame(0, preg_match('/[\+\=\/]/', $signature['Policy']));
    }
}
