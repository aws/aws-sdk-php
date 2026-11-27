<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\SessionHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * Runs native PHP sessions through the handler in a separate process, see
 * fixtures/native_session.php.
 */
#[CoversClass(SessionHandler::class)]
class SessionHandlerNativeTest extends TestCase
{
    public static function sessionProvider(): array
    {
        $scenarios = [
            'new_and_resume',
            'create_id',
            'reopen_after_create_id',
            'regenerate',
            'unknown_and_expired',
            'empty_session',
            'locked',
            'lookup_fails',
        ];
        $cases = [];
        foreach (['standard', 'locking', 'custom'] as $connection) {
            foreach (['0', '1'] as $strict) {
                foreach ($scenarios as $scenario) {
                    if ($scenario === 'locked' && $connection !== 'locking') {
                        continue;
                    }
                    $cases["$scenario, $connection, strict $strict"] = [$scenario, $connection, $strict];
                }
            }
        }

        return $cases;
    }

    #[DataProvider('sessionProvider')]
    public function testNativeSession($scenario, $connection, $strict)
    {
        $out = $this->runScenario($scenario, $connection, $strict);
        $validates = $strict === '1' && $connection !== 'custom';

        $this->assertSame([], $out['diagnostics']);

        switch ($scenario) {
            case 'new_and_resume':
                $this->assertTrue($out['resumed']);
                $this->assertSame(1, $out['count']);
                break;
            case 'create_id':
                $this->assertMatchesRegularExpression('/^[a-zA-Z0-9,-]+$/', $out['created']);
                $this->assertMatchesRegularExpression('/^pfx-[a-zA-Z0-9,-]+$/', $out['prefixed']);
                $this->assertNotSame($out['id'], $out['created']);
                break;
            case 'reopen_after_create_id':
                $this->assertTrue($out['after_abort']);
                $this->assertTrue($out['after_close']);
                $this->assertSame(1, $out['count']);
                $this->assertSame(!$validates, $out['manual']);
                break;
            case 'regenerate':
                foreach (['keep' => true, 'delete' => false] as $label => $oldKept) {
                    $this->assertTrue($out[$label]['changed']);
                    $this->assertTrue($out[$label]['resumed']);
                    $this->assertSame(2, $out[$label]['count']);
                    $this->assertSame($oldKept, $out[$label]['old_kept']);
                }
                break;
            case 'unknown_and_expired':
                $this->assertSame(!$validates, $out['unknown']);
                $this->assertSame(!$validates, $out['expired']);
                $this->assertNull($out['count']);
                break;
            case 'empty_session':
            case 'locked':
                foreach ($out as $key => $value) {
                    if (!in_array($key, ['diagnostics', 'commands'], true)) {
                        $this->assertTrue($value, $key);
                    }
                }
                break;
            case 'lookup_fails':
                $this->assertTrue($out['resumed']);
                $this->assertSame($validates ? 2 : null, $out['count']);
                break;
        }

        foreach ($out['commands'] as list($name, $key, $consistentRead)) {
            // Lookups for validation are strongly consistent, even with
            // consistent_read disabled. With locking they are the only reads.
            if ($name === 'GetItem' && $connection === 'locking') {
                $this->assertTrue($consistentRead);
            }
        }
    }

    public function testStandardConnectionValidatesBeforeReading()
    {
        $out = $this->runScenario('new_and_resume', 'standard', '1');
        $gets = array_values(array_filter($out['commands'], function ($command) {
            return $command[0] === 'GetItem';
        }));

        // The validation lookup is strongly consistent, the read itself
        // still follows consistent_read.
        $this->assertSame([true, false], array_column(array_slice($gets, -2), 2));
        $this->assertSame($gets[count($gets) - 1][1], $gets[count($gets) - 2][1]);
    }

    private function runScenario($scenario, $connection, $strict)
    {
        $process = proc_open(
            [
                PHP_BINARY,
                '-d',
                'display_errors=stderr',
                __DIR__ . '/fixtures/native_session.php',
                $scenario,
                $connection,
                $strict,
            ],
            [1 => ['pipe', 'w'], 2 => ['pipe', 'w']],
            $pipes
        );
        $stdout = stream_get_contents($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        $exitCode = proc_close($process);

        $this->assertSame(0, $exitCode, $stderr);
        $out = json_decode($stdout, true);
        $this->assertIsArray($out, $stdout . $stderr);

        return $out;
    }
}
