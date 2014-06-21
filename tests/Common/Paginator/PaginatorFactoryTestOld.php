<?php
namespace Aws\Test\Common\Paginator;

use Aws\Common\Paginator\PaginatorFactory;

/**
 * @covers Aws\Common\Paginator\PaginatorFactory
 */
class PaginatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataForPaginatorFactoryData
     */
    public function testPaginatorFactory(array $config, $success, $version)
    {
        $factory = $this->createPaginatorFactory($config, $success, $version);
        $client = $this->getMock('Aws\AwsClientInterface');

        $paginator = $factory->createPaginator($client, 'bar');
        $this->assertInstanceOf('Aws\Common\Paginator\ResultPaginator', $paginator);
    }

    /**
     * @dataProvider dataForIteratorFactoryData
     */
    public function testIteratorFactory(array $config, $success, $version)
    {
        $factory = $this->createPaginatorFactory($config, $success, $version);
        $client = $this->getMock('Aws\AwsClientInterface');

        $iterator = $factory->createIterator($client, 'bar');
        $this->assertInstanceOf('Aws\Common\Paginator\ResourceIterator', $iterator);
    }

    public function dataForPaginatorFactoryData()
    {
        return [
            // Normal paginator case
            [
                ['bar' => [
                    'input_token'  => 'NextToken',
                    'output_token' => 'LastToken',
                    'limit_key'    => 'Limit',
                    'result_key'   => 'Things',
                    'more_results' => 'HasMore',
                ]],
                true,
                1
            ],
            // Paginator not found (ERROR)
            [
                [],
                false,
                2
            ],
            // No output_token, a.k.a. not page-able (ERROR)
            [
                ['bar' => [
                    'input_token'  => 'NextToken',
                    'output_token' => null,
                    'limit_key'    => 'Limit',
                    'result_key'   => 'Things',
                    'more_results' => 'HasMore',
                ]],
                false,
                3
            ],
        ];
    }

    public function dataForIteratorFactoryData()
    {
        return [
            // Normal iterator case
            [
                ['bar' => [
                    'input_token'  => 'NextToken',
                    'output_token' => 'LastToken',
                    'limit_key'    => 'Limit',
                    'result_key'   => 'Things',
                    'more_results' => 'HasMore',
                ]],
                true,
                4
            ],
            // No result_key, a.k.a. not iter-able (ERROR)
            [
                ['bar' => [
                    'input_token'  => 'NextToken',
                    'output_token' => 'LastToken',
                    'limit_key'    => 'Limit',
                    'result_key'   => null,
                    'more_results' => 'HasMore',
                ]],
                false,
                5
            ]
        ];
    }

    /**
     * @param array $config
     * @param $success
     * @param $version
     * @return PaginatorFactory
     */
    private function createPaginatorFactory(array $config, $success, $version)
    {
        // Stub out the API provider
        $apiProvider = $this->getMock('Aws\Common\Api\ApiProviderInterface');
        $apiProvider->expects($this->any())
            ->method('getServicePaginatorConfig')
            ->with($this->equalTo('foo'))
            ->will($this->returnValue([
                'pagination' => $config
            ]));

        // If the test case should fail, say so
        if (!$success) {
            $this->setExpectedException('UnexpectedValueException');
        }

        // Create a paginator for the "foo" service and "bar" operation
        return new PaginatorFactory($apiProvider, 'foo', $version);
    }
}
