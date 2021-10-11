<?php

/*
 * This file contains code from PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aws\Test\Polyfill\PHPUnit;

use ArrayAccess;
use Exception;
use ReflectionException;
use ReflectionObject;
use ReflectionProperty;
use Aws\Test\Polyfill\PHPUnit9\ArraySubset;

trait PHPUnitCompatTrait
{
    public function _setUp()
    {
    }

    public function setUp(): void
    {
        $this->_setUp();
    }

    public function _tearDown()
    {
    }

    public function tearDown(): void
    {
        $this->_tearDown();
    }

    public static function setUpBeforeClass(): void
    {
        self::_setUpBeforeClass();
    }

    public static function tearDownAfterClass(): void
    {
        self::_tearDownAfterClass();
    }

    public static function _tearDownAfterClass()
    {
    }

    public static function _setUpBeforeClass()
    {
    }

    public function readAttribute($object, $attributeName)
    {
        try {
            $attribute = new ReflectionProperty($object, $attributeName);
        } catch (ReflectionException $e) {
            $reflector = new ReflectionObject($object);

            while ($reflector = $reflector->getParentClass()) {
                try {
                    $attribute = $reflector->getProperty($attributeName);
                    break;
                } catch (ReflectionException $e) {
                }
            }
        }

        if (isset($attribute)) {
            if ( ! $attribute || $attribute->isPublic()) {
                return $object->$attributeName;
            }
            $attribute->setAccessible(true);
            $value = $attribute->getValue($object);
            $attribute->setAccessible(false);

            return $value;
        }

        throw new Exception(
            sprintf(
                'Attribute "%s" not found in object.',
                $attributeName
            )
        );
    }

    public static function invalidArgumentHelper($argument, $type, $value = null)
    {
        $stack = debug_backtrace(false);

        return new \PHPUnit\Framework\Exception(
            sprintf(
                'Argument #%d%sof %s::%s() must be a %s',
                $argument,
                $value !== null ? ' ('.$value.')' : ' ',
                $stack[1]['class'],
                $stack[1]['function'],
                $type
            )
        );
    }

    public function assertArraySubset($subset, $array, $checkForObjectIdentity = false, $message = '')
    {
        if ( ! (\is_array($subset) || $subset instanceof ArrayAccess)) {
            throw self::invalidArgumentHelper(
                1,
                'array or ArrayAccess'
            );
        }

        if ( ! (\is_array($array) || $array instanceof ArrayAccess)) {
            throw self::invalidArgumentHelper(
                2,
                'array or ArrayAccess'
            );
        }

        $constraint = new ArraySubset($subset, $checkForObjectIdentity);

        static::assertThat($array, $constraint, $message);
    }
}