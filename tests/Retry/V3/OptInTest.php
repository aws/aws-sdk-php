<?php
namespace Aws\Test\Retry\V3;

use Aws\Retry\V3\OptIn;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(OptIn::class)]
class OptInTest extends TestCase
{
    private string $previous;

    protected function setUp(): void
    {
        $this->previous = getenv(OptIn::ENV) ?: '';
        putenv(OptIn::ENV . '=');
        OptIn::reset();
    }

    protected function tearDown(): void
    {
        putenv(OptIn::ENV . '=' . $this->previous);
        OptIn::reset();
    }

    public function testIsDisabledByDefault(): void
    {
        $this->assertFalse(OptIn::isEnabled());
    }

    public function testIsEnabledWhenEnvIsLiteralTrue(): void
    {
        putenv(OptIn::ENV . '=true');
        OptIn::reset();
        $this->assertTrue(OptIn::isEnabled());
    }

    /**
     * @dataProvider matchingValues
     */
    public function testTrimmedTrueOptsIn(string $value): void
    {
        putenv(OptIn::ENV . '=' . $value);
        OptIn::reset();
        $this->assertTrue(OptIn::isEnabled(), "value '$value' should opt in");
    }

    public static function matchingValues(): array
    {
        return [
            [' true'],
            ['true '],
            ['  true  '],
            ["\ttrue\n"],
        ];
    }

    /**
     * @dataProvider nonMatchingValues
     */
    public function testRejectsAnythingOtherThanLiteralTrue(string $value): void
    {
        putenv(OptIn::ENV . '=' . $value);
        OptIn::reset();
        $this->assertFalse(OptIn::isEnabled(), "value '$value' should not opt in");
    }

    public static function nonMatchingValues(): array
    {
        return [
            ['1'],
            ['0'],
            ['yes'],
            ['on'],
            ['TRUE'],
            ['True'],
        ];
    }

    public function testValueIsMemoized(): void
    {
        putenv(OptIn::ENV . '=true');
        OptIn::reset();
        $this->assertTrue(OptIn::isEnabled());

        // Changing the env var after the first read should not change
        // the answer until reset() is called.
        putenv(OptIn::ENV . '=');
        $this->assertTrue(OptIn::isEnabled());

        OptIn::reset();
        $this->assertFalse(OptIn::isEnabled());
    }
}
