<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Common\Credentials;

use Aws\Common\Credentials\Credentials;
use Guzzle\Cache\DoctrineCacheAdapter;
use Doctrine\Common\Cache\ArrayCache;

class CredentialsTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     *
     */
    protected function stripCredentialEnv() {
        $stripped = array();
        $keys = array(Credentials::ENV_KEY, Credentials::ENV_SECRET,
                    Credentials::ENV_CRED_FILE, Credentials::ENV_CONF_FILE);

        foreach($keys as $key) {
            if (isset($_SERVER[$key])) {
                $stripped[$key] = $_SERVER[$key];
                unset($_SERVER[$key]);
            }
        }
        return $stripped;
    }

    protected function restoreCredentialEnv($stripped) {
        $_SERVER = array_merge($stripped, $_SERVER);
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::__construct
     * @covers Aws\Common\Credentials\Credentials::getAccessKeyId
     * @covers Aws\Common\Credentials\Credentials::getSecretKey
     * @covers Aws\Common\Credentials\Credentials::getSecurityToken
     */
    public function testOwnsCredentials()
    {
        $c = new Credentials('abc', '123');
        $this->assertEquals('abc', $c->getAccessKeyId());
        $this->assertEquals('123', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     * @covers Aws\Common\Credentials\Credentials::__construct
     * @covers Aws\Common\Credentials\Credentials::getExpiration
     */
    public function testOwnsTokenAndExpiration()
    {
        $c = new Credentials('1', '2', 'a', 123);
        $this->assertEquals('a', $c->getSecurityToken());
        $this->assertEquals(123, $c->getExpiration());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::isExpired
     */
    public function testCredentialsDoNotExpireByDefault()
    {
        $c = new Credentials('abc', '123');
        $this->assertFalse($c->isExpired());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getExpiration
     */
    public function testCredentialProvideExpirationDetails()
    {
        $c = new Credentials('abc', '123');
        $this->assertEquals('abc', $c->getAccessKeyId());
        $this->assertEquals('123', $c->getSecretKey());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::serialize
     * @covers Aws\Common\Credentials\Credentials::unserialize
     */
    public function testCredentialsCanBeSerialized()
    {
        $c = new Credentials('a', 'b', 'c');

        $json = json_decode($c->serialize(), true);
        $this->assertEquals('a', $json['key']);
        $this->assertEquals('b', $json['secret']);
        $this->assertEquals('c', $json['token']);
        $this->assertArrayHasKey('token.ttd', $json);

        $c2 = clone $c;
        $c2->unserialize($c->serialize());
        $this->assertEquals('a', $c2->getAccessKeyId());
        $this->assertEquals('b', $c2->getSecretKey());
        $this->assertEquals('c', $c2->getSecurityToken());
    }

    public function testCanSetNewValues()
    {
        $c = new Credentials('', '');
        $c->setAccessKeyId('foo')->setSecretKey('baz')->setSecurityToken('bar')->setExpiration(123);
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals(123, $c->getExpiration());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getVarFromEnv
     */
    public function testGetVarFromEnv()
    {
        $test_env_name = "__testGetVarFromEnv__";

        $_SERVER[$test_env_name] = $test_env_name;
        $this->assertEquals($test_env_name, Credentials::getVarFromEnv($test_env_name));

        unset($_SERVER[$test_env_name]);
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getCredentialFileFormats
     */
    public function testCredentialsFileFormats()
    {
        $formats = Credentials::getCredentialFileFormats();
        $this->assertInternalType('array', $formats);

        if (count($formats) < 1) {
            $this->markTestSkipped('No credential format is defined');
            return;
        }
        
        foreach($formats as $format) {
            $this->assertInternalType('array', $format['src']);
            $this->assertInternalType('array', $format['entries']);

            $src_cnt = 0;
            if (is_array($format['src']['file'])) {
                $src_cnt += count($format['src']['file']);
            }
            if (is_array($format['src']['env'])) {
                $src_cnt += count($format['src']['env']);
            }

            $this->assertGreaterThan(0, $src_cnt);

            foreach($format['entries'] as $entry) {
                $this->assertArrayHasKey('key', $entry['keys']);
                $this->assertArrayHasKey('secret', $entry['keys']);
            }
        }
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getCredentialsFromEnv
     *
     * @depends testGetVarFromEnv
     */
    public function testGetCredentialsFromEnv() {
        $stripped = $this->stripCredentialEnv();
        
        $env_access = Credentials::ENV_KEY;
        $env_secret = Credentials::ENV_SECRET;

        $_SERVER[$env_access] = $env_secret;
        $_SERVER[$env_secret] = $env_access;

        $credentials = Credentials::getCredentialsFromEnv();

        $this->assertEquals($credentials['key'], $env_secret);
        $this->assertEquals($credentials['secret'], $env_access);

        $this->restoreCredentialEnv($stripped);
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::extractCredentialsFromFile
     *
     * @depends testCredentialsFileFormats
     */
    public function testEstractCredentialsFromFile()
    {
        $stripped = $this->stripCredentialEnv();

        foreach(Credentials::getCredentialFileFormats() as $fname => $format) {
            $fn = sprintf("%s/mock/%s.ini", __DIR__, escapeshellcmd($fname));
            $credentials = array();

            // expose the error if mock ini doesn't exist           
            Credentials::extractCredentialsFromFile($fn, $format, $credentials);

            $this->assertEquals($credentials['key'], $fname.'access');
            $this->assertEquals($credentials['secret'], $fname.'.secret');
        }

        $this->restoreCredentialEnv($stripped);
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::getConfigDefaults
     */
    public function testProvidesListOfCredentialsOptions()
    {
        $this->assertInternalType('array', Credentials::getConfigDefaults());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryCreatesBasicCredentials()
    {
        $credentials = Credentials::factory(array(
            'key'       => 'foo',
            'secret'    => 'baz',
            'token'     => 'bar',
            'token.ttd' => 123
        ));

        $this->assertInstanceOf('Aws\\Common\\Credentials\\Credentials', $credentials);
        $this->assertEquals('foo', $credentials->getAccessKeyId());
        $this->assertEquals('baz', $credentials->getSecretKey());
        $this->assertEquals('bar', $credentials->getSecurityToken());
        $this->assertEquals(123, $credentials->getExpiration());
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryCreatesInstanceProfileWhenNoKeysAreProvided()
    {
        $old_value = Credentials::$OPT_IGNORE_EXTERNAL;
        Credentials::$OPT_IGNORE_EXTERNAL = true;

        $credentials = Credentials::factory();
        $this->assertInstanceOf('Aws\Common\Credentials\RefreshableInstanceProfileCredentials', $credentials);

        Credentials::$OPT_IGNORE_EXTERNAL = $old_value;
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryCreatesCacheWhenSetToTrue()
    {
        if (!extension_loaded('apc')) {
            $this->markTestSkipped('APC is not installed');
        }

        $credentials = Credentials::factory(array(
            'key'               => 'foo',
            'secret'            => 'bar',
            'credentials.cache' => true
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\CacheableCredentials', $credentials);
        $this->assertInstanceOf('Guzzle\Cache\DoctrineCacheAdapter', $this->readAttribute($credentials, 'cache'));
        $this->assertEquals('credentials_foo', $this->readAttribute($credentials, 'cacheKey'));
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     */
    public function testFactoryUsesExplicitlyProvidedCache()
    {
        $cache = new DoctrineCacheAdapter(new ArrayCache());
        $credentials = Credentials::factory(array(
            'credentials.cache' => $cache
        ));
        $this->assertInstanceOf('Aws\Common\Credentials\CacheableCredentials', $credentials);
        $this->assertInstanceOf('Guzzle\Cache\DoctrineCacheAdapter', $this->readAttribute($credentials, 'cache'));
    }

    /**
     * @covers Aws\Common\Credentials\Credentials::factory
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Unable to utilize caching with the specified options
     */
    public function testFactoryBailsWhenCacheCannotBeDetermined()
    {
        Credentials::factory(array('credentials.cache' => 'foo'));
    }
}
