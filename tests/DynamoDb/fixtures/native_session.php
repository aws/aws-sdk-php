<?php

/**
 * Runs native PHP sessions through the DynamoDB SessionHandler against an
 * in-memory table, and prints the outcome as JSON. Used by
 * SessionHandlerNativeTest in a separate process, so the diagnostics PHP
 * raises when the class is loaded are captured too.
 *
 * Usage: php native_session.php <scenario> <connection> <strict>
 * where connection is "standard", "locking" or "custom".
 */

use Aws\CommandInterface;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\SessionConnectionInterface;
use Aws\DynamoDb\SessionHandler;
use Aws\DynamoDb\StandardSessionConnection;
use Aws\Result;

$diagnostics = [];
set_error_handler(function ($level, $message, $file, $line) use (&$diagnostics) {
    // Only report what the session code raises, not other libraries.
    if (strpos($file, 'DynamoDb') !== false || $file === __FILE__) {
        $diagnostics[] = "$message in " . basename($file) . ":$line";
    }

    return true;
});
error_reporting(E_ALL);

require __DIR__ . '/../../../vendor/autoload.php';

list(, $scenario, $connectionType, $strict) = $argv;
ini_set('session.use_strict_mode', $strict);
ini_set('session.use_cookies', '0');
ini_set('session.cache_limiter', '');

$table = [];
$commands = [];
$failNext = 0;
$lockReleasedAfter = null;
$client = new DynamoDbClient([
    'region' => 'us-east-1',
    'version' => 'latest',
    'credentials' => ['key' => 'foo', 'secret' => 'bar'],
    'handler' => function (CommandInterface $command) use (
        &$table,
        &$commands,
        &$failNext,
        &$lockReleasedAfter
    ) {
        $key = current($command['Key'])['S'];
        $commands[] = [$command->getName(), $key, $command['ConsistentRead']];
        if ($failNext > 0) {
            $failNext--;
            throw new DynamoDbException('Lookup failed', $command, [
                'code' => 'InternalServerError',
            ]);
        }
        switch ($command->getName()) {
            case 'GetItem':
                return new Result(isset($table[$key]) ? ['Item' => $table[$key]] : []);
            case 'UpdateItem':
                if (isset($command['Expected']['lock']) && isset($table[$key]['lock'])) {
                    if ($lockReleasedAfter !== null && --$lockReleasedAfter <= 0) {
                        unset($table[$key]['lock']);
                    }
                    throw new DynamoDbException('Locked', $command, [
                        'code' => 'ConditionalCheckFailedException',
                    ]);
                }
                $item = isset($table[$key]) ? $table[$key] : [];
                $item += [key($command['Key']) => ['S' => $key]];
                foreach ($command['AttributeUpdates'] as $name => $update) {
                    if (isset($update['Action']) && $update['Action'] === 'DELETE') {
                        unset($item[$name]);
                    } else {
                        $item[$name] = $update['Value'];
                    }
                }
                $table[$key] = $item;

                return new Result(['Attributes' => $item]);
            case 'DeleteItem':
                unset($table[$key]);

                return new Result([]);
        }
        throw new \RuntimeException('Unexpected ' . $command->getName());
    },
]);

$config = [
    'table_name' => 'my_sessions',
    'hash_key' => 'sid',
    'session_lifetime_attribute' => 'ttl',
    'consistent_read' => false,
    'locking' => $connectionType === 'locking',
    'max_lock_wait_time' => 2,
    'min_lock_retry_microtime' => 1000,
    'max_lock_retry_microtime' => 2000,
];
if ($connectionType === 'custom') {
    // A connection that only implements the interface, so validateId()
    // cannot look sessions up.
    $connection = new class (new StandardSessionConnection($client, $config)) implements SessionConnectionInterface {
        private $inner;

        public function __construct($inner)
        {
            $this->inner = $inner;
        }

        public function read($id)
        {
            return $this->inner->read($id);
        }

        public function write($id, $data, $isDataChanged)
        {
            return $this->inner->write($id, $data, $isDataChanged);
        }

        public function delete($id)
        {
            return $this->inner->delete($id);
        }

        public function deleteExpired()
        {
            $this->inner->deleteExpired();
        }

        public function getDataAttribute()
        {
            return $this->inner->getDataAttribute();
        }

        public function getSessionLifetimeAttribute()
        {
            return $this->inner->getSessionLifetimeAttribute();
        }
    };
    $handler = new SessionHandler($connection);
} else {
    $handler = SessionHandler::fromClient($client, $config);
}
$handler->register();

function item($data, $expires, $lock = false)
{
    $item = ['ttl' => ['N' => (string) $expires]];
    if ($data !== null) {
        $item['data'] = ['S' => $data];
    }
    if ($lock) {
        $item['lock'] = ['N' => '1'];
    }

    return $item;
}

function start($id = null)
{
    if ($id !== null) {
        session_id($id);
    }
    session_start();

    return session_id();
}

$name = session_name();
$out = [];
switch ($scenario) {
    case 'new_and_resume':
        $id = start();
        $_SESSION['count'] = 1;
        session_write_close();
        $out['resumed'] = start($id) === $id;
        $out['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : null;
        break;

    case 'create_id':
        start();
        $out['created'] = session_create_id();
        $out['prefixed'] = session_create_id('pfx-');
        $out['id'] = session_id();
        break;

    case 'reopen_after_create_id':
        // A generated but unused ID must not stick around once the session
        // is closed or aborted and another one is opened.
        $id = start();
        $_SESSION['count'] = 1;
        session_write_close();
        start($id);
        session_create_id();
        session_abort();
        $out['after_abort'] = start($id) === $id;
        session_create_id();
        session_write_close();
        $out['after_close'] = start($id) === $id;
        $out['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : null;
        // Switching to an ID from session_create_id() by hand, like the
        // example in the PHP manual. Strict mode rejects it when the
        // handler can tell it does not exist yet, as with files.
        $new = session_create_id();
        session_write_close();
        $out['manual'] = start($new) === $new;
        break;

    case 'regenerate':
        foreach (['keep' => false, 'delete' => true] as $label => $delete) {
            $old = start();
            $_SESSION['count'] = 1;
            session_regenerate_id($delete);
            $new = session_id();
            $_SESSION['count']++;
            session_write_close();
            $out[$label] = [
                'changed' => $new !== $old && $new !== '',
                'resumed' => start($new) === $new,
                'count' => isset($_SESSION['count']) ? $_SESSION['count'] : null,
                'old_kept' => isset($table["{$name}_$old"]),
            ];
            session_write_close();
            session_id('');
        }
        break;

    case 'unknown_and_expired':
        $table["{$name}_expired"] = item('count|i:5;', time() - 100);
        $out['unknown'] = start('unknown') === 'unknown';
        session_write_close();
        session_id('');
        $out['expired'] = start('expired') === 'expired';
        $out['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : null;
        break;

    case 'empty_session':
        // An item without data that has not expired is a valid session.
        $table["{$name}_empty"] = item(null, time() + 100);
        $out['resumed'] = start('empty') === 'empty';
        break;

    case 'locked':
        // A request that took the lock but has not written yet, and one
        // that holds the lock past the expiry time. Both keep their ID and
        // wait for the lock as before.
        $table["{$name}_pending"] = ['lock' => ['N' => '1']];
        $table["{$name}_slow"] = item('count|i:3;', time() - 100, true);
        foreach (['pending', 'slow'] as $id) {
            $lockReleasedAfter = 3;
            $out[$id] = start($id) === $id;
            session_write_close();
            session_id('');
        }
        break;

    case 'lookup_fails':
        // A failed lookup keeps the ID, and read() handles the error the
        // way it always has.
        $table["{$name}_active"] = item('count|i:2;', time() + 100);
        $failNext = 1;
        $out['resumed'] = start('active') === 'active';
        $out['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : null;
        break;
}

$out['diagnostics'] = $diagnostics;
$out['commands'] = $commands;
echo json_encode($out);
