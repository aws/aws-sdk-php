<?php

namespace Aws\Test\S3\Parser;

use Aws\Command;
use Aws\Result;
use Aws\S3\Parser\GetBucketLocationResultMutator;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class GetBucketLocationResultMutatorTest extends TestCase
{
    /**
     * Test that the bucket location is extracted from the response
     * and added to the result as the LocationConstraint field.
     *
     * @return void
     * @dataProvider  getTestCases
     */
    public function testInjectsLocationConstraint($operationName, $responseBody, $expectedValue)
    {
        $mutator = new GetBucketLocationResultMutator();
        $response = new Response(200, [], $responseBody);
        $result = $mutator(
            new Result(),
            new Command($operationName),
            $response
        );

        $this->assertEquals($expectedValue, $result['LocationConstraint']);
    }

    public function getTestCases()
    {
        return [
            ['GetBucketLocation', '<LocationConstraint>us-west-2</LocationConstraint>', 'us-west-2'],
            ['GetBucketLocation', '<LocationConstraint>EU</LocationConstraint>',        'eu-west-1'],
            ['GetBucketLocation', '<LocationConstraint/>',                              'us-east-1'],
            ['GetBucket',         '<LocationConstraint>us-west-2</LocationConstraint>', null],
        ];
    }

    /**
     * Test that the GetBucketLocationResultMutator ignores any operation
     * that is not GetBucketLocation.
     *
     * @return void
     */
    public function testMutatorDoesNotApplyToOtherOperations()
    {
        $bucketTestLocation = 'us-test-1';
        $response = new Response(
            200,
            [],
            "<LocationConstraint>$bucketTestLocation</LocationConstraint>"
        );
        $mutator = new GetBucketLocationResultMutator();
        $operations = [
            'ListObjects',
            'ListBuckets',
            'GetObject'
        ];
        foreach ($operations as $operation) {
            $result = $mutator(new Result(), new Command($operation), $response);
            $this->assertEmpty($result['LocationConstraint']);
        }
    }

    public function testUsEast1LocationAppliedAfterMultipleInvocations()
    {
        $mutator = new GetBucketLocationResultMutator();
        static $operationName = 'GetBucketLocation';

        $euResponse = new Response(200, [], '<LocationConstraint>eu-west-1</LocationConstraint>');
        $usResponse = new Response(); // Empty body, should default to us-east-1

        $result1 = $mutator(new Result(), new Command($operationName), $euResponse);
        $this->assertEquals('eu-west-1', $result1['LocationConstraint']);

        $result2 = $mutator(new Result(), new Command($operationName), $usResponse);
        $this->assertEquals('us-east-1', $result2['LocationConstraint']);
    }
}
