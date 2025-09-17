<?php
namespace Aws\Test\Exception;

use Aws\Test\UsesServiceTrait;
use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Api\StructureShape;
use Aws\Command;
use Aws\Ec2\Ec2Client;
use Aws\Exception\AwsException;
use Aws\Result;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Exception\AwsException
 */
class AwsExceptionTest extends TestCase
{
    use UsesServiceTrait;

    public function testProvidesContextShortcuts(): void
    {
        $ctx = [
            'request_id' => '10',
            'type'       => 'mytype',
            'code'       => 'mycode'
        ];

        $command = new Command('foo');
        $e = new AwsException('Foo', $command, $ctx);
        $this->assertSame('10', $e->getAwsRequestId());
        $this->assertSame('mytype', $e->getAwsErrorType());
        $this->assertSame('mycode', $e->getAwsErrorCode());
        $this->assertSame($command, $e->getCommand());
        $this->assertNull($e->getResult());
    }

    public function testReturnsStatusCode(): void
    {
        $ctx = ['response' => new Response(400)];
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, $ctx);
        $this->assertSame(400, $e->getStatusCode());
    }

    public function testSetsMaxRetriesExceeded(): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command);
        $this->assertFalse($e->isMaxRetriesExceeded());
        $e->setMaxRetriesExceeded();
        $this->assertTrue($e->isMaxRetriesExceeded());
    }

    public function testProvidesResult(): void
    {
        $command = new Command('foo');
        $result = new Result();
        $e = new AwsException('Foo', $command, ['result' => $result]);
        $this->assertSame($result, $e->getResult());
    }

    public function testProvidesResponse(): void
    {
        $command = new Command('foo');
        $response = new Response();
        $e = new AwsException('Foo', $command, ['response' => $response]);
        $this->assertSame($response, $e->getResponse());
    }

    public function testProvidesErrorMessage(): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, ['message' => "test error message"]);
        $this->assertSame("test error message", $e->getAwsErrorMessage());
    }

    public function testProvidesFalseConnectionErrorFlag(): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, ['connection_error' => false]);
        $this->assertFalse($e->isConnectionError());
    }

    public function testProvidesTrueConnectionErrorFlag(): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, ['connection_error' => true]);
        $this->assertTrue($e->isConnectionError());
    }

    public function testProvidesRequest(): void
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.foo.com');
        $e = new AwsException('Foo', $command, ['request' => $request]);
        $this->assertSame($request, $e->getRequest());
    }

    public function testProvidesExceptionToStringWithNoPrevious(): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command);

        $exceptionString = AwsException::class . ': Foo';

        $this->assertStringStartsWith($exceptionString, $e->__toString());
    }

    public function testProvidesExceptionToStringWithPreviousLast(): void
    {
        $prev = new \Exception("Last! '.");
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $prev);
        $this->assertStringStartsWith(
            "exception '" . AwsException::class . "' with message 'Foo'",
            $e->__toString()
        );
    }

    public function testHasData(): void
    {
        $e = new AwsException(
            'foo-message',
            new Command('bar'),
            ['body' => ['a' => 'b', 'c' => 'd']]
        );
        $this->assertSame('b', $e['a']);
        $this->assertSame('d', $e['c']);
        $this->assertSame('d', $e->get('c'));
        $this->assertTrue($e->hasKey('c'));
        $this->assertFalse($e->hasKey('f'));
        $this->assertSame('b', $e->search('a'));
    }

    public function testProvidesErrorShape(): void
    {
        $command = new Command('foo');
        $response = new Response();

        $provider = ApiProvider::filesystem(__DIR__ . '/../fixtures/aws_exception_test');
        $definition = $provider('api', 'ec2', 'latest');
        $service = new Service($definition, $provider);
        $shapes = $service->getErrorShapes();
        $errorShape = $shapes[0];

        $e = new AwsException(
            'Foo',
            $command,
            [
                'response' => $response,
                'error_shape' => $errorShape
            ]
        );
        $this->assertSame($errorShape->toArray(), $e->getAwsErrorShape()->toArray());
    }

    public function testCanIndirectlyModifyLikeAnArray(): void
    {
        $e = new AwsException(
            'foo-message',
            new Command('bar'),
            [
                'body' => [
                    'foo' => ['baz' => 'bar'],
                    'qux' => 0
                ]
            ]
        );
        $this->assertNull($e['missing']);
        $this->assertEquals(['baz' => 'bar'], $e['foo']);
        $e['foo']['lorem'] = 'ipsum';
        $this->assertEquals(['baz' => 'bar', 'lorem' => 'ipsum'], $e['foo']);
        unset($e['foo']['baz']);
        $this->assertEquals(['lorem' => 'ipsum'], $e['foo']);
        $q = $e['qux'];
        $q = 100;
        $this->assertSame(0, $e['qux']);
    }

    public function testAcceptsExceptionAsPrevious(): void
    {
        $previous = new \Exception('Previous exception');
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $previous);

        $this->assertSame($previous, $e->getPrevious());
        $this->assertInstanceOf(\Throwable::class, $e->getPrevious());
    }

    public function testAcceptsErrorAsPrevious(): void
    {
        $previous = new \Error('Previous error');
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $previous);

        $this->assertSame($previous, $e->getPrevious());
        $this->assertInstanceOf(\Throwable::class, $e->getPrevious());
    }

    public function testAcceptsCustomErrorAsPrevious(): void
    {
        $previous = new class extends \Error {
            public function __construct() {
                parent::__construct('Custom error');
            }
        };

        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $previous);

        $this->assertSame($previous, $e->getPrevious());
        $this->assertInstanceOf(\Throwable::class, $e->getPrevious());
    }

    public function testAcceptsNullAsPrevious(): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], null);

        $this->assertNull($e->getPrevious());
    }

    /**
     * @dataProvider previousThrowableProvider
     */
    public function testAcceptsVariousThrowableTypes(\Throwable $previous): void
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $previous);

        $this->assertSame($previous, $e->getPrevious());
        $this->assertInstanceOf(\Throwable::class, $e->getPrevious());
    }

    public function previousThrowableProvider(): array
    {
        return [
            'standard exception' => [new \Exception('Standard exception')],
            'runtime exception' => [new \RuntimeException('Runtime exception')],
            'error' => [new \Error('Error')],
            'type error' => [new \TypeError('Type error')],
            'arithmetic error' => [new \ArithmeticError('Arithmetic error')],
            'division by zero error' => [new \DivisionByZeroError('Division by zero')]
        ];
    }

    public function testExceptionMessageWithErrorAsPrevious(): void
    {
        $previous = new \Error('Previous error');
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $previous);

        $exceptionString = $e->__toString();

        $this->assertStringContainsString('Foo', $exceptionString);
        $this->assertStringContainsString('Previous error', $exceptionString);
        $this->assertStringContainsString('Previous error', $e->__toString());
    }
}
