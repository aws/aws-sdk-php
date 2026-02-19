<?php
namespace Aws\Test\Signature;

use Aws\Signature\DpopSignature;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Request;

/**
 * @covers Aws\Signature\DpopSignature
 */
class DpopSignatureTest extends TestCase
{
    private function getValidEcKey(): \OpenSSLAsymmetricKey
    {
        $pem = "-----BEGIN EC PRIVATE KEY-----\n" .
            "MHcCAQEEID9l+ckeHBxlF47cg0h5qJnAErPvCm1brUY8i7b6qSJToAoGCCqGSM49\n" .
            "AwEHoUQDQgAETcWLAT2yUAT3s0ePMBGu+gcmdDvepL86SZDBSmtFCuDxRpXxt5C4\n" .
            "rGaUy8ujiVIkEvm6a1x/U1As+fGq4eqtVw==\n" .
            "-----END EC PRIVATE KEY-----";
        
        $key = openssl_pkey_get_private($pem);
        if (!$key) {
            throw new \RuntimeException('Failed to load EC key');
        }
        return $key;
    }

    public function testConstructorThrowsForInvalidService(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "The 'invalidservice' service does not support DPop signatures"
        );
        
        new DpopSignature('invalidservice');
    }

    public function testConstructorSucceedsForSigninService(): void
    {
        $dpop = new DpopSignature('signin');
        $this->assertInstanceOf(DpopSignature::class, $dpop);
    }

    public function testSignRequestAddsDpopHeader(): void
    {
        $dpop = new DpopSignature('signin');
        $key = $this->getValidEcKey();
        
        $request = new Request('POST', 'https://example.com/api');
        $signedRequest = $dpop->signRequest($request, $key);
        
        $this->assertTrue($signedRequest->hasHeader('DPop'));
        $dpopHeader = $signedRequest->getHeader('DPop')[0];
        $this->assertNotEmpty($dpopHeader);
        
        // Verify JWT structure (3 parts separated by dots)
        $parts = explode('.', $dpopHeader);
        $this->assertCount(3, $parts);
    }

    public function testDpopJwtHeaderStructure(): void
    {
        $dpop = new DpopSignature('signin');
        $key = $this->getValidEcKey();
        
        $request = new Request('POST', 'https://example.com/api');
        $signedRequest = $dpop->signRequest($request, $key);
        
        $dpopHeader = $signedRequest->getHeader('DPop')[0];
        $parts = explode('.', $dpopHeader);
        
        // Decode header
        $header = json_decode(
            base64_decode(strtr($parts[0], '-_', '+/')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        
        $this->assertEquals('dpop+jwt', $header['typ']);
        $this->assertEquals('ES256', $header['alg']);
        $this->assertArrayHasKey('jwk', $header);
        $this->assertEquals('EC', $header['jwk']['kty']);
        $this->assertEquals('P-256', $header['jwk']['crv']);
        $this->assertArrayHasKey('x', $header['jwk']);
        $this->assertArrayHasKey('y', $header['jwk']);
    }

    public function testDpopJwtPayloadStructure(): void
    {
        $dpop = new DpopSignature('signin');
        $key = $this->getValidEcKey();
        
        $uri = 'https://example.com/api/endpoint';
        $request = new Request('POST', $uri);
        $signedRequest = $dpop->signRequest($request, $key);
        
        $dpopHeader = $signedRequest->getHeader('DPop')[0];
        $parts = explode('.', $dpopHeader);
        
        // Decode payload
        $payload = json_decode(
            base64_decode(strtr($parts[1], '-_', '+/')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        
        $this->assertArrayHasKey('jti', $payload);
        $this->assertEquals('POST', $payload['htm']);
        $this->assertEquals($uri, $payload['htu']);
        $this->assertArrayHasKey('iat', $payload);
        
        // Verify jti is a valid UUID v4
        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $payload['jti']
        );
        
        // Verify iat is recent (within last minute)
        $this->assertGreaterThan(time() - 60, $payload['iat']);
        $this->assertLessThanOrEqual(time(), $payload['iat']);
    }

    public function testDerToRawConvertsValidSignature(): void
    {
        $dpop = new DpopSignature('signin');
        $key = $this->getValidEcKey();
        
        // Generate a real signature to test derToRaw
        $message = 'test message';
        $signature = '';
        openssl_sign($message, $signature, $key, OPENSSL_ALGO_SHA256);
        
        // Use reflection to access private method
        $reflection = new \ReflectionClass($dpop);
        $method = $reflection->getMethod('derToRaw');
        
        $raw = $method->invoke($dpop, $signature);
        
        // Raw signature for ES256 should be exactly 64 bytes
        $this->assertEquals(64, strlen($raw));
    }

    /**
     * Test that derToRaw properly handles DER signatures with various R and S lengths
     */
    public function testDerToRawHandlesVariableLengthComponents(): void
    {
        $dpop = new DpopSignature('signin');
        
        // Use reflection to access private method
        $reflection = new \ReflectionClass($dpop);
        $method = $reflection->getMethod('derToRaw');
        
        // Test case 1: R and S both 32 bytes (no leading zeros)
        $der1 = hex2bin(
            '3044' . '0220'
            . str_repeat('ab', 32) . '0220'
            . str_repeat('cd', 32)
        );
        $raw1 = $method->invoke($dpop, $der1);
        $this->assertEquals(64, strlen($raw1));
        
        // Test case 2: R with leading zero (33 bytes in DER)
        $der2 = hex2bin(
            '3045' . '0221' . '00'
            . str_repeat('ff', 32) . '0220'
            . str_repeat('aa', 32)
        );
        $raw2 = $method->invoke($dpop, $der2);
        $this->assertEquals(64, strlen($raw2));
        
        // Test case 3: S with leading zero (33 bytes in DER)
        $der3 = hex2bin(
            '3045' . '0220' . str_repeat('bb', 32)
            . '0221' . '00'
            . str_repeat('ee', 32)
        );
        $raw3 = $method->invoke($dpop, $der3);
        $this->assertEquals(64, strlen($raw3));
        
        // Test case 4: Both with leading zeros (33 bytes each in DER)
        $der4 = hex2bin(
            '3046' . '0221' . '00'
            . str_repeat('dd', 32) . '0221'
            . '00' . str_repeat('cc', 32)
        );
        $raw4 = $method->invoke($dpop, $der4);
        $this->assertEquals(64, strlen($raw4));
    }

    /**
     * Test that derToRaw throws for invalid DER signatures
     */
    public function testDerToRawThrowsForInvalidSignatures(): void
    {
        $dpop = new DpopSignature('signin');
        
        // Use reflection to access private method
        $reflection = new \ReflectionClass($dpop);
        $method = $reflection->getMethod('derToRaw');
        
        // Test case 1: Missing SEQUENCE tag
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid DER signature format: missing SEQUENCE tag');
        $method->invoke(
            $dpop,
            hex2bin('31440220' . str_repeat('ab', 32) . '0220' . str_repeat('cd', 32))
        );
    }

    public function testDerToRawThrowsForMissingRIntegerTag(): void
    {
        $dpop = new DpopSignature('signin');
        
        // Use reflection to access private method
        $reflection = new \ReflectionClass($dpop);
        $method = $reflection->getMethod('derToRaw');
        
        // Missing R INTEGER tag
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid DER signature format: missing R INTEGER tag');
        $method->invoke(
            $dpop,
            hex2bin('30440320' . str_repeat('ab', 32) . '0220' . str_repeat('cd', 32))
        );
    }

    public function testDerToRawThrowsForMissingSIntegerTag(): void
    {
        $dpop = new DpopSignature('signin');
        
        // Use reflection to access private method
        $reflection = new \ReflectionClass($dpop);
        $method = $reflection->getMethod('derToRaw');
        
        // Missing S INTEGER tag
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid DER signature format: missing S INTEGER tag');
        $method->invoke(
            $dpop,
            hex2bin('30440220' . str_repeat('ab', 32) . '0320' . str_repeat('cd', 32))
        );
    }

    public function testDerToRawThrowsForLengthMismatch(): void
    {
        $dpop = new DpopSignature('signin');
        
        // Use reflection to access private method
        $reflection = new \ReflectionClass($dpop);
        $method = $reflection->getMethod('derToRaw');
        
        // R length says 32 bytes but only provide 31 (the rest is cut off so no S INTEGER tag found)
        $this->expectException(\Exception::class);
        // The parser will find the mismatch when it tries to extract R value
        $this->expectExceptionMessage('Invalid DER signature');
        $method->invoke(
            $dpop,
            hex2bin('30430220' . str_repeat('ab', 31) . '0220' . str_repeat('cd', 32))
        );
    }

    /**
     * Test that the signature can be verified with openssl
     */
    public function testSignatureCanBeVerified(): void
    {
        $dpop = new DpopSignature('signin');
        $key = $this->getValidEcKey();
        
        $request = new Request('POST', 'https://example.com/api');
        $signedRequest = $dpop->signRequest($request, $key);
        
        $dpopHeader = $signedRequest->getHeader('DPop')[0];
        $parts = explode('.', $dpopHeader);
        
        // Recreate the message
        $message = $parts[0] . '.' . $parts[1];
        
        // Decode the signature
        $signature = base64_decode(strtr($parts[2], '-_', '+/'));
        
        // Convert raw signature back to DER for verification
        $r = substr($signature, 0, 32);
        $s = substr($signature, 32, 32);
        
        // Remove leading zeros from r and s for DER
        $r = ltrim($r, "\x00");
        $s = ltrim($s, "\x00");
        
        // Add leading zero if high bit is set (for DER encoding)
        if (ord($r[0]) & 0x80) {
            $r = "\x00" . $r;
        }
        if (ord($s[0]) & 0x80) {
            $s = "\x00" . $s;
        }
        
        // Build DER
        $rDer = "\x02" . chr(strlen($r)) . $r;
        $sDer = "\x02" . chr(strlen($s)) . $s;
        $der = "\x30" . chr(strlen($rDer . $sDer)) . $rDer . $sDer;
        
        // Get public key from private key
        $keyDetails = openssl_pkey_get_details($key);
        $publicKey = openssl_pkey_get_public($keyDetails['key']);
        
        // Verify signature
        $verified = openssl_verify(
            $message, $der, $publicKey, OPENSSL_ALGO_SHA256
        );
        $this->assertEquals(1, $verified);
    }

    /**
     * Test that multiple signatures from the same key produce different JWTs (due to jti)
     */
    public function testMultipleSignaturesProduceDifferentJwts(): void
    {
        $dpop = new DpopSignature('signin');
        $key = $this->getValidEcKey();
        
        $request = new Request('POST', 'https://example.com/api');
        
        $signedRequest1 = $dpop->signRequest($request, $key);
        $signedRequest2 = $dpop->signRequest($request, $key);
        
        $dpopHeader1 = $signedRequest1->getHeader('DPop')[0];
        $dpopHeader2 = $signedRequest2->getHeader('DPop')[0];
        
        // Headers should be different due to different jti values
        $this->assertNotEquals($dpopHeader1, $dpopHeader2);
        
        // But header portions (containing JWK) should be the same
        $parts1 = explode('.', $dpopHeader1);
        $parts2 = explode('.', $dpopHeader2);
        $this->assertEquals($parts1[0], $parts2[0]);
    }

    /**
     * Test that a key with specifiedCurve parameters works correctly
     */
    public function testSignRequestWithSpecifiedCurveKey(): void
    {
        $dpop = new DpopSignature('signin');
        
        // Key with specifiedCurve parameters
        $pem = "-----BEGIN EC PRIVATE KEY-----\n" .
            "MIIBUQIBAQQgW2JEXxOdj8dFip0hyS6SHr9dHciiZQyoTZoe6sox1KGggeMwgeAC\n" .
            "AQEwLAYHKoZIzj0BAQIhAP////8AAAABAAAAAAAAAAAAAAAA////////////////\n" .
            "MEQEIP////8AAAABAAAAAAAAAAAAAAAA///////////////8BCBaxjXYqjqT57Pr\n" .
            "vVV2mIa8ZR0GsMxTsPY7zjw+J9JgSwRBBGsX0fLhLEJH+Lzm5WOkQPJ3A32BLesz\n" .
            "oPShOUXYmMKWT+NC4v4af5uO5+tKfA+eFivOM1drMV7Oy7ZAaDe/UfUCIQD/////\n" .
            "AAAAAP//////////vOb6racXnoTzucrC/GMlUQIBAaFEA0IABFqlTnAPfLQfFrmn\n" .
            "uJFbpcMA89r5uhBzUe+KvRCCPpscjMats1NUCB64qslJ3QYEGuAx2BP2gOeQBUbl\n" .
            "rSdm4F4=\n" .
            "-----END EC PRIVATE KEY-----";
        
        $key = openssl_pkey_get_private($pem);
        $this->assertNotFalse($key, 'Failed to load EC key with specifiedCurve');
        
        $request = new Request('POST', 'https://example.com/api');
        $signedRequest = $dpop->signRequest($request, $key);
        
        $this->assertTrue($signedRequest->hasHeader('DPop'));
        $dpopHeader = $signedRequest->getHeader('DPop')[0];
        $this->assertNotEmpty($dpopHeader);
        
        // Verify JWT structure (3 parts separated by dots)
        $parts = explode('.', $dpopHeader);
        $this->assertCount(3, $parts);
        
        // Verify the header contains the JWK
        $header = json_decode(
            base64_decode(strtr($parts[0], '-_', '+/')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $this->assertEquals('dpop+jwt', $header['typ']);
        $this->assertEquals('ES256', $header['alg']);
        $this->assertArrayHasKey('jwk', $header);
        $this->assertEquals('EC', $header['jwk']['kty']);
        $this->assertEquals('P-256', $header['jwk']['crv']);
        $this->assertArrayHasKey('x', $header['jwk']);
        $this->assertArrayHasKey('y', $header['jwk']);
    }
}
