<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\Signer;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class SignerTest extends TestCase
{
    /** @var Signer */
    private $instance;
    private $testKeyFile;

    const PASSPHRASE = "1234";

    public function set_up()
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
     */
    public function testBadPrivateKeyContents() {
        $this->expectExceptionMessageMatches("/PK .*Not a real private key/");
        $this->expectException(\InvalidArgumentException::class);
        $privateKey = "Not a real private key";
        $s = new Signer(
            "not a real keypair id",
            $privateKey
        );
    }

    /**
     * Assert that the key file is parsed during construction
     */
    public function testBadPrivateKeyPath() {
        $this->expectExceptionMessageMatches("/PEM .*no start line/");
        $this->expectException(\InvalidArgumentException::class);
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

    public function testEnsuresPkFileExists()
    {
        $this->expectExceptionMessage("PK file not found");
        $this->expectException(\InvalidArgumentException::class);
        $s = new Signer('a', 'b');
    }

    public function testEnsuresExpiresIsSetWhenUsingCannedPolicy()
    {
        $this->expectExceptionMessage("Either a policy or a resource and an expiration time must be provided.");
        $this->expectException(\InvalidArgumentException::class);
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
        $this->assertIsInt($signature['Expires']);
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

        $this->assertDoesNotMatchRegularExpression('/[\+\=\/]/', $signature['Signature']);
    }

    public function testPolicyContainsNoForbiddenCharacters()
    {
        $signature = $this->instance
            ->getSignature(null, null, $this->getCustomPolicy());

        $this->assertDoesNotMatchRegularExpression('/[\+\=\/]/', $signature['Policy']);
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
