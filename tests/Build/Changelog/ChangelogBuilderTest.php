<?php
namespace Aws\Test\Build\Changelog;

use Aws\Build\Changelog\ChangelogBuilder;

/**
 * @covers ChangelogBuilder
 *
 */
class ChangelogBuilderTest extends \PHPUnit_Framework_TestCase
{

    private $RESOURCE_DIR = "tests/Build/Changelog/resources/";

    private function getChangelogBuilder()
    {
        return new ChangelogBuilder($this->RESOURCE_DIR);
    }

    /**
     * @expectedException \Exception
     */
    public function testReadChangelogNoDirectory()
    {
        $obj = $this->getChangelogBuilder();
        $obj->putDir("wrong-folder");
        $obj->readChangelog();
    }

    /**
     * @expectedException \Exception
     */
    public function testReadChangelogNoReleaseNotes()
    {
        $obj = $this->getChangelogBuilder();
        $obj->putDir($this->RESOURCE_DIR . "/.changes/");
        $obj->readChangelog();
    }

    public function testReadChangelogValid()
    {
        $obj = $this->getChangelogBuilder();
        $result = $obj->readChangelog();
        $this->assertEquals($result[0]->type, "NEW_FEATURE");
        $this->assertEquals($result[0]->description, "Parse ini files containing comments using #");
        $this->assertEquals($result[1]->type, "NEW_SERVICE");
    }

    /**
     * @expectedException \Exception
     */
    public function testCleanJSONEmptyInput()
    {
        $obj = $this->getChangelogBuilder();
        $obj->cleanJSON("");
    }

    /**
     * @expectedException \Exception
     */
    public function testCleanJSONInvalidJSON()
    {
        $obj = $this->getChangelogBuilder();
        $obj->cleanJSON("test");
    }

    public function testCleanJSONValidJSON()
    {
        $str = file_get_contents($this->RESOURCE_DIR . "/.changes/nextrelease/test.json");
        $obj = $this->getChangelogBuilder();
        $obj->putNewServiceFlag(false);
        $result = $obj->cleanJSON(json_decode($str));
        $this->assertEquals($result[0]->description, "Parse ini files containing comments using #");
        $this->assertEquals($result[1]->type, "NEW_SERVICE");
    }

    /**
     * @expectedException \Exception
     */
    public function testCreateTagNoFile()
    {
        $obj = $this->getChangelogBuilder();
        $obj->createTag(false, "test");
    }

    /**
     * @expectedException \Exception
     */
    public function testCreateTagInvalidChangelog()
    {
        $obj = $this->getChangelogBuilder();
        $obj->createTag($this->RESOURCE_DIR . "CHANGELOG-invalid.md");
    }

    public function testCreateTagValid()
    {
        $obj = $this->getChangelogBuilder();
        $result = $obj->createTag($this->RESOURCE_DIR . "/CHANGELOG-valid.md");
        $this->assertEquals("3.21.7", $result);
    }

    public function testCreateTagValidServiceVersionBump()
    {
        $obj = $this->getChangelogBuilder();
        $obj->putNewServiceFlag(true);
        $result = $obj->createTAG($this->RESOURCE_DIR . "CHANGELOG-valid.md");
        $this->assertEquals("3.22.0", $result);
    }

    public function testCreateChangelogJsonValid()
    {
        if (file_exists($this->RESOURCE_DIR . "/3.21.7")) {
            unlink($this->RESOURCE_DIR . "/3.21.7");
        }
        $tempDir = sys_get_temp_dir();
        $obj = $this->getChangelogBuilder();
        $CHANGELOG = $obj->readChangelog();
        $obj->putNewServiceFlag(false);
        $TAG = $obj->createTag($this->RESOURCE_DIR . "/CHANGELOG-valid.md");
        $obj->createChangelogJson($CHANGELOG, $TAG, $tempDir);
        $this->assertEquals(true, file_exists($tempDir . "/3.21.7"));
        $result = json_decode(file_get_contents($tempDir . "/3.21.7"));
        $this->assertEquals(3, count($result));
        unlink($tempDir . "/3.21.7");
    }

    public function testWriteToChangelogValid()
    {
        $tempDir = sys_get_temp_dir();
        file_put_contents($tempDir . "/CHANGELOG-tmp.md", "# CHANGELOG \n\n\n\n ");
        $obj = $this->getChangelogBuilder();
        $changelogEntries_arr = $obj->readChangelog();
        $changelogEntries = $obj->generateChangelogString($changelogEntries_arr);
        $obj->writeToChangelog($changelogEntries, $tempDir . "/CHANGELOG-tmp.md");
        $lines = file($tempDir . "/CHANGELOG-tmp.md");
        $this->assertEquals("## next release\n", $lines[2]);
        $i = 4;

        foreach (explode("\n", $changelogEntries) as $actualLine) {
            $this->assertEquals($actualLine . "\n", $lines[$i]);
            ++$i;
        }
        unlink($tempDir . "/CHANGELOG-tmp.md");
    }

    public function testGenerateChangelogStringValid()
    {
        $obj = $this->getChangelogBuilder();
        $CHANGELOG = $obj->readChangelog();
        $result = $obj->generateChangelogString($CHANGELOG);
        $expectedOutput =
            "* `Aws\Ec2` - Added Support to Tag Instance
* `Aws\s3` - Test string placeholder for new service
* `Aws\util` - Parse ini files containing comments using #
";
        $this->assertEquals($expectedOutput, $result);
    }
}
