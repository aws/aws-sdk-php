<?php

namespace Aws\Test\CloudWatchLogs;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\CommandInterface;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CloudWatchLogsClientTest extends TestCase
{
    public function testSetStreamingFlagMiddleware()
    {
        $client = new CloudWatchLogsClient([
            'region' => 'us-east-2',
            'http_handler' => function (RequestInterface $request) {
                return new Response(200);
            }
        ]);
        $client->getHandlerList()->appendInit(function ($handler) {
            return function (CommandInterface $command, $request=null) use ($handler) {
                self::assertNotEmpty($command['@http']['stream']);
                self::assertTrue($command['@http']['stream']);

                return $handler($command, $request);
            };
        });
        $client->startLiveTail([
            'logGroupIdentifiers' => [
                'arn:aws:logs:us-east-1:1234567890123:log-group:TestLogGroup'
            ],
            'logStreamNames' => [
                'TestLogStream'
            ]
        ]);
    }

    /**
     * This test checks whether the helper method `startLiveTailCheckingForResults` ignores
     * any event of type sessionUpdate where its property `sessionResults` is empty.
     * In the encoded events used here to test, there are two events of type `sessionUpdate`,
     * where in the first one `sessionResults` is empty and in the second one `sessionResults` has
     * one log entry, and in our validation we are not expecting the one with `sessionResults`
     * being empty to be considered.
     */
    public function testStartLiveTailCheckingForResults()
    {
        $responseBody = <<<EOF
AAAAaAAAAFZOaBckDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcAEGluaXRpYWwtcmVzcG9uc2UNOmNvbnRlbnQtdHlwZQcAEGFwcGxpY2F0aW9uL2pzb25bXVB+KHcAAADfAAAAUuviBzkNOm1lc3NhZ2UtdHlwZQcABWV2ZW50CzpldmVudC10eXBlBwAMc2Vzc2lvblN0YXJ0DTpjb250ZW50LXR5cGUHABBhcHBsaWNhdGlvbi9qc29ueyJyZXF1ZXN0SWQiOiJmb28iLCJzZXNzaW9uSWQiOiJmb28iLCJsb2dHcm91cElkZW50aWZpZXJzIjpbInRlc3RMb2dHcm91cElkZW50aWZpZXIiXSwibG9nU3RyZWFtTmFtZXMiOlsidGVzdExvZ1N0cmVhbU5hbWUiXX14FSp9AAAAmQAAAFNLVppGDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcADXNlc3Npb25VcGRhdGUNOmNvbnRlbnQtdHlwZQcAEGFwcGxpY2F0aW9uL2pzb257InNlc3Npb25NZXRhZGF0YSI6eyJzYW1wbGVkIjoiIn0sInNlc3Npb25SZXN1bHRzIjpbXX16yBQLAAABGAAAAFMMjNDBDTptZXNzYWdlLXR5cGUHAAVldmVudAs6ZXZlbnQtdHlwZQcADXNlc3Npb25VcGRhdGUNOmNvbnRlbnQtdHlwZQcAEGFwcGxpY2F0aW9uL2pzb257InNlc3Npb25NZXRhZGF0YSI6eyJzYW1wbGVkIjoiIn0sInNlc3Npb25SZXN1bHRzIjpbeyJsb2dTdHJlYW1OYW1lIjoiRm9vIiwibG9nR3JvdXBJZGVudGlmaWVyIjoiRm9vIiwibWVzc2FnZSI6IlRlc3QgbG9nIGVudHJ5IiwidGltZXN0YW1wIjoxNzE0NDc4ODU4LCJpbmdlc3Rpb25UaW1lIjoxNzE0NDc4ODU4fV19iY5vJg==
EOF;
        $client = new CloudWatchLogsClient([
            'region' => 'us-east-1',
            'http_handler' => function (RequestInterface $request) use ($responseBody) {
                return new Response(200, [], new NoSeekStream(Utils::streamFor(base64_decode($responseBody))));
            }
        ]);
        $iterator = $client->startLiveTailCheckingForResults([
            'logGroupIdentifiers' => [
                "arn:aws:logs:us-east-1:123456789012:log-group:testLogGroup"
            ],
            'logStreamNames' => [
                'testLogStream'
            ]
        ]);
        $expectedEvents = [
            [
                'initial-response' => []
            ],
            [
                'sessionStart' => [
                    'requestId' => 'foo',
                    'sessionId' => 'foo',
                    'logGroupIdentifiers' => [
                        'testLogGroupIdentifier'
                    ],
                    'logStreamNames' => [
                        'testLogStreamName'
                    ]
                ],
            ],
            [
                'sessionUpdate' => [
                    'sessionMetadata' => [
                        'sampled' => ''
                    ],
                    'sessionResults' => [
                        [
                            'logStreamName' => 'Foo',
                            'logGroupIdentifier' => 'Foo',
                            'message' => 'Test log entry',
                            'timestamp' => 1714478858,
                            'ingestionTime' => 1714478858
                        ]
                    ]
                ]
            ]
        ];
        $eventIndex = 0;
        foreach ($iterator as $event) {
            $this->assertEquals($expectedEvents[$eventIndex], $event);
            $eventIndex++;
        }
    }
}
