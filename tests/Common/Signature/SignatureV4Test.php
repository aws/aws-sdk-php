<?php
namespace Aws\Test\Common\Signature;

require_once __DIR__ . '/sig_hack.php';

use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureV4;
use GuzzleHttp\Message\MessageFactory;
use GuzzleHttp\Message\Request;

// Super hacky stuff to get the date right for real request vs the test-suite.
class HackRequest extends Request
{
    public function setHeader($header, $value)
    {
        parent::setHeader(
            $header,
            $header == 'Date' ? SignatureV4Test::DEFAULT_DATETIME : $value
        );
    }
}

/**
 * @covers Aws\Common\Signature\SignatureV4
 */
class SignatureV4Test extends \PHPUnit_Framework_TestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Mon, 09 Sep 2011 23:36:00 GMT';

    public function setup()
    {
        $_SERVER['aws_time'] = true;
    }

    public function testReturnsRegionAndService()
    {
        $s = new SignatureV4('foo', 'bar');
        $this->assertEquals('foo', $s->getServiceName());
        $this->assertEquals('bar', $s->getRegionName());
    }

    public function testAddsSecurityTokenIfPresent()
    {
        $s = new SignatureV4('foo', 'bar');
        $c = new Credentials('a', 'b', 'AddMe!');
        $r = new Request('GET', 'http://httpbin.org');
        $s->signRequest($r, $c);
        $this->assertContains('x-amz-security-token: AddMe!', (string) $r);
        $ctx = $r->getConfig()->get('aws.signature');
        $this->assertContains('x-amz-security-token:AddMe!', $ctx['creq']);
        $this->assertContains('date;host;x-amz-security-token', $ctx['creq']);
        $this->assertContains('x-amz-security-token', $ctx['headers']);
    }

    public function testSignsRequestsWithMultiValuedHeaders()
    {
        $s = new SignatureV4('foo', 'bar');
        $c = new Credentials('a', 'b');
        $r = new Request('GET', 'http://httpbin.org', [
            'Foo' => ['baz', '  bar ']
        ]);
        $s->signRequest($r, $c);
        $this->assertContains('SignedHeaders=date;foo;host', (string) $r);
        $ctx = $r->getConfig()->get('aws.signature');
        $this->assertContains('foo:bar,baz', $ctx['creq']);
        $this->assertContains('date;foo;host', $ctx['creq']);
        $this->assertNotContains('x-amz-security-token', $ctx['headers']);
    }

    /**
     * @dataProvider testSuiteProvider
     */
    public function testSignsRequestsProperly($group)
    {
        // Create a request based on the '.req' file
        $requestString = file_get_contents($group['req']);
        $request = (new MessageFactory)->fromMessage($requestString);
        // Hack the request to get the broken test suite working.
        $request = new HackRequest(
            $request->getMethod(),
            $request->getUrl(),
            $request->getHeaders(),
            $request->getBody()
        );
        // Sanitize the request
        $request->removeHeader('User-Agent');
        $request->removeHeader('Content-Length');
        // Sign the request using the test credentials
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        // Get a mock signature object
        $signature = new SignatureV4('host', 'us-east-1');
        // Sign the request
        $signature->signRequest($request, $credentials);
        // Get debug signature information
        $context = $request->getConfig()['aws.signature'];
        // Test that the canonical request is correct
        $this->assertEquals(
            str_replace("\r", '', file_get_contents($group['creq'])),
            $context['creq']
        );
        // Test that the string to sign is correct
        $this->assertEquals(
            str_replace("\r", '', file_get_contents($group['sts'])),
            $context['string_to_sign']
        );
        // Test that the authorization header is correct
        $this->assertEquals(
            str_replace("\r", '', file_get_contents($group['authz'])),
            $request->getHeader('Authorization')
        );
    }

    /**
     * @return array
     */
    public function testSuiteProvider()
    {
        // Gather a list of files sorted by name
        $files = glob(__DIR__ . DIRECTORY_SEPARATOR
            . 'aws4_testsuite' . DIRECTORY_SEPARATOR . '*');

        // Skip the get-header-key-duplicate.* and
        // get-header-value-order.authz.* test files for now; they are believed
        // to be invalid tests. See https://github.com/aws/aws-sdk-php/issues/161
        $files = array_filter($files, function($file) {
            return ((strpos($file, 'get-header-key-duplicate.') === false) &&
                (strpos($file, 'get-header-value-order.'  ) === false));
        });
        sort($files);

        // Break the files up into groups of five for each test case
        $groups = $group = [];
        for ($i = 0, $c = count($files); $i < $c; $i++) {
            $types = explode('.', $files[$i]);
            $type = end($types);
            $group[$type] = $files[$i];
            if (count($group) == 5) {
                $groups[] = [$group];
                $group = [];
            }
        }

        return $groups;
    }

    public function testMaintainsCappedCache()
    {
        $sig = new SignatureV4('foo', 'bar');
        // Hack the class so that it thinks it needs 3 more entries to be full
        $p = new \ReflectionProperty($sig, 'cacheSize');
        $p->setAccessible(true);
        $p->setValue($sig, 47);

        $request = new Request('GET', 'http://www.example.com');
        $credentials = new Credentials('fizz', 'buzz');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(1, count($this->readAttribute($sig, 'cache')));

        $credentials = new Credentials('fizz', 'baz');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(2, count($this->readAttribute($sig, 'cache')));

        $credentials = new Credentials('fizz', 'paz');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(3, count($this->readAttribute($sig, 'cache')));

        $credentials = new Credentials('fizz', 'foobar');
        $sig->signRequest($request, $credentials);
        $this->assertEquals(1, count($this->readAttribute($sig, 'cache')));
    }

    public function queryProvider()
    {
        return [
            [[], ''],
            [['X-Amz-Signature' => 'foo'], ''],
            [['Foo' => '123', 'Bar' => '456'], 'Bar=456&Foo=123'],
            [['Foo' => ['b', 'a'], 'a' => 'bc'], 'Foo=a&Foo=b&a=bc'],
            [['Foo' => '', 'a' => 'b' ], 'Foo=&a=b']
        ];
    }

    /**
     * @covers Aws\Common\Signature\SignatureV4::getCanonicalizedQuery
     * @dataProvider queryProvider
     */
    public function testCreatesCanonicalizedQuery($data, $string)
    {
        $method = new \ReflectionMethod(
            'Aws\Common\Signature\SignatureV4',
            'getCanonicalizedQuery'
        );
        $method->setAccessible(true);

        // Create a request and replace the headers with the test headers
        $request = new Request('GET', 'http://www.example.com');
        $request->getQuery()->replace($data);

        $signature = $this->getMockBuilder('Aws\Common\Signature\SignatureV4')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->assertEquals($string, $method->invoke($signature, $request));
    }
}
