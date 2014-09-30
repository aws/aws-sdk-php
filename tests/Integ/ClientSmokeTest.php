<?php
namespace Aws\Test\Integ;

use Aws\Common\Exception\AwsException;
use GuzzleHttp\Event\BeforeEvent;

class ClientSmokeTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    /**
     * @dataProvider provideServiceTestCases
     */
    public function testBasicOperationWorks($service, $class, $options,
        $endpoint, $operation, $params, $succeed, $value
    ) {
        // Create the client and make sure it is the right class.
        $client = $this->getSdk()->getClient($service, $options);
        $this->assertInstanceOf($class, $client);

        // Setup event to get the request's host value.
        $host = null;
        $client->getHttpClient()->getEmitter()->on(
            'before',
            function (BeforeEvent $event) use (&$host) {
                $host = $event->getRequest()->getHost();
            }
        );

        // Execute the request and check if it behaved as intended.
        try {
            $result = $client->execute($client->getCommand($operation, $params));
            if (!$succeed) $this->fail("The {$operation} operation of the "
                . "{$service} service was supposed to fail.");
            $this->assertArrayHasKey($value, $result);
        } catch (AwsException $e) {
            if ($succeed) $this->fail("The {$operation} operation of the "
                . "{$service} service was supposed to succeed.");
            $this->assertStringStartsWith(
                substr($class, 0, strrpos($class, '\\')),
                get_class($e)
            );
            // Look at the error code first, then the root exception class.
            $error = $e;
            while ($error->getPrevious()) $error = $error->getPrevious();
            $this->assertEquals(
                $value,
                $e->getAwsErrorCode() ?: get_class($error),
                $e->getMessage()
            );
        } catch (\Exception $e) {
            $this->fail('An unexpected exception occurred: ' . get_class($e));
        }

        // Make sure the request's host value is correct no matter the outcome.
        $this->assertEquals($endpoint, $host);
    }

    public function provideServiceTestCases()
    {
        return [
            /*[
                service (used with Sdk::getClient())
                class (actual class name of client)
                options (client options, besides region, version, & credentials)
                endpoint (the request host)
                operation (service operation name)
                params (parameters for the operation)
                succeeds (bool - whether or not the request should succeed)
                value (a key that should be present in the result
                       OR... the error code in the case of failure)
            ],*/
            [
                'autoscaling',
                'Aws\\AutoScaling\\AutoScalingClient',
                [],
                'autoscaling.us-east-1.amazonaws.com',
                'DescribeAccountLimits',
                [],
                true,
                'MaxNumberOfAutoScalingGroups'
            ],
            [
                'cloudformation',
                'Aws\\CloudFormation\\CloudFormationClient',
                [],
                'cloudformation.us-east-1.amazonaws.com',
                'DescribeStacks',
                [],
                true,
                'Stacks'
            ],
            [
                'cloudfront',
                'Aws\\CloudFront\\CloudFrontClient',
                [],
                'cloudfront.amazonaws.com',
                'ListDistributions',
                [],
                true,
                'DistributionList'
            ],
            [
                'cloudsearch',
                'Aws\\CloudSearch\\CloudSearchClient',
                [],
                'cloudsearch.us-east-1.amazonaws.com',
                'DescribeDomains',
                [],
                true,
                'DomainStatusList'
            ],
            [
                'cloudsearchdomain',
                'Aws\\CloudSearchDomain\\CloudSearchDomainClient',
                ['endpoint' => 'search-foo.cloudsearch.us-east-1.amazonaws.com'],
                'search-foo.cloudsearch.us-east-1.amazonaws.com',
                'Search',
                ['query' => 'foo'],
                false,
                'GuzzleHttp\Ring\Exception\RingException'
            ],
            [
                'cloudtrail',
                'Aws\\CloudTrail\\CloudTrailClient',
                [],
                'cloudtrail.us-east-1.amazonaws.com',
                'DeleteTrail',
                ['Name' => 'foo'],
                false,
                'TrailNotFoundException'
            ],
            [
                'datapipeline',
                'Aws\\DataPipeline\\DataPipelineClient',
                [],
                'datapipeline.us-east-1.amazonaws.com',
                'DescribePipelines',
                ['pipelineIds' => ['foo']],
                false,
                'PipelineNotFoundException'
            ],
            [
                'directconnect',
                'Aws\\DirectConnect\\DirectConnectClient',
                [],
                'directconnect.us-east-1.amazonaws.com',
                'DescribeConnections',
                [],
                true,
                'connections'
            ],
            [
                'dynamodb',
                'Aws\\DynamoDb\\DynamoDbClient',
                [],
                'dynamodb.us-east-1.amazonaws.com',
                'ListTables',
                [],
                true,
                'TableNames'
            ],

            // @TODO ec2-route53

            [
                's3',
                'Aws\\S3\\S3Client',
                [],
                't0tally-1nval1d-8uck3t-nam3.s3.amazonaws.com',
                'ListObjects',
                ['Bucket' => 't0tally-1nval1d-8uck3t-nam3'],
                false,
                'NoSuchBucket'
            ],

            // @TODO sdb-swf
        ];
    }
}
