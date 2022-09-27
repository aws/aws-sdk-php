<?php
namespace Aws\Test;

use Aws\Api\DateTimeResult;
use Aws\AwsClient;
use Aws\EndpointParameterMiddleware;
use Aws\HandlerList;
use Aws\Api\Service;
use Aws\InputValidationMiddleware;
use Cassandra\Time;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\InputValidationMiddleware
 */
class InputValidationMiddlewareTest extends TestCase
{
    /**
     * Data provider for exceptions treated as invalid argument exceptions
     *
     * @return array
     */
    public function getInvalidEndpointExceptions()
    {
        return [
            [''],
            [' '],
            ['  '],
            [null],
        ];
    }

    /**
     * Data provider for exceptions treated as invalid argument exceptions
     *
     * @return array
     */
    public function getValidInputs()
    {
        return [
            ['existing data'],
            [' q '],
            [[]],
            [['abc']],
            [0],
            [DateTimeResult::fromEpoch(time())],
        ];
    }

    /**
     * @dataProvider getInvalidEndpointExceptions
     *
     * @param $input
     */
    public function testThrowsExceptions($input)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('RequiredOp', ['InputParameter' => $input]);
        $mandatoryInputList = ['InputParameter'];

        $list = new HandlerList();
        $list->setHandler(function ($command) {
            return;
        });
        $list->appendValidate(
            InputValidationMiddleware::wrap($service, $mandatoryInputList)
        );
        $handler = $list->resolve();

        try {
            $handler($command, new Request('POST', 'https://foo.com'));
            $this->fail('Test should have thrown an InvalidArgumentException for not having required parameter set.');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(
                "The RequiredOp operation requires non-empty parameter: InputParameter",
                $e->getMessage()
            );
        }
    }

    /**
     * @dataProvider getInvalidEndpointExceptions
     *
     * @param $input
     */
    public function testNoValidationWithoutInputList($input)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('RequiredOp', ['InputParameter' => $input]);
        $mandatoryInputList = [];
        $list = new HandlerList();
        $list->setHandler(function ($command) {
            return "success";
        });
        $list->appendValidate(
            InputValidationMiddleware::wrap($service, $mandatoryInputList)
        );
        $handler = $list->resolve();
        $result = $handler($command, new Request('POST', 'https://foo.com'));
        self::assertSame($result, "success");
    }

    /**
     * @dataProvider getValidInputs
     *
     * @param $input
     */
    public function testPassingValidations($input)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('RequiredOp', ['InputParameter' => $input]);
        $mandatoryInputList = ['InputParameter'];

        $list = new HandlerList();
        $list->setHandler(function ($command) {
            return "success";
        });
        $list->appendValidate(
            InputValidationMiddleware::wrap($service, $mandatoryInputList)
        );

        $handler = $list->resolve();

        $result = $handler($command, new Request('POST', 'https://foo.com'));
        self::assertSame($result, "success");
    }

    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service'      => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                ],
                $args
            )
        );
    }

    private function generateTestService()
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => "json",
                    "apiVersion" => "2014-01-01",
                    "jsonVersion" => "1.1"
                ],
                'shapes' => [
                    "InputShape" => [
                        "type" => "structure",
                        "required" => [
                            "InputParameter"
                        ],
                        "members" => [
                            "RequiredInputParameter" => [
                                "shape" => "StringType"
                            ],
                        ],
                    ],
                    "StringType"=> [
                        "type"=> "string"
                    ],
                ],
                'operations' => [
                    "RequiredOp"=> [
                        "name"=> "RequiredOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "InputShape"],
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}
