<?php

namespace Aws\Tests\CloudFront\Iterator;

use Aws\CloudFront\Iterator\ListStreamingDistributionsIterator;

/**
 * @covers Aws\CloudFront\Iterator\DefaultIterator
 */
class ListStreamingDistributionsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryCreatesClient()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(
            'cloudfront/ListStreamingDistributions_page_1',
            'cloudfront/ListStreamingDistributions_page_2'
        ));
        $iterator = $client->getIterator('ListStreamingDistributions');
        $this->assertInstanceOf('Aws\CloudFront\Iterator\DefaultIterator', $iterator);
        $result = iterator_to_array($client->getIterator('ListStreamingDistributions'));
        $this->assertEquals(3, count($result));
        $this->assertEquals('EXAMPLE1', $result[0]['Id']);
        $this->assertEquals('EXAMPLE2', $result[1]['Id']);
        $this->assertEquals('EXAMPLE3', $result[2]['Id']);
    }
}
