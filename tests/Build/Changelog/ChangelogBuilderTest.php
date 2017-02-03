<?php
namespace Aws\Test\Build\Changelog;

use Aws\Build\Changelog\ChangelogBuilder;

class ChangelogBuilderTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @covers ChangelogBuilder
	 *
	 */

	private $RESOURCE_DIR= "tests/Build/Changelog/resources";

	private function getChangelogBuilder()
	{
		return new ChangelogBuilder();
	}

	public function testreadChangelogNoDirectory()
	{
		$this->setExpectedException(\Exception::class);
		$obj =$this->getChangelogBuilder();
		$result = $obj->readChangelog("wrong-folder");
	}

	public function testreadChangelogNoReleaseNotes()
	{
		$obj = $this->getChangelogBuilder();
		$this->setExpectedException(\Exception::class);
		$obj->readChangelog($this->RESOURCE_DIR);
	}

	public function testreadChangelogValid()
	{
		$obj = $this->getChangelogBuilder();
		$result = $obj->readChangelog($this->RESOURCE_DIR . "/.changes/");
		$this->assertEquals($result[0]->type,"NEW_FEATURE");
		$this->assertEquals($result[0]->description,"Parse ini files containing comments using #");
		$this->assertEquals($result[1]->type,"NEW_SERVICE");
	}

	public function testCleanJSONEmptyInput()
	{
		$this->setExpectedException(\Exception::class);
		$obj = $this->getChangelogBuilder();
		$obj->cleanJSON("");
	}

	public function testCleanJSONInvalidJSON()
	{
		$this->setExpectedException(\Exception::class);
		$obj = $this->getChangelogBuilder();
		$obj->cleanJSON("test");
	}

	public function testCleanJSONValidJSON()
	{
		$str = file_get_contents($this->RESOURCE_DIR . "/.changes/nextrelease/test.json");
		$obj = $this->getChangelogBuilder();
		$obj->newServiceFlag=False;
		$result=$obj->cleanJSON(json_decode($str));
		$this->assertEquals($result[0]->description,"Parse ini files containing comments using #");
		$this->assertEquals($result[1]->type,"NEW_SERVICE");
	}

	public function testcreateTagNoFile()
	{
		$this->setExpectedException(\Exception::class);
		$obj = $this->getChangelogBuilder();
		$obj->createTag(False,"test");
	}

	public function testcreateTagInvalidChangelog()
	{
		$this->setExpectedException(\Exception::class);
		$obj = $this->getChangelogBuilder();
		$obj->createTag(False,$this->RESOURCE_DIR . "/CHANGELOG-invalid.md");
	}

	public function testcreateTagValid()
	{
		$obj = $this->getChangelogBuilder();
		$result = $obj->createTag(False,$this->RESOURCE_DIR . "/CHANGELOG-valid.md");
		$this->assertEquals("3.21.7",$result);
	}

	public function testcreateTagValidServiceVersionBump()
	{
		$obj = $this->getChangelogBuilder();
		$result = $obj->createTAG(True,$this->RESOURCE_DIR . "/CHANGELOG-valid.md");
		$this->assertEquals("3.22.0",$result);
	}

	public function testcreateChangelogJsonValid()
	{
		if ( file_exists($this->RESOURCE_DIR . "/3.21.7") ) {
			unlink($this->RESOURCE_DIR . "/3.21.7");
		}
		$obj = $this->getChangelogBuilder();
		$obj->dir = $this->RESOURCE_DIR;
		$CHANGELOG=$obj->readChangelog($this->RESOURCE_DIR . "/.changes/");
		$TAG = $obj->createTag(False,$this->RESOURCE_DIR . "/CHANGELOG-valid.md");
		$obj->createChangelogJson($this->RESOURCE_DIR, $CHANGELOG,$TAG);
		$this->assertEquals(True, file_exists($this->RESOURCE_DIR . "/3.21.7"));
		$result = json_decode(file_get_contents($this->RESOURCE_DIR . "/3.21.7"));
		$this->assertEquals(3,count($result));
		unlink($this->RESOURCE_DIR . "/3.21.7");
	}

	public function testwriteToChangelogValid()
	{
		file_put_contents($this->RESOURCE_DIR . "/CHANGELOG-tmp.md", "# CHANGELOG \n\n\n\n ");
		$obj = $this->getChangelogBuilder();
		$changelogEntries_arr=$obj->readChangelog($this->RESOURCE_DIR . "/.changes/");
		$changelogEntries = $obj->generateChangelogString($changelogEntries_arr);
		$obj->writeToChangelog($changelogEntries,$this->RESOURCE_DIR . "/CHANGELOG-tmp.md");
		$lines = file($this->RESOURCE_DIR . "/CHANGELOG-tmp.md");
		$this->assertEquals("## next release\n",$lines[2]);
		$i=4;
		
		foreach ( explode( "\n" , $changelogEntries ) as $actualLine ) {
			$this->assertEquals($actualLine."\n",$lines[$i]);
			++$i;
		}
		unlink($this->RESOURCE_DIR . "/CHANGELOG-tmp.md");
	}

	public function testgenerateChangelogStringValid()
	{
		$obj = $this->getChangelogBuilder();
		$CHANGELOG=$obj->readChangelog($this->RESOURCE_DIR . "/.changes/");
		$result = $obj->generateChangelogString($CHANGELOG);
		$expectedOutput=
"* `Aws\Ec2` - Added Support to Tag Instance
* `Aws\s3` - Test string placeholder for new service
* `Aws\util` - Parse ini files containing comments using #
";
		$this->assertEquals($expectedOutput,$result);
	}
}
