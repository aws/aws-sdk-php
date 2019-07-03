<?php
namespace Aws\Test\DynamoDb;

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
        $scc = $this->getMockForTrait('Aws\DynamoDb\SessionConnectionConfigTrait');
        $scc->setSessionLifetime((int) ini_get('session.gc_maxlifetime'));
        $this->assertEquals('sessions', $scc->getTableName());
        $this->assertEquals('id', $scc->getHashKey());
        $this->assertEquals('data', $scc->getDataAttribute());
        $this->assertEquals('string', $scc->getDataAttributeType());
        $this->assertEquals((int) ini_get('session.gc_maxlifetime'), $scc->getSessionLifetime());
        $this->assertEquals('expires', $scc->getSessionLifetimeAttribute());
        $this->assertTrue($scc->isConsistentRead());
        $this->assertFalse($scc->isLocking());
        $this->assertEmpty($scc->getBatchConfig());
        $this->assertEquals(10, $scc->getMaxLockWaitTime());
        $this->assertEquals(10000, $scc->getMinLockRetryMicrotime());
        $this->assertEquals(50000, $scc->getMaxLockRetryMicrotime());
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
        $scc = $this->getMockForTrait('Aws\DynamoDb\SessionConnectionConfigTrait');
        $scc->initConfig($config);
        $this->assertEquals('sessions_custom', $scc->getTableName());
        $this->assertEquals('id_custom', $scc->getHashKey());
        $this->assertEquals('data_custom', $scc->getDataAttribute());
        $this->assertEquals('binary', $scc->getDataAttributeType());
        $this->assertEquals(2019, $scc->getSessionLifetime());
        $this->assertEquals('expires_custom', $scc->getSessionLifetimeAttribute());
        $this->assertFalse($scc->isConsistentRead());
        $this->assertTrue($scc->isLocking());
        $this->assertEquals($scc->getBatchConfig(), ['hello' => 'hello']);
        $this->assertEquals(2019, $scc->getMaxLockWaitTime());
        $this->assertEquals(2019, $scc->getMinLockRetryMicrotime());
        $this->assertEquals(2019, $scc->getMaxLockRetryMicrotime());

        // Test Custom Config Without Session Lifetime
        unset($config['session_lifetime']);
        $scc = $this->getMockForTrait('Aws\DynamoDb\SessionConnectionConfigTrait');
        $scc->initConfig($config);
        $this->assertEquals((int) ini_get('session.gc_maxlifetime'), $scc->getSessionLifetime());
    }
}
