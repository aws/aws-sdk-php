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
     */
    public function testInjectsLocationConstraint()
    {
        $bucketTestLocation = 'us-test-1';
        $response = new Response(
            200,
            [],
            "<LocationConstraint>$bucketTestLocation</LocationConstraint>"
        );
        $mutator = new GetBucketLocationResultMutator();
        $result = $mutator(
            new Result(),
            new Command('GetBucketLocation'),
            $response
        );

        $this->assertEquals($bucketTestLocation, $result['LocationConstraint']);
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
}
