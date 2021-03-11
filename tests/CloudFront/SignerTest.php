<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\Policy;
use Aws\CloudFront\Signer;
use PHPUnit\Framework\TestCase;

class SignerTest extends TestCase
{
    /** @var Signer */
    private $instance;
    private $testKeyFile;

    const PASSPHRASE = "1234";

    public function setUp()
    {
        $this->testKeyFile =__DIR__ . '/fixtures/test.pem';
        $this->instance = new Signer(
            "test",
            $this->testKeyFile,
            self::PASSPHRASE
        );
    }

    /**
     * Assert that the key variable contents are parsed during construction
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /PK .*Not a real private key/
     */
    public function testBadPrivateKeyContents() {
        $privateKey = "Not a real private key";
        $s = new Signer(
            "not a real keypair id",
            $privateKey
        );
    }

    /**
     * Assert that the key file is parsed during construction
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /PEM .*no start line/
     */
    public function testBadPrivateKeyPath() {
        $filename = tempnam(sys_get_temp_dir(), 'cloudfront-fake-key');
        file_put_contents($filename, "Not a real private key");
        try {
            $s = new Signer(
                "not a real keypair id",
                $filename
            );
        } finally {
            unlink($filename);
        }
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
        $s = new Signer('a', $this->testKeyFile, self::PASSPHRASE);
        $s->getSignature('http://foo/bar');
    }

    public function testReturnsSignatureAndKeyPairId()
    {
        $signature = $this->instance->getSignature('test.mp4', time() + 1000);

        $this->assertArrayHasKey('Signature', $signature);
        $this->assertArrayHasKey('Key-Pair-Id', $signature);
    }

    public function getExpiresCases()
    {
        return [
            [
                time() + 1000
            ],
            [
                (string) (time() + 1000)
            ]
        ];
    }

    /**
     * @dataProvider getExpiresCases
     */
    public function testReturnsExpiresForCannedPolicies($expires)
    {
        $signature = $this->instance->getSignature('test.mp4', $expires);

        $this->assertArrayHasKey('Expires', $signature);
        $this->assertInternalType('int', $signature['Expires']);
    }

    public function testReturnsPolicyForCustomPolicies()
    {
        $signature = $this->instance
            ->getSignature(null, null, $this->getCustomPolicy());

        $this->assertArrayHasKey('Policy', $signature);
    }

    public function testNormalizesCustomPolicies()
    {
        $normalizedPolicy = $this->getCustomPolicy();
        $policy = json_encode(json_decode($normalizedPolicy), JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        $signature = $this->instance->getSignature(null, null, $policy);

        $policyAsSigned = base64_decode(strtr($signature['Policy'], [
            '-' => '+',
            '_' => '=',
            '~' => '/',
        ]));

        $this->assertNotSame($policy, $policyAsSigned);
        $this->assertSame($normalizedPolicy, $policyAsSigned);
    }

    public function testSignatureContainsNoForbiddenCharacters()
    {
        $signature = $this->instance->getSignature('test.mp4', time() + 1000);

        $this->assertNotRegExp('/[\+\=\/]/', $signature['Signature']);
    }

    public function testPolicyContainsNoForbiddenCharacters()
    {
        $signature = $this->instance
            ->getSignature(null, null, $this->getCustomPolicy());

        $this->assertNotRegExp('/[\+\=\/]/', $signature['Policy']);
    }

    /**
     * @dataProvider cannedPolicyParameterProvider
     *
     * @param string $resource
     * @param int $ts
     */
    public function testCreatesCannedPolicies($resource, $ts)
    {
        $m = new \ReflectionMethod(Signer::class, 'createCannedPolicy');
        $m->setAccessible(true);
        $result = $m->invoke($this->instance, $resource, $ts);
        $this->assertSame(
            '{"Statement":[{"Resource":"' . $resource
            . '","Condition":{"DateLessThan":{"AWS:EpochTime":'
            . $ts . '}}}]}',
            $result
        );
    }

    public function cannedPolicyParameterProvider()
    {
        return [
            [
                'test.mp4',
                time() + 1000,
            ],
            [
                'videos/test.mp4',
                time() + 1000,
            ],
            [
                'https://aws.amazon.com/foo.bar?baz=quux',
                time() + 1000,
            ]
        ];
    }

    private function getCustomPolicy()
    {
        return json_encode([
            'Statement' => [
                [
                    'Resource' => 'videos/protected.mp4',
                    'Condition' => [
                        ['DateLessThan' => ['AWS:EpochTime' => time() + 1800]],
                        ['DateGreaterThan' => ['AWS:EpochTime' => time()]],
                        ['IpAddress' => ['AWS:SourceIp' => '127.0.0.1/32']],
                    ]
                ],
            ],
        ], JSON_UNESCAPED_SLASHES);
    }
}
