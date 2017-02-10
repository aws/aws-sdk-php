<?php
namespace Aws\Build\Changelog;

/**
 * @internal
 */
class ChangelogBuilder
{

    private $newServiceFlag = false;
    private $baseDir;
    private $releaseNotesOutputDir;
    private $verboseFlag;

    public function __construct($baseDir, $releaseNotesOutputDir, $verboseFlag)
    {
        $this->baseDir = $baseDir;
        $this->releaseNotesOutputDir = $releaseNotesOutputDir;
        $this->verboseFlag = $verboseFlag;
    }

    private function readChangelog()
    {
        $releaseDir = $this->baseDir . '.changes/nextrelease/';
        $changelogEntries = [];
        if (!is_dir($releaseDir) || !$dh = opendir($releaseDir)) {
            throw new \InvalidArgumentException("nextrelease directory doesn't exists or is not readable at location $releaseDir");
        } else {
            //Ignore any files starting with a (.) dot
            $files = preg_grep('/^([^.])/', scandir($releaseDir));
            if (empty($files)) {
                throw new \InvalidArgumentException("No release notes files found in $releaseDir folder");
            }
            foreach ($files as $file) {
                $str = file_get_contents($releaseDir . $file);
                $changelogEntries = array_merge($changelogEntries, $this->cleanJSON(json_decode($str)));
            }
            closedir($dh);
        }
        return $changelogEntries;
    }

    private function cleanJSON($arr)
    {
        if (empty($arr) || !is_array($arr)) {
            throw new \Exception('Invalid Input', 2);
        } else {
            $cleanedJSON = [];
            foreach ($arr as $x) {
                if ($x->type == 'NEW_SERVICE') {
                    $this->newServiceFlag = true;
                }
                if ($x->type != 'DOC_UPDATE') {
                    array_push($cleanedJSON, $x);
                }
            }
            return $cleanedJSON;
        }
    }

    private function createTag($changelogFile)
    {
        if (!file_exists($changelogFile)) {
            throw new \Exception('Changelog File Not Found', 2);
        }
        $lines = file($changelogFile);
        $tag = explode(".", explode(" ", $lines[2])[1]);
        if ($tag[0] == 'next') {
            throw new \InvalidArgumentException('Untagged changes exits in CHANGELOG.md', 1);
        }
        if ($this->newServiceFlag) {
            //Minor Version Bump if a newservice is being released
            ++$tag[1];
            $tag[2] = 0;
            return implode(".", $tag);
        } else {
            ++$tag[2];
            return implode(".", $tag);
        }
    }

    private function createChangelogJson($changelog, $tag)
    {
        $fp = fopen($this->releaseNotesOutputDir . ".changes/" . $tag, 'w');
        fwrite($fp, json_encode($changelog, JSON_PRETTY_PRINT));
        fclose($fp);
    }

    private function writeToChangelog($changelog, $changelogFile)
    {
        if (!file_exists($changelogFile)) {
            throw new \InvalidArgumentException('Changelog File Not Found', 2);
        }
        $newChangeLog = "## next release\n\n" . $changelog . "\n";
        $lines = file($changelogFile);
        $lines[2] = $newChangeLog . $lines[2];
        file_put_contents($changelogFile, $lines);
    }

    public function cleanNextReleaseFolder()
    {
        $nextReleaseDir = $this->baseDir . '.changes/nextrelease/';
        $files = preg_grep('/^([^.])/', scandir($nextReleaseDir));
        foreach ($files as $file) {
            if (is_file($nextReleaseDir . $file)) {
                unlink($nextReleaseDir . $file);
            }
        }
    }

    private function generateChangelogString($changelog)
    {
        usort($changelog, function ($a, $b) {
            return strcmp($a->category, $b->category);
        });
        $str = "";
        foreach ($changelog as $log) {
            $str .= "* `Aws\\" . $log->category . "` - " . $log->description . "\n";
        }
        return $str;
    }

    public function buildChangelog()
    {
        $changelogFile = $this->baseDir . 'CHANGELOG.md';
        $newChangelog = $this->readChangelog();
        $tag = $this->createTag($changelogFile);
        putenv('TAG=$tag');
        if ($this->verboseFlag) {
            echo 'Tag for next release ' . $tag . "\n";
        }
        $this->createChangelogJson($newChangelog, $tag);
        $ChangelogUpdate = $this->generateChangelogString($newChangelog);
        if ($this->verboseFlag) {
            echo "$ChangelogUpdate";
        }
        $this->writeToChangelog($ChangelogUpdate, $this->releaseNotesOutputDir . 'CHANGELOG.md');
    }

    public function fixEndpointFile()
    {
        //Replace string in sdb as PHP doesnt support v2
        $oldMessage = '"sdb": {
          "defaults": {
            "protocols": [
              "http",
              "https"
            ],
            "signatureVersions": [
              "v2"
            ]
          },';

        $deletedFormat = '"sdb": {
          "defaults": {
            "protocols": [
              "http",
              "https"
            ]
          },';
        $str = file_get_contents('src/data/endpoints.json');
        $str = str_replace("$oldMessage", "$deletedFormat", $str);
        file_put_contents('src/data/endpoints.json', $str);
    }
}
