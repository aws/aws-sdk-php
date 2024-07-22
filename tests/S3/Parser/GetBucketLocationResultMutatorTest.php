<?php

namespace Aws\Test\S3\Parser;

use Aws\Command;
use Aws\Result;
use Aws\S3\Parser\GetBucketLocationResultMutator;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class GetBucketLocationResultMutatorTest extends TestCase
{
    public function testInjectsLocationConstraint()
    {
        $bucketTestLocation = 'us-test-1';
        $response = new Response(200, [], "<LocationConstraint>$bucketTestLocation</LocationConstraint>");
        $mutator = new GetBucketLocationResultMutator();
        $result = $mutator(new Result(), new Command('GetBucketLocation'), $response);

        $this->assertEquals($bucketTestLocation, $result['LocationConstraint']);
    }
}
