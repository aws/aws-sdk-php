<?php
namespace Aws\Test\Token;

use Aws\Token\Token;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Token\BearerTokenAuthorization
 */
class BearerTokenAuthorizationTest extends TestCase {

    public function bearerTestProvider() {
        return [
            "Minimal bearer auth case" =>
                [
                    "headers" => [],
                    "token" => "mF_9.B5f-4.1JqM",
                    "expectedHeaders" => ["Authorization" => "Bearer mF_9.B5f-4.1JqM",],
                ],
            "Longer token case" =>
                [
                    "headers" => [],
                    "token" => "eW91J3JlIG5vdCBzdXBwb3NlZCB0byBkZWNvZGUgdGhpcyE=",
                    "expectedHeaders" => ["Authorization" => "Bearer eW91J3JlIG5vdCBzdXBwb3NlZCB0byBkZWNvZGUgdGhpcyE=",],
                ],
            "Signer should override existing header" =>
                [
                    "headers" => ["Authorization" => "Bearer foo",],
                    "token" => "mF_9.B5f-4.1JqM",
                    "expectedHeaders" => ["Authorization" => "Bearer mF_9.B5f-4.1JqM",],
                ],
            ];
    }

    /**
     * @dataProvider bearerTestProvider
     */
    public function testBearerSuccessCases($headers, $tokenString, $expectedHeaders) {
        $authorizer = new \Aws\Token\BearerTokenAuthorization();
        $request = new Request('GET', 'http://foo.com');
        foreach ($headers as $header => $value) {
            $request = $request->withHeader($header, $value);
        }
        $token = new Token($tokenString);
        $request = $authorizer->authorizeRequest($request, $token);
        foreach ($expectedHeaders as $expectedHeader => $expectedValue) {
            $this->assertSame($expectedValue, $request->getHeaderLine($expectedHeader));
        }
    }

    public function testBearerNullToken() {
        $authorizer = new \Aws\Token\BearerTokenAuthorization();
        $request = new Request('GET', 'http://foo.com');
        $token = new Token(null);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Cannot authorize a request with an empty token");
        $authorizer->authorizeRequest($request, $token);
    }
}