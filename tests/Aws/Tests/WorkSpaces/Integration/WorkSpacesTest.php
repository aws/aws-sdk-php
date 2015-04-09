<?php

namespace Aws\Tests\WorkSpaces\Integration;

use Aws\WorkSpaces\WorkSpacesClient;

/**
 * @group integration
 * @outputBuffering enabled
 */
class WorkSpacesTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var WorkSpacesClient
     */
    protected $ws;

    public function setUp()
    {
        $this->ws = $this->getServiceBuilder()->get('workspaces');
    }

    public function testDescribeOperation()
    {
        $result = $this->ws->describeWorkspaces();
        $this->assertArrayHasKey('Workspaces', $result->toArray());
    }

    public function testErrorIsParsedCorrectly()
    {
        try {
            $this->ws->describeWorkspaces(array(
                'WorkspaceIds' => array('foobar'),
            ));
            $this->fail('An exception should be thrown.');
        } catch (\Aws\WorkSpaces\Exception\WorkSpacesException $e) {
            $this->assertEquals('ValidationException', $e->getExceptionCode());
        }
    }
}
