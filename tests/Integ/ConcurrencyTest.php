<?php
namespace Aws\Test\Integ;

use JmesPath\Env as Jp;
use GuzzleHttp\Command\Event\ProcessEvent;

class ConcurrencyTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testSendsRequestsConcurrently()
    {
        $s3 = $this->getSdk()->getS3();

        $commands = [
            $s3->getCommand('ListBuckets'),
            $s3->getCommand('ListBuckets'),
            $s3->getCommand('ListBuckets')
        ];
        $results = [];
        $s3->executeAll($commands, [
            'process' => function (ProcessEvent $e) use (&$results) {
                $results[] = $e->getResult();
            }
        ]);
        $this->assertCount(3, $results);
        $this->assertCount(1, array_unique(Jp::search('[*].Owner.ID', $results)));
    }

    public function testSendsRequestsConcurrentlyWithPool()
    {
        $s3 = $this->getSdk()->getS3();

        $commands = [
            $s3->getCommand('ListBuckets'),
            $s3->getCommand('ListBuckets'),
            $s3->getCommand('ListBuckets')
        ];

        $resolved = false;
        $processResults = $progress = [];
        $pool = $s3->createPool($commands, [
            'process' => function (ProcessEvent $e) use (&$processResults) {
                $processResults[] = $e->getResult();
            }
        ]);

        $pool->then(
            function ($result) use (&$resolved) {
                $resolved = $result;
            },
            null,
            function ($result) use (&$progress) {
                $progress[] = $result;
            }
        );

        $pool->wait();
        $this->assertCount(3, $processResults);
        $this->assertCount(3, $progress);
        $this->assertSame(true, $resolved);
    }
}
