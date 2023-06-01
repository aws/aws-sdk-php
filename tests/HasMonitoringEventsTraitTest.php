<?php
namespace Aws\Test;

use Aws\HasMonitoringEventsTrait;
use PHPUnit\Framework\TestCase;


/**
 * @covers \Aws\HasMonitoringEventsTrait
 */
class HasMonitoringEventsTraitTest extends TestCase
{

    public function testAddsAndRetrievesMonitoringEvents()
    {
        $events = [
            [
                'property1' => true,
                'property2' => 'value2',
                'property3' => 3.14159
            ],
            [
                'property1' => false,
                'property2' => 'value5',
                'property3' => 8675309
            ]
        ];

        $mock = $this->getMockForTrait(HasMonitoringEventsTrait::class);
        foreach($events as $event) {
            $mock->appendMonitoringEvent($event);
        }

        $this->assertSame(
            $events, $mock->getMonitoringEvents()
        );
    }

}
