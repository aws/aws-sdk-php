<?php
namespace Aws\Test\Common;

use Aws\Common\Compat;
use JmesPath\Env as JmesPath;

/**
 * @covers Aws\Common\Compat
 */
class CompatTest extends \PHPUnit_Framework_TestCase
{
    public function conversionProvider()
    {
        $logger = $this->getMockBuilder('Psr\Log\LoggerInterface')
            ->getMockForAbstractClass();

        return [
            ['curl.options', [CURLOPT_VERBOSE => true], 'client_defaults.config.curl', [CURLOPT_VERBOSE => true]],
            ['key', 'a', 'credentials.key', 'a'],
            ['secret', 'b', 'credentials.secret', 'b'],
            ['token', 'c', 'credentials.token', 'c'],
            ['base_url', 'http://foo', 'endpoint', 'http://foo'],
            ['ssl.certificate_authority', '/path', 'client_defaults.verify', '/path'],
            ['client.backoff.logger', $logger, 'retry_logger', $logger],
            ['command.params', ['a' => 'b'], 'defaults', ['a' => 'b']],
            ['command.disable_validation', true, 'validate', true]
        ];
    }

    /**
     * @dataProvider conversionProvider
     */
    public function testConvertsOldValuesToNew($setting, $value, $exp, $v)
    {
        $conf[$setting] = $value;
        (new Compat)->convertConfig($conf);
        $result = JmesPath::search($exp, $conf);
        $this->assertSame($result, $v);
        $this->assertArrayNotHasKey($setting, $conf);
    }

    public function warnProvider()
    {
        return [
            ['credentials.client', true],
            ['credentials.cache.key', 'foo'],
            ['client.backoff.logger', true]
        ];
    }

    /**
     * @dataProvider warnProvider
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function testWarnsWhenNotSupported($setting, $value)
    {
        $conf[$setting] = $value;
        (new Compat)->convertConfig($conf);
    }
}
