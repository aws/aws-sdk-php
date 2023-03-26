<?php
namespace Aws\Test\DynamoDb;

use Aws\DynamoDb\SessionConnectionConfigTrait;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\DynamoDb\SessionConnectionConfigTrait
 */
class SessionConnectionConfigTraitTest extends TestCase
{
    use UsesServiceTrait;

    public function testStandardConfig()
    {
        $scc = $this->getMockForTrait(SessionConnectionConfigTrait::class);
        $scc->setSessionLifetime((int) ini_get('session.gc_maxlifetime'));
        $this->assertSame('sessions', $scc->getTableName());
        $this->assertSame('id', $scc->getHashKey());
        $this->assertSame('data', $scc->getDataAttribute());
        $this->assertSame('string', $scc->getDataAttributeType());
        $this->assertSame((int) ini_get('session.gc_maxlifetime'), $scc->getSessionLifetime());
        $this->assertSame('expires', $scc->getSessionLifetimeAttribute());
        $this->assertTrue($scc->isConsistentRead());
        $this->assertFalse($scc->isLocking());
        $this->assertEmpty($scc->getBatchConfig());
        $this->assertSame(10, $scc->getMaxLockWaitTime());
        $this->assertSame(10000, $scc->getMinLockRetryMicrotime());
        $this->assertSame(50000, $scc->getMaxLockRetryMicrotime());
    }

    public function testCustomConfig()
    {
        $config = [
            'table_name'                    => 'sessions_custom',
            'hash_key'                      => 'id_custom',
            'data_attribute'                => 'data_custom',
            'data_attribute_type'           => 'binary',
            'session_lifetime'              => 2019,
            'session_lifetime_attribute'    => 'expires_custom',
            'consistent_read'               => false,
            'batch_config'                  => ['hello' => 'hello'],
            'locking'                       => true,
            'max_lock_wait_time'            => 2019,
            'min_lock_retry_microtime'      => 2019,
            'max_lock_retry_microtime'      => 2019
        ];
        $scc = $this->getMockForTrait(SessionConnectionConfigTrait::class);
        $scc->initConfig($config);
        $this->assertSame('sessions_custom', $scc->getTableName());
        $this->assertSame('id_custom', $scc->getHashKey());
        $this->assertSame('data_custom', $scc->getDataAttribute());
        $this->assertSame('binary', $scc->getDataAttributeType());
        $this->assertSame(2019, $scc->getSessionLifetime());
        $this->assertSame('expires_custom', $scc->getSessionLifetimeAttribute());
        $this->assertFalse($scc->isConsistentRead());
        $this->assertTrue($scc->isLocking());
        $this->assertEquals($scc->getBatchConfig(), ['hello' => 'hello']);
        $this->assertSame(2019, $scc->getMaxLockWaitTime());
        $this->assertSame(2019, $scc->getMinLockRetryMicrotime());
        $this->assertSame(2019, $scc->getMaxLockRetryMicrotime());

        // Test Custom Config Without Session Lifetime
        unset($config['session_lifetime']);
        $scc = $this->getMockForTrait(SessionConnectionConfigTrait::class);
        $scc->initConfig($config);
        $this->assertSame((int) ini_get('session.gc_maxlifetime'), $scc->getSessionLifetime());
    }
}
